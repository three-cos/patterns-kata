<?php

namespace Warden\Patterns\Creational\AbstractFactory\RealWorld\Game;

interface CharacterFactory
{
    function create(): Character;
}