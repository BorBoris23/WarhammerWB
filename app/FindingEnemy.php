<?php
class FindingEnemy
{
    private $currentObject;
    private $map;

    public function __construct($currentObject, $map)
    {
        $this->currentObject = $currentObject;
        $this->map = $map;;
    }

    public function findingEnemy()
    {
        $currentNode = $this->currentObject->mapLocation;
        $squadType = $this->currentObject->getUnitType();

        $enemies = $this->findingEnemiesTarget($squadType, $this->map);

        return $this->findingClosestEnemy($enemies, $currentNode);
    }

    private function findingEnemiesTarget($squadType, $map)
    {
        $squadRace = $squadType->race;
        $targets = [];
        foreach ($map->getSquadsOnMap() as $target) {
            $targetType = $target->getUnitType();
            $targetRace = $targetType->race;

            if($targetRace !== $squadRace) {
                array_push($targets, $target);
            }
        }
        return $targets;
    }

    private function findingClosestEnemy($enemies, $currentNode)
    {
        $shortestPath = 100000000;
        $result = '';
        for($i = 0;$i < count($enemies); $i++) {
            $path = $currentNode->shortestPathToNode($enemies[$i]->mapLocation);
            if($path < $shortestPath) {
                $shortestPath = $path;
                $result = $enemies[$i];
            }
        }
        return $result;
    }
}