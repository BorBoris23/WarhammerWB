<?php
class Simulation
{
    public $map;
    public $fileName;
    public $moveCount = 0;
    public $message;
    private $writer;
    public $reader;

    public function __construct($longitude, $latitude)
    {
        $this->fileName = Simulation::getJsonFilePath();
        $this->map = new Map($longitude, $latitude);
        $this->writer = new FileWriter($this->fileName);
        $this->reader = new FileReader($this->fileName);
        $this->message = new Message();
    }

    public function addContentToMap()
    {
//        лучники хума
        $this->map->addObjectToMap(new SquadEmpireArchers(2, 8));
        $this->map->addObjectToMap(new SquadEmpireArchers(2, 11));
        $this->map->addObjectToMap(new SquadEmpireArchers(2, 14));
        $this->map->addObjectToMap(new SquadEmpireArchers(2, 18));
        $this->map->addObjectToMap(new SquadEmpireArchers(2, 21));
//        пехота хума
        $this->map->addObjectToMap(new SquadEmpireInfantry(5, 7));
        $this->map->addObjectToMap(new SquadEmpireInfantry(5, 10));
        $this->map->addObjectToMap(new SquadEmpireInfantry(5, 13));
        $this->map->addObjectToMap(new SquadEmpireInfantry(5, 17));
        $this->map->addObjectToMap(new SquadEmpireInfantry(5, 20));
        $this->map->addObjectToMap(new SquadEmpireInfantry(5, 23));
//        кава хума
        $this->map->addObjectToMap(new SquadEmpireDemigryphs(7, 5));
        $this->map->addObjectToMap(new SquadEmpireDemigryphs(7, 15));
        $this->map->addObjectToMap(new SquadEmpireDemigryphs(7, 26));
//        арта хума
        $this->map->addObjectToMap(new SquadEmpireArtillery(0, 10));
        $this->map->addObjectToMap(new SquadEmpireArtillery(0, 20));
//        лучники орка
        $this->map->addObjectToMap(new SquadOrcArchers(57, 8));
        $this->map->addObjectToMap(new SquadOrcArchers(57, 16));
        $this->map->addObjectToMap(new SquadOrcArchers(57, 23));
//        пехота орка;
        $this->map->addObjectToMap(new SquadOrcInfantry(55, 6));
        $this->map->addObjectToMap(new SquadOrcInfantry(55, 9));
        $this->map->addObjectToMap(new SquadOrcInfantry(55, 12));
        $this->map->addObjectToMap(new SquadOrcInfantry(55, 16));
        $this->map->addObjectToMap(new SquadOrcInfantry(55, 19));
        $this->map->addObjectToMap(new SquadOrcInfantry(55, 22));
        $this->map->addObjectToMap(new SquadOrcInfantry(55, 25));
//        чудовища орка
        $this->map->addObjectToMap(new SquadOrcTrolls(52, 10));
        $this->map->addObjectToMap(new SquadOrcTrolls(52, 14));
        $this->map->addObjectToMap(new SquadOrcTrolls(52, 18));
        $this->map->addObjectToMap(new SquadOrcTrolls(52, 22));
//        арта орков
        $this->map->addObjectToMap(new SquadOrcArtillery(59, 11));
        $this->map->addObjectToMap(new SquadOrcArtillery(59, 20));
////        прочие обьекты лес
//        $this->addObjectWood();
//        прочие обьекты горы
//        $this->addObjectRock();
//        $this->map->addObjectToMap(new ObjectRock(1, 31));
//        $this->map->addObjectToMap(new ObjectRock(1, 30));
//        $this->map->addObjectToMap(new SquadOrcArtillery(3, 28));
//        $this->map->addObjectToMap(new SquadOrcArtillery(0, 29));
//        $this->map->addObjectToMap(new SquadOrcArtillery(13, 22));
//    test
//        $this->map->addObjectToMap(new SquadEmpireArtillery(0, 31));
//        $this->map->addObjectToMap(new SquadOrcArtillery(59, 0));
//        $this->map->addObjectToMap(new SquadOrcArtillery(6, 24));
//        $this->map->addObjectToMap(new SquadOrcArtillery(0, 20));
//        $this->map->addObjectToMap(new SquadOrcArtillery(0, 30));
//        $this->map->addObjectToMap(new SquadEmpireInfantry(10, 22));
//        $this->map->addObjectToMap(new SquadEmpireInfantry(10, 22));
//        $this->map->addObjectToMap(new SquadEmpireArtillery(10, 22));
//        $this->map->addObjectToMap(new SquadOrcArtillery(59, 0));
//        $this->map->addObjectToMap(new SquadOrcInfantry(21, 22));
//        $this->map->addObjectToMap(new SquadOrcArtillery(2, 0));
    }

    private function addObjectRock()
    {
        for($x = 1; $x < 3; $x++)
        {
            for($y = 29; $y < 31; $y ++)
            {
                $this->map->addObjectToMap(new ObjectRock($x, $y));
            }
        }
    }

    private function addObjectWood()
    {
        for($x = 14; $x < 18; $x++)
        {
            for($y = 19; $y < 26; $y ++)
            {
                $this->map->addObjectToMap(new ObjectWood($x, $y));
            }
        }
    }

    private function deleteAllContentToMap()
    {
        foreach ($this->map->getMapContent() as $coordinateX => $mapContent)
        {
            foreach ($mapContent as $coordinateY => $object)
            {
                $this->map->removeObjectFromMap($object);
            }
        }
    }

    public function nextMove()
    {
        $this->moveCount++;
        $this->message->addSayMoveCount($this->moveCount);

        foreach ($this->map->getSquadsOnMap() as $squad) {
            $squad->makeAction($this->map, $this->message);
        }
        $this->writer->writer($this->map);
    }

    public function reset()
    {
        $this->deleteAllContentToMap();
        unlink($this->fileName);
    }

    static function getJsonFilePath()
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            return 'saveFile.txt';
        } else {
            return '/tmp/saveFile.txt';
        }
    }
}

