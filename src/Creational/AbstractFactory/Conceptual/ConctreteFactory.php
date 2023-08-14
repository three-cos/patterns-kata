<?php

namespace Warden\Patterns\Creational\AbstractFactory\Conceptual;

use Warden\Patterns\Creational\AbstractFactory\Conceptual\Products\AbstractProductA;
use Warden\Patterns\Creational\AbstractFactory\Conceptual\Products\AbstractProductB;
use Warden\Patterns\Creational\AbstractFactory\Conceptual\Products\ConctreteProductA;
use Warden\Patterns\Creational\AbstractFactory\Conceptual\Products\ConctreteProductB;

class ConctreteFactory implements AbstractFactory
{
    public function createProductA(): AbstractProductA {
        return new ConctreteProductA();
    }
    public function createProductB(): AbstractProductB {
        return new ConctreteProductB();
    }
}