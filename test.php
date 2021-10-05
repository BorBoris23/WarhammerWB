<?php
//        $squadType = $this->currentObject->getUnitType();
//        $attackDistance = $squadType->calculationAttackDistance($currentNode);

//        $closestTarget = $this->determiningNearestEnemy($currentNode, $squadType);


//    private function determiningNearestEnemy($currentNode, $squadType)
//    {
//        $enemies = $this->determinationEnemyTarget($squadType, $this->map);
//        return $this->findingClosestRequiredNodeFromArray($enemies, $currentNode);
//    }


//    private function findingClosestRequiredNodeFromArray($nodes, $targetNode)
//    {
//        $shortestPath = 100000000;
//        $result = '';
//        for($i = 0;$i < count($nodes); $i++) {
//
//            $path = $targetNode->shortestPathToNode($nodes[$i]);
//            if($path < $shortestPath) {
//                $shortestPath = $path;
//                $result = $nodes[$i];
//            }
//        }
//        return $result;
//    }

//    private function determinationEnemyTarget($squadType, $map)
//    {
//        $squadRace = $squadType->race;
//        $targetCoordinates = [];
//        foreach ($map->getSquadsOnMap() as $target) {
//            $targetType = $target->getUnitType();
//            $targetRace = $targetType->race;
//
//            if($targetRace !== $squadRace) {
//                array_push($targetCoordinates, $target->mapLocation);
//            }
//        }
//        return $targetCoordinates;
//    }

//abstract class EmpireUnits extends Squad
//{
//    public function move($map)
//    {
//        $findingWay = new FindingWay($this, $map);
//        $findingWay->findingWay();
//        $rightWay = $findingWay->findingWay($this->mapLocation, $map);
//        $step = array_shift($rightWay);
//        $map->moveSquadOnMap($this, $step->x, $step->y);
//        $map->moveSquadOnMap($this, $this->mapLocation->x+1,  $this->mapLocation->x+1);
//    }
//}





//abstract class OrcUnits extends Squad
//{
//    public function move($map)
//    {
//        $findingWay = new FindingWay($this, $map);
//        $findingWay->findingWay($this->mapLocation, $map);
//        $rightWay = $findingWay->findingWay($this->mapLocation, $map);
//
//        $step = array_shift($rightWay);
//
//        $map->moveSquadOnMap($this, $step->x, $step->y);
//    }
//}

//$priorityQueue = new PriorityQueue();

//$elem1 = new Elem(1,1);
//$elem2 = new Elem(5,5);
//$elem1 = new Elem(1,1);
//$elem1 = new Elem(1,1);
//$elem1 = new Elem(1,1);

//$priorityQueue->addElemToPriorityQueue(1/10,10);
//$priorityQueue->addElemToPriorityQueue(1/63,63);
//$priorityQueue->addElemToPriorityQueue(1/25,25);
//$priorityQueue->addElemToPriorityQueue(1/54,54);
//$priorityQueue->addElemToPriorityQueue(1/72,72);
//$priorityQueue->addElemToPriorityQueue(1/11,11);
//$priorityQueue->addElemToPriorityQueue(1/34,34);
//$priorityQueue->addElemToPriorityQueue(1/5,5);
//$priorityQueue->addElemToPriorityQueue(1/11,11);
//$priorityQueue->addElemToPriorityQueue(1/98,98);
//
//$priorityQueue->testGetElemFromPriorityQueue();
//$priorityQueue->testGetElemFromPriorityQueue();
//$priorityQueue->testGetElemFromPriorityQueue();
//$priorityQueue->testGetElemFromPriorityQueue();
//
//$priorityQueue->addElemToPriorityQueue(1/5,5);
//$priorityQueue->testGetElemFromPriorityQueue();
//$priorityQueue->addElemToPriorityQueue(1/1,1);
//$priorityQueue->addElemToPriorityQueue(1/100,100);
//$priorityQueue->addElemToPriorityQueue(1/86,86);
//$priorityQueue->testGetElemFromPriorityQueue();


