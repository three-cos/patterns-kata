<?php

namespace Warden\Patterns\Creational\AbstractFactory\Conceptual;

use Warden\Patterns\Creational\AbstractFactory\Conceptual\Products\AbstractProductA;
use Warden\Patterns\Creational\AbstractFactory\Conceptual\Products\AbstractProductB;

interface AbstractFactory
{
    public function createProductA(): AbstractProductA;
    public function createProductB(): AbstractProductB;
}