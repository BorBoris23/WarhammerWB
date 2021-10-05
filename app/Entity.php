<?php
abstract class Entity implements JsonSerializable
{
    public $mapLocation = null;

    public function __construct($coordinateX, $coordinateY)
    {
        $this->mapLocation = new MapLocation($coordinateX, $coordinateY);
    }
}

abstract class Squad extends Entity
{
    public $unitType;
    private $countUnit;
    private $lastUnitXP;
    public $squadDamage;
    public $squadXP;
    public $attackDistance;

    public function __construct($coordinateX, $coordinateY, $unitType, $countUnit)
    {
        parent::__construct($coordinateX, $coordinateY);
        $this->unitType = $unitType;
        $this->countUnit = $countUnit;
        $this->lastUnitXP = $unitType->hitPoint;
        $this->squadDamage = $this->squadDamageCalculation($this->unitType);
        $this->squadXP = $this->squadXPCalculation($this->unitType);
        $this->attackDistance = $unitType->calculationAttackDistance($this->mapLocation);
    }

    public function jsonSerialize()
    {
        return [
            'unitType' => $this->unitType,
            'countUnit' => $this->countUnit,
            'lastUnitXP' => $this->lastUnitXP,
            'squadDamage' => $this->squadDamage,
            'squadXP' => $this->squadXP,
            'attackDistance' => $this->attackDistance
        ];
    }

    public function getUnitType()
    {
        return $this->unitType;
    }

    public function makeAction($map, $message)
    {
        $findingEnemy = new FindingEnemy($this, $map);

        $enemy = $findingEnemy->findingEnemy();

        if($enemy) {

            $findingWay = new FindingWay($this, $enemy, $map);

            $rightWay = $findingWay->findingWay()->value;

            If($rightWay[0] === $this->mapLocation) {
                unset($rightWay[0]);
            }
            $step = array_shift($rightWay);

            if( $this->canSquadAttackFromCurrentNode($this->mapLocation, $enemy->mapLocation) === true ) {
                $this->squadAttack($enemy, $map, $message);
            }  else {
                $map->moveSquadOnMap($this, $step->x, $step->y);

                $message->addSayMoveSquadOnMap($this);
            }
        }
    }

    private function squadDamageCalculation($unitType)
    {
        return $this->countUnit * $unitType->damage;
    }

    private function squadXPCalculation($unitType)
    {
        return $this->countUnit * $unitType->hitPoint;
    }

    public function squadAttack($enemy, $map, $message)
    {
        $currentDamage = $this->squadDamage;
        $currentLastUnitXP = $enemy->lastUnitXP;
        $countFallenUnit = 0;

        while ( $currentDamage >= 0 && $enemy->countUnit >= 0 ) {

            $currentDamage = $currentDamage - $currentLastUnitXP;

            $message->addSaySquadAttackEnemy($this, $enemy);

            $currentLastUnitXP = $currentLastUnitXP - $currentDamage;

            if ( $currentLastUnitXP <= 0 ) {
                $countFallenUnit++;
                $enemy->countUnit = $enemy->countUnit - 1;
                $currentLastUnitXP = $enemy->lastUnitXP;
                $message->addSayFallenUnits($countFallenUnit);
            }
        }
        if($enemy->countUnit <= 0) {
            $map->removeObjectFromMap($enemy);
            $message->addSaySquadDefeated($enemy);
        }
    }

    public function canSquadAttackFromCurrentNode($currentNode, $targetNode)
    {
        $targetDistance = $currentNode->shortestPathToNode($targetNode);
        if($this->attackDistance >= $targetDistance) {
            return true;
        } else {
            return false;
        }
    }
}

class SquadEmpireInfantry extends Squad
{
    public function __construct($coordinateX, $coordinateY)
    {
        parent::__construct($coordinateX, $coordinateY, new UnitType('Human', 'infantry', 'sons of sigmar', 5, 50, rand(2, 4), 1), 60);
    }
}

class SquadEmpireArchers extends Squad
{
    public function __construct($coordinateX, $coordinateY)
    {
        parent::__construct($coordinateX, $coordinateY, new UnitType('Human', 'archers', 'hunters', 4, 25, rand(6, 10), 5), 30);
    }
}

class SquadEmpireDemigryphs extends Squad
{
    public function __construct($coordinateX, $coordinateY)
    {
        parent::__construct($coordinateX, $coordinateY, new UnitType('Human', 'cavalry', 'knights of the empire', 10, 100, rand(10, 15), 1), 10);
    }
}

class SquadEmpireArtillery extends Squad
{
    public function __construct($coordinateX, $coordinateY)
    {
        parent::__construct($coordinateX, $coordinateY, new UnitType('Human','artillery', 'sigmar hammer', 2, 80, rand(20, 50), 15), 3);
    }
}


class SquadOrcInfantry extends Squad
{
    public function __construct($coordinateX, $coordinateY)
    {
        parent::__construct($coordinateX, $coordinateY, new UnitType('Orc', 'infantry', 'red moles', 5, 100, rand(8, 20), 1), 20);
    }
}

class SquadOrcArchers extends Squad
{
    public function __construct($coordinateX, $coordinateY)
    {
        parent::__construct($coordinateX, $coordinateY, new UnitType('Orc', 'archers', 'rusty stubble', 2, 10, rand(1, 3), 3), 50);
    }
}

class SquadOrcTrolls extends Squad
{
    public function __construct($coordinateX, $coordinateY)
    {
        parent::__construct($coordinateX, $coordinateY, new UnitType('Orc', 'cavalry', 'stone skin', 7, 80, rand(7, 11), 2), 15);
    }
}

class SquadOrcArtillery extends Squad
{
    public function __construct($coordinateX, $coordinateY)
    {
        parent::__construct($coordinateX, $coordinateY, new UnitType('Orc', 'artillery', 'gobblespire', 1, 40, rand(10, 100), 22), 2);
    }
}

class ImpassableObject extends Entity
{
    private $impassableObjectType;

    public function __construct($coordinateX, $coordinateY, $impassableObjectType)
    {
        parent::__construct($coordinateX, $coordinateY);
        $this->impassableObjectType = $impassableObjectType;
    }

    public function jsonSerialize()
    {
        return [
            'impassableObjectType' => $this->impassableObjectType
        ];
    }
}

class ObjectWood extends ImpassableObject
{
    public function __construct($coordinateX, $coordinateY)
    {
        parent::__construct($coordinateX, $coordinateY, new ImpassableObjectType('wood'));
    }
}

class ObjectRock extends ImpassableObject
{
    public function __construct($coordinateX, $coordinateY)
    {
        parent::__construct($coordinateX, $coordinateY, new ImpassableObjectType('rock'));
    }
}