//$priorityQueue->addElemToPriorityQueue(1/2,2);
//$priorityQueue->addElemToPriorityQueue(1/3,3);
//$priorityQueue->addElemToPriorityQueue(1/4,4);
//$priorityQueue->addElemToPriorityQueue(1/5,5);
//$priorityQueue->addElemToPriorityQueue(1/6,6);
//$priorityQueue->addElemToPriorityQueue(1/7,7);
//$priorityQueue->addElemToPriorityQueue(1/8,8);



//$array = array(
//    0 => ['Клавиатура',123],
//    1 => ['Монитор',456],
//    2 => ['Мышь',789],
//    3 => ['Модем',135],
//    4 => ['Системный блок',369]
//);
//
//function array_swap(array &$array, $key, $key2)
//{
//    if (isset($array[$key]) && isset($array[$key2])) {
//        list($array[$key], $array[$key2]) = array($array[$key2], $array[$key]);
//        return true;
//    }
//
//    return false;
//}
//
//array_swap($array, 1, 4);


//public function findingWay($currentNode, $map)
//{
//    $optimalPath = [];
//    $searchQueue = [];
//
////        $startNode = $mapLocation;
//
//    $enemies = $this->determinationEnemyTarget($currentNode, $map);
//
//    $closestEnemyNode = $this->findingClosestRequiredNodeFromArray($enemies, $currentNode);
//
//    $attackEnemyNodes = $this->getPossibleDestinations($closestEnemyNode, $map);
//
////        $searchedNodes = '';
//
//    $isPathFound = false;
//    $possibleSquadWays = $this->getPossibleDestinations($currentNode, $map);
//    array_unshift($searchQueue, $possibleSquadWays);

//
//    while ( count($searchQueue) > 0 ) {
//        $nodes = array_shift($searchQueue);

//        $optimalNode = $this->findingClosestRequiredNodeFromArray($nodes, $closestEnemyNode);

//
//    }
//
////        while (!$isPathFound) {
////            $possibleSquadWays = $this->getPossibleDestinations($currentNode, $map);;
////            if(in_array($searchedNode, $possibleSquadWays)) {
////                $key = array_search($searchedNode, $possibleSquadWays);
////                unset($possibleSquadWays[$key]);
////            }
////            $optimalNode = $this->findingClosestRequiredNodeFromArray($possibleSquadWays, $closestEnemyNode);
////            if(in_array($currentNode, $attackEnemyNodes)) {
////                $isPathFound = true;
////            } else {
////                $searchedNode = $currentNode;
////                $currentNode = $optimalNode;
////                array_push($optimalPath, $optimalNode);
////            }
////        }
////        return $optimalPath;
//}
//        while (!$isPathFound) {
//            $possibleSquadWays = $this->getPossibleDestinations($currentNode, $map);;
//            if(in_array($searchedNode, $possibleSquadWays)) {
//                $key = array_search($searchedNode, $possibleSquadWays);
//                unset($possibleSquadWays[$key]);
//            }
//            $optimalNode = $this->findingClosestRequiredNodeFromArray($possibleSquadWays, $closestEnemyNode);
//            if(in_array($currentNode, $attackEnemyNodes)) {
//                $isPathFound = true;
//            } else {
//                $searchedNode = $currentNode;
//                $currentNode = $optimalNode;
//                array_push($optimalPath, $optimalNode);
//            }
//        }
//        return $optimalPath;

//    public function findingWay($currentNode, $map)
//    {
//        $searched = [];
//        $searchQueue = [];
//
//        $enemies = $this->determinationEnemyTarget($currentNode, $map);
//
//        $closestEnemyNode = $this->findingClosestRequiredNodeFromArray($enemies, $currentNode);

//
//        $possibleSquadWays = $this->addStartNode($currentNode, $map);
//        $searchQueue = array_merge($searchQueue, $possibleSquadWays);
//
//        while ( count($searchQueue) > 0 ) {
//
//            $firstNodes = array_shift($searchQueue);
//            $searchedNode = end($firstNodes);
//
//
//            if(!in_array($searchedNode, $searched)) {
//                $possibleSquadWays = $this->getPossibleDestinations($searchedNode, $map);

//                if(in_array($closestEnemyNode, $possibleSquadWays)) {

