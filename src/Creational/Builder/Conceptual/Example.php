<?php

namespace Warden\Patterns\Creational\Builder\Conceptual;

class Example 
{
    public function __invoke()
    {
        $d = new Director();

        var_dump($d->buildFamilyCar());
        var_dump($d->buildFancyCar());
    }
}