<?php

namespace Warden\Patterns\Creational\AbstractFactory\Conceptual\Products;

class ConctreteProductA2 implements AbstractProductA
{
    public function name(): string 
    {
        return "I'm ".__CLASS__;
    }
}