<?php

class Message
{
    public $messages = [];

    public function removeAllMessages()
    {
        $this->messages = [];
    }

    public function addSayMoveCount($moveCount)
    {
        array_push($this->messages, 'current turn ' . $moveCount);
    }

    public function addSayMoveSquadOnMap($squad)
    {
        $message = 'Squad ' . $squad->unitType->race . ', ' . $squad->unitType->type . ', ' .  $squad->unitType->name .
            ' moved to node ' . $squad->mapLocation->x . ', ' . $squad->mapLocation->y;
        array_push($this->messages, $message);
    }

    public function addSaySquadAttackEnemy($squad, $enemy)
    {
       array_push($this->messages, 'Squad ' . $squad->unitType->race . ', ' . $squad->unitType->type . ', ' .  $squad->unitType->name .  ' attacked ' . $enemy->unitType->race .
           ', ' . $enemy->unitType->type . ', ' . $enemy->unitType->name . ' and dealt ' . $squad->squadDamage . ' damage.');
    }

    public function addSayFallenUnits($fallenUnit)
    {
        array_push($this->messages, $fallenUnit . ' unit fell');
    }

    public function addSaySquadDefeated($squad)
    {
        array_push($this->messages, 'Squad ' . $squad->unitType->name . ' defeated');
    }
}
