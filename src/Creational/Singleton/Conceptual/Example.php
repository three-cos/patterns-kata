<?php


namespace Warden\Patterns\Creational\Singleton\Conceptual;

class Example 
{
    public function __invoke()
    {
        var_dump(Singleton::getInstance());
        var_dump(Singleton::getInstance());
        var_dump(Singleton::getInstance());
    }
}