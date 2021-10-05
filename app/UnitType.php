<?php
abstract class ObjectType implements JsonSerializable
{
    public $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function getObjectType()
    {
        return $this->type;
    }
}

class UnitType extends ObjectType
{
    public $race;
    public $name;
    private $moveSpeed;
    public $hitPoint;
    public $damage;
    public $attackLength;

    public function __construct($race, $type, $name, $moveSpeed, $hitPoint, $damage, $attackLength)
    {
        parent::__construct($type);
        $this->race = $race;
        $this->name = $name;
        $this->moveSpeed = $moveSpeed;
        $this->hitPoint = $hitPoint;
        $this->damage = $damage;
        $this->attackLength = $attackLength;
    }

    public function calculationAttackDistance($currentNode)
    {
        $endRadius = new MapLocation($currentNode->x + $this->attackLength, $currentNode->y + $this->attackLength);
        return $currentNode->shortestPathToNode($endRadius);
    }

    public function jsonSerialize()
    {
        return [
            'type' => $this->type,
            'race' => $this->race,
            'name' => $this->name,
            'moveSpeed' => $this->moveSpeed,
            'hitPoint' => $this->hitPoint,
            'damage' => $this->damage,
            'attackRadius' => $this->attackLength
        ];
    }
}

class ImpassableObjectType extends ObjectType
{
    public function __construct($type)
    {
        parent::__construct($type);
    }

    public function jsonSerialize()
    {
        return [
            'type' => $this->type
        ];
    }
}



