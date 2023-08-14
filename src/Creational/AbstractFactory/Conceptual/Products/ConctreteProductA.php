<?php

namespace Warden\Patterns\Creational\AbstractFactory\Conceptual\Products;

class ConctreteProductA implements AbstractProductA
{
    public function name(): string 
    {
        return "I'm ".__CLASS__;
    }
}