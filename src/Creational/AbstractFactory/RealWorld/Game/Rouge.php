<?php

namespace Warden\Patterns\Creational\AbstractFactory\RealWorld\Game;

class Rouge implements Character 
{
    public function attack()
    {
        echo 'Perform Rouge attack';
    }

    public function defend()
    {
        echo "Use agility to avoid attack";
    }

    public function useAbility()
    {
        echo "Use Rouge super-poison-attack";
    }
}