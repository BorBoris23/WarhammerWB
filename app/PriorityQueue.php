<?php
class PriorityQueue
{
    public $priorityQueue = [];

    public function getCount()
    {
        return count($this->priorityQueue);
    }

    private function getParent($i)
    {
        return floor(($i - 1) / 2);
    }

    private function getLeftChild($i)
    {
        return 2 * $i + 1;
    }

    private function getRightChild($i)
    {
        return 2 * $i + 2;
    }

    public function addElemToPriorityQueue($priorityCoefficient, $queueItem)
    {
        $elem = new Elem($priorityCoefficient, $queueItem);

        array_push($this->priorityQueue, $elem);

        $lastPlace = count($this->priorityQueue) - 1;

        $this->upItemInQueue($lastPlace);
    }

    private function upItemInQueue($placeInLine)
    {
        $parentPlace = $this->getParent($placeInLine);

        $priority = $this->convertToInt($this->priorityQueue[$placeInLine]->priority);

        $parentPriority = $this->convertToInt($this->priorityQueue[$parentPlace]->priority);

        while ( $placeInLine != 0 && $priority > $parentPriority ) {

            $this->arraySwap($this->priorityQueue, $placeInLine, $parentPlace);

            $parentPlace = $this->getParent($parentPlace);

            $parentPriority = $this->convertToInt($this->priorityQueue[$parentPlace]->priority);

            $placeInLine = $this->getParent($placeInLine);
        }
    }

    public function getElemFromPriorityQueue()
    {
        $lastPlace = count($this->priorityQueue) - 1;

        $this->arraySwap($this->priorityQueue, 0, $lastPlace);

        $result = array_pop($this->priorityQueue);

        $this->dawnItemINQueue(0);

        return $result;
    }

    private function dawnItemINQueue($placeInLine)
    {
        $size = count($this->priorityQueue);
        while ($placeInLine < $size / 2) {

            $rightChild = $this->getRightChild($placeInLine);
            $leftChild = $this->getLeftChild($placeInLine);

            $maxI = $this->getLeftChild($placeInLine);

            if ( $this->getRightChild($placeInLine) < $size && $this->priorityQueue[$rightChild]->priority > $this->priorityQueue[$leftChild]->priority) {

                $maxI = $this->getRightChild($placeInLine);
            }
            if ( $this->priorityQueue[$placeInLine]->priority >= $this->priorityQueue[$maxI]->priority ) {
                return;
            }
            $this->arraySwap($this->priorityQueue, $placeInLine, $maxI);
            $placeInLine = $maxI;
        }
    }

    private function arraySwap(array &$array, $key, $key2)
    {
        if (isset($array[$key]) && isset($array[$key2])) {
            list($array[$key], $array[$key2]) = array($array[$key2], $array[$key]);
            return true;
        }
        return false;
    }

    private function convertToInt($item)
    {
        if(gettype($item) === 'string') {
            return floatval($item);
        } else {
            return $item;
        }
    }
}

class Elem
{
    public $priority;
    public $value;

    public function __construct($priority, $value)
    {
        $this->priority = $priority;
        $this->value = $value;
    }
}






