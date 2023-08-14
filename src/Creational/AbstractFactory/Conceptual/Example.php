<?php


namespace Warden\Patterns\Creational\AbstractFactory\Conceptual;

class Example 
{
    public function __invoke()
    {
        $factory = new ConctreteFactory();

        $productA = $factory->createProductA();

        echo $productA->name() . "\n";

        echo $factory->createProductB()->name() . "\n";

        echo $factory->createProductB()->useWith($productA);
    }
}