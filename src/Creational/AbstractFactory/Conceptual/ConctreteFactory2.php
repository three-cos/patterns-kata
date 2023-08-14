<?php

namespace Warden\Patterns\Creational\AbstractFactory\Conceptual;

use Warden\Patterns\Creational\AbstractFactory\Conceptual\Products\AbstractProductA;
use Warden\Patterns\Creational\AbstractFactory\Conceptual\Products\AbstractProductB;
use Warden\Patterns\Creational\AbstractFactory\Conceptual\Products\ConctreteProductA2;
use Warden\Patterns\Creational\AbstractFactory\Conceptual\Products\ConctreteProductB2;

class ConctreteFactory2 implements AbstractFactory
{
    public function createProductA(): AbstractProductA {
        return new ConctreteProductA2();
    }
    public function createProductB(): AbstractProductB {
        return new ConctreteProductB2();
    }
}