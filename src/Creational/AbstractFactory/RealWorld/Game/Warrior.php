<?php

namespace Warden\Patterns\Creational\AbstractFactory\RealWorld\Game;

class Warrior implements Character 
{
    public function attack()
    {
        echo 'Perform Warrior attack';
    }

    public function defend()
    {
        echo "Perform Warrior defence stand";
    }

    public function useAbility()
    {
        echo "Use Warrior super-attack";
    }
}