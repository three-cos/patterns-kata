<?php


namespace Warden\Patterns\Creational\AbstractFactory\RealWorld;

class Example 
{
    public function __invoke()
    {
        echo __CLASS__;
    }
}