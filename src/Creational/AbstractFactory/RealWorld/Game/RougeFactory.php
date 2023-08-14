<?php

namespace Warden\Patterns\Creational\AbstractFactory\RealWorld\Game;

class RougeFactory implements CharacterFactory
{
    public function create(): Character
    {
        return new Rouge();
    }
}