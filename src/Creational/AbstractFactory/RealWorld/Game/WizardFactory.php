<?php

namespace Warden\Patterns\Creational\AbstractFactory\RealWorld\Game;

class WizardFactory implements CharacterFactory
{
    public function create(): Character
    {
        return new Wizard();
    }
}