//                    return $firstNodes;
//                } else {
//                    $possibleSquadWays = $this->getPossibleDestinations($searchedNode, $map);
//                    foreach ($possibleSquadWays as $node) {
//                        $cloneFistNodes = $firstNodes;
//                        array_push($cloneFistNodes, $node);
//                        array_push($searchQueue, $cloneFistNodes);
//                    }
//                    array_push($searched, $searchedNode);
//                }
//            }
//        }
//    }

//алгоритм поиска в ширину
//    public function findingWay($mapLocation, $map)
//    {
//        $arrKeys = [];
//        $searched = [];
//        $searchQueue = [];
//        $arrDestinations = $this->addStartNode($mapLocation, $map);
//
//        $searchQueue = array_merge($searchQueue, $arrDestinations);
//
//        while ( count($searchQueue) > 0 ) {
//
//            $arrayFirstNodes = array_shift($searchQueue);
//
//            $node = end($arrayFirstNodes);
//
//            if( !array_key_exists($node->convertToString(), $searched)) {
//                if( $this->canSquadAttack($node, $mapLocation, $map) === true) {
//                    return $arrayFirstNodes;
//                }
//                else {
//                    $arrPossibleDestinations = $this->getPossibleDestinations($node, $map);
//                    for($i = 0;$i<count($arrPossibleDestinations);$i++) {
//                        $cloneArrFistNodes = $arrayFirstNodes;
//                        array_push($cloneArrFistNodes, $arrPossibleDestinations[$i]);
//                        array_push($searchQueue, $cloneArrFistNodes);
//                    }
//                    array_push($arrKeys, $node->convertToString());
//                    $searched = array_fill_keys($arrKeys, 'does not matter');
//                }
//            }
//        }
//    }
//    private function canSquadAttack($startNode, $closestEnemyNode, $map)
//    {
//        $x = $startNode->x;
//        $y = $startNode->y;
//


//
////        $squad = $map->getObjectByCoordinates($startNode->x, $startNode->y);

////        $squadType = $squad->getUnitType();
////        $squadRace = $squadType->race;
//
//        $borderX = $map->getLongitude() - 1;
//        $borderY = $map->getLatitude() - 1;
//
//        for($possibleX = $x-1; $possibleX <= $x+1;$possibleX++) {
//
//            if($possibleX >= 0 && $possibleX <= $borderX) {
//
//                for ($possibleY = $y - 1; $possibleY <= $y + 1; $possibleY++) {
//
//                    if($possibleY >= 0 && $possibleY <= $borderY) {
//
//                        if ($map->isThereObjectByMap($possibleX, $possibleY) === true) {
//
//                            $possibleEnemy = $map->getObjectByCoordinates($possibleX, $possibleY);

//
//                            If( $possibleEnemy === $closestEnemyNode) {
//
////                                $possibleEnemyType = $possibleEnemy->getUnitType();
////
////                                $possibleEnemyRace = $possibleEnemyType->race;
//
////                                if( $squadRace !== $possibleEnemyRace ) {
//                                    return true;
////                                }
//                            }
//                        }
//                    }
//                }
//            }
//        }
//        return false;
//    }
//private function  addStartNode($mapLocation, $map)
//{
//    $destinations = [];
//    $possibleDestinations = $this->getPossibleDestinations($mapLocation, $map);
//    for($i = 0; $i<count($possibleDestinations); $i++) {
//        $destinations[] = [$mapLocation, $possibleDestinations[$i]];
//    }
//    return $destinations;
//}


//openList = хешь таблица узлов
//g(x) - stoimost puti ot nochalnoi versini


//public function run(mixed $start, mixed $goal): iterable
//{
//    $startNode = new Node($start);
//    $goalNode = new Node($goal);
//
//    return $this->executeAlgorithm($startNode, $goalNode);
//}
//
//private function executeAlgorithm(Node $start, Node $goal): iterable
//{
//    $path = [];
//
//    $this->clear();
//
//    $start->setG(0);
//    $start->setH($this->calculateEstimatedCost($start, $goal));
//
//    $this->openList->add($start);
//
//    while (!$this->openList->isEmpty()) {
//        /** @var Node<TState> $currentNode Cannot be null because the open list is not empty */
//        $currentNode = $this->openList->extractBest();
//
//        $this->closedList->add($currentNode);
//
//        if ($currentNode->getId() === $goal->getId()) {
//            $path = $this->generatePathFromStartNodeTo($currentNode);
//            break;
//        }
//
//        $successors = $this->getAdjacentNodesWithTentativeScore($currentNode, $goal);
//
//        $this->evaluateSuccessors($successors, $currentNode);
//    }
//
//    return $path;
//}
//
//private function calculateRealCost(Node $node, Node $adjacent)
//{
//    $state = $node->getState();
//    $adjacentState = $adjacent->getState();
//
//    return $this->domainLogic->calculateRealCost($state, $adjacentState);
//}





