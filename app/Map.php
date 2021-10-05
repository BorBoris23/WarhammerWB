<?php
class Map implements JsonSerializable
{
    public $mapContent = [];
    private $longitude;
    private $latitude;

    public function __construct($longitude, $latitude)
    {
        $this->longitude = $longitude;
        $this->latitude = $latitude;
    }

    public function jsonSerialize()
    {
        return [
            'mapContent' => $this->mapContent,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude
        ];
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function isThereObjectByMap($x, $y)
    {
        if(!empty($this->mapContent[$x][$y]))
        {
            return true;
        }
        return false;
    }

    public function getMapContent()
    {
        return $this->mapContent;
    }

    public function getSquadsOnMap()
    {
        $result = [];
        foreach ($this->getMapContent() as $coordinateX => $mapContent)
        {
            foreach ($mapContent as $coordinateY => $object)
            {
                if($object instanceof Squad)
                {
                    array_push($result, $object);
                }
            }
        }
        return $result;
    }

    public function getObjectByCoordinates($x, $y)
    {
        return $this->mapContent[$x][$y];
    }

    public function addObjectToMap(Entity $entity)
    {
        $coordinatesX = $entity->mapLocation->x;
        $coordinatesY = $entity->mapLocation->y;

        if (array_key_exists($coordinatesX, $this->mapContent) === false)
        {
            $this->mapContent[$coordinatesX] = [];
        }
        $this->mapContent[$coordinatesX][$coordinatesY] = $entity;
    }

    public function removeObjectFromMap($squad)
    {
        $coordinatesX = $squad->mapLocation->x;
        $coordinatesY = $squad->mapLocation->y;

        unset($this->mapContent[$coordinatesX][$coordinatesY]);

        if (empty($this->mapContent[$coordinatesX]))
        {
            unset($this->mapContent[$coordinatesX]);
        }
    }

    public function moveSquadOnMap($squad, $toMoveX, $toMoveY)
    {
        $this->removeObjectFromMap($squad);

        $squad->mapLocation->x = $toMoveX;
        $squad->mapLocation->y = $toMoveY;

        $this->addObjectToMap($squad);
    }
}

