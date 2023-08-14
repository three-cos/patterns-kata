<?php

namespace Warden\Patterns\Creational\AbstractFactory\RealWorld\Game;

class Example 
{
    public function __invoke()
    {
        $factory = new WarriorFactory();
        // $factory = new WizardFactory();
        // $factory = new RougeFactory();

        $hero = $factory->create();

        echo sprintf("%s %s %s", ... [
            $hero->attack(),
            $hero->defend(),
            $hero->useAbility(),
        ]);
    }
}