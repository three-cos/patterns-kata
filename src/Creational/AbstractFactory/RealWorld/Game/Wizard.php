<?php

namespace Warden\Patterns\Creational\AbstractFactory\RealWorld\Game;

class Wizard implements Character 
{
    public function attack()
    {
        echo 'Perform Wizard attack';
    }

    public function defend()
    {
        echo "Spell defence chars";
    }

    public function useAbility()
    {
        echo "Use Wizard super-fireball-attack";
    }
}