//доделать позжже
//        $stdout = fopen('php://stdout', 'w');
//        fwrite($stdout, var_export($findingWay, true));



//    public function findingWay($mapLocation, $map)
//    {
//        $x = $mapLocation->x;
//        $y = $mapLocation->y;
//
//        $searched = [];
//        $searchQueue = [];
//        $searchQueue = array_merge($searchQueue, $this->getPossibleDestinations($x, $y, $map));

//
//        while (count($searchQueue) > 0) {
//
//            $node = array_shift($searchQueue);


//
//            if( !in_array($node, $searched) ) {
//
//                if( $this->canSquadAttack($node, $mapLocation, $map) === true) {

//                    $endNode = new MapLocation($node->x, $node->y);


//                }
//                else {

//                    $searchQueue = array_merge($searchQueue, $this->getPossibleDestinations($node->x, $node->y, $map));

//
//                    $searched[] = $node;

//                }
//            }
//        }
//    }

//$a = [1,2];
//$b = [3,4];
//$c = array_merge( $a, $b);
//$v = [];
//$v = array_merge($v,$c);





//$stack = array("orange", "banana", "apple", "raspberry");
//$fruit = array_shift($stack);
//print_r($stack);
//$a = gettype($fruit);

//print_r($fruit);

//2.30

//$x = 2;
//$y = 30;
//$arr = ['x'=>[],'y'=>[]];
//
//for($i = $x-1;$i <= $x+1;$i++)
//{
//    array_push($arr['x'], $i);

//    for($j = $y - 1; $j <= $y + 1; $j ++)
//    {
//        array_push($arr['y'],$j);
//    }
//}



//for($i = 1;$i <=count($arr);$i++)
//{

//    for($j = 0;$j < count($arr[$i]);$j ++)
//    {

//    }
//}


//$graph = array( 'A' => array('B','C','D','Z'),
//    'B' => array('A','E'),
//    'C' => array('A','F','G'),
//    'D' => array('A','I'),
//    'E' => array('B','H'),
//    'F' => array('C','J'),
//    'G' => array('C'),
//    'H' => array('E','Z'),
//    'I' => array('D'),
//    'J' => array('J'),
//    'Z' => array('A','H'));
//
//function bfs($graph , $startNode = 'A')
//{
//    $visited = array();
//    $queue = array();
//
//    $queue[] = $graph[$startNode];

//    $visited[$startNode] = true;
//
//    while( count($queue) > 0 )
//    {
//        $currentNodeAdj = array_pop($queue);
//
//        foreach($currentNodeAdj as $vertex)
//        {
//            if(!array_key_exists($vertex,$visited))
//            {
//                array_unshift( $queue , $graph[$vertex] ) ;
//            }
//
//            $visited[$vertex] = true;
//        }
//    }
//}
//
//bfs($graph , $startNode = 'A');

//$graph = [
//    'A' => ['B', 'C', 'D'],
//    'B' => ['G', 'H'],
//    'C' => ['G'],
//    'D' => ['E', 'F'],
//    'E' => [],
//    'F' => [],
//    'G' => [],
//    'H' => []
//];
//$startNode = 'A';
//$endNode   = 'H';
//
//$searchQueue = [];
//$searched = [];
//
//foreach($graph[$startNode] as $value) {
//    $searchQueue[] = $value;

//}
//
//while($searchQueue) {
//    $node = array_shift($searchQueue);
//
//    if(!in_array($node, $searched)) {
//        if($node === $endNode) {
//            echo 'Целевая точка найдена';
//            die();
//        } else {
//            foreach($graph[$node] as $value) {
//                $searchQueue[] = $value;
//            }
//
//            $searched[] = $node;
//        }
//    }
//}
//
//echo 'Целевая точка не найдена';