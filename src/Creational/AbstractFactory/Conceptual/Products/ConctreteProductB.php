<?php

namespace Warden\Patterns\Creational\AbstractFactory\Conceptual\Products;

class ConctreteProductB implements AbstractProductB
{
    public function name(): string 
    {
        return "I'm ".__CLASS__;
    }

    public function useWith(AbstractProductA $productA): string
    {
        return "using with ".$productA->name();
    }
}