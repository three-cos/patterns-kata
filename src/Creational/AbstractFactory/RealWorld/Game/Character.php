<?php

namespace Warden\Patterns\Creational\AbstractFactory\RealWorld\Game;

interface Character 
{
    function attack();
    function defend();
    function useAbility();
}