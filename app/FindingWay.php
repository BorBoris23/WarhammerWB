<?php
class FindingWay
{
    private $currentObject;
    private $map;
    private $count = 0;
    private $priorityQueue;
    private $targetObject;

    public function __construct($currentObject, $targetObject, $map)
    {
        $this->currentObject = $currentObject;
        $this->map = $map;
        $this->targetObject = $targetObject;
        $this->priorityQueue = new PriorityQueue();
    }

    public function findingWay()
    {
        $arrKeys = [];
        $searched = [];
        $searchQueue = [];

        $currentNode = $this->currentObject->mapLocation;
        $targetNode = $this->targetObject->mapLocation;

        $destinations = $this->addStartNode($currentNode, $this->map);
        $searchQueue = array_merge($searchQueue, $destinations);

        $this->lineUpQueueWithHighestPriority($this->priorityQueue, $searchQueue, $targetNode);

        while ( $this->priorityQueue->getCount() > 0 ) {

            $paths = $this->priorityQueue->getElemFromPriorityQueue();

            $node = end($paths->value);

            if( !array_key_exists($node->convertToString(), $searched) ) {

                if($this->currentObject->canSquadAttackFromCurrentNode($node, $this->targetObject->mapLocation ) === true) {

                    return $paths;
                }
                else {
                    $possibleDestinations = $this->getPossibleDestinations($node, $this->map);
                    $possiblePaths = [];
                    foreach ($possibleDestinations as $possibleDestination) {
                        $clonePath = $paths->value;
                        array_push($clonePath, $possibleDestination);
                        array_push($possiblePaths, $clonePath);
                    }
                    $this->lineUpQueueWithHighestPriority($this->priorityQueue, $possiblePaths, $targetNode);
                    array_push($arrKeys, $node->convertToString());
                    $searched = array_fill_keys($arrKeys, 'nodeCoordinate');
                }
            }
        }
        return null;
    }

    private function lineUpQueueWithHighestPriority($priorityQueue, $searchQueue, $closestTarget)
    {
        foreach ($searchQueue as $placeInQueue => $nodes) {

            $currentNode = end($nodes);

            $path = $currentNode->shortestPathToNode($closestTarget);

            $priorityCoefficient = $this->calculationOfPriorityCoefficient($currentNode, $path);

            $priorityQueue->addElemToPriorityQueue(strval($priorityCoefficient), $nodes);
        }
        return $priorityQueue;
    }

    private function calculationOfPriorityCoefficient($currentNode, $pathFromCurrentNode)
    {
        $startNode = $this->currentObject->mapLocation;

        $pathFromStartNode = $startNode->shortestPathToNode($currentNode);

        return 1/($pathFromStartNode + $pathFromCurrentNode);

    }

    private function addStartNode($mapLocation, $map)
    {
        $destinations = [];
        $possibleDestinations = $this->getPossibleDestinations($mapLocation, $map);
        for($i = 0; $i<count($possibleDestinations); $i++) {
            $destinations[] = [$mapLocation, $possibleDestinations[$i]];
        }
        return $destinations;
    }

    private function getPossibleDestinations($mapLocation, $map)
    {
        $possibleDestinations = [];
        $x = $mapLocation->x;
        $y = $mapLocation->y;

        $borderX = $map->getLongitude() - 1;
        $borderY = $map->getLatitude() - 1;

        for($possibleX = $x - 1; $possibleX <= $x+1;$possibleX++) {

            if($possibleX >= 0 && $possibleX <= $borderX) {

                for($possibleY = $y - 1; $possibleY <= $y + 1; $possibleY ++) {

                    if($possibleY >= 0 && $possibleY <= $borderY) {

                        if( $map->isThereObjectByMap($possibleX, $possibleY) === false) {

                            $newMapLocation = new MapLocation($possibleX, $possibleY);

                            if($newMapLocation != $mapLocation) {
                                array_push($possibleDestinations, $newMapLocation);
                            }
                        }
                    }
                }
            }
        }
        return $possibleDestinations;
    }
}

class MapLocation
{
    public $x;
    public $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function convertToString()
    {
        return strval($this->x) . ':' . strval($this->y);
    }

    public function shortestPathToNode($node)
    {
        return sqrt( pow(($this->x - $node->x),2) + pow(($this->y - $node->y),2) );
    }
}