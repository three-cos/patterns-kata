<?php

namespace Warden\Patterns\Creational\AbstractFactory\RealWorld\Game;

class WarriorFactory implements CharacterFactory
{
    public function create(): Character
    {
        return new Warrior();
    }
}