<?php

namespace Warden\Patterns\Structural\Decorator\RealWorld;

interface Coffee
{
    public function cost(): int;
}

class BlackCoffee implements Coffee
{
    public function cost(): int
    {
        return 50;
    }
}

class Latte implements Coffee
{
    public function cost(): int
    {
        return 70;
    }
}

class Mocca implements Coffee
{
    public function cost(): int
    {
        return 80;
    }
}

class AddSugar implements Coffee
{
    public function __construct(private Coffee $baseCoffee)
    {
    }

    public function cost(): int
    {
        return $this->baseCoffee->cost() + 5;
    }
}

class AddMilk implements Coffee
{
    public function __construct(private Coffee $baseCoffee)
    {
    }

    public function cost(): int
    {
        return $this->baseCoffee->cost() + 15;
    }
}
class DoubleShot implements Coffee
{
    public function __construct(private Coffee $baseCoffee)
    {
    }

    public function cost(): int
    {
        return $this->baseCoffee->cost() + ($this->baseCoffee->cost() / 100 * 50);
    }
}

$coffee = new BlackCoffee;
var_dump($coffee->cost()); // 50
var_dump((new DoubleShot($coffee))->cost()); // 75
var_dump(
    (
        new AddMilk(
            new AddSugar(
                new BlackCoffee // 50
            ) // 55
        ) // 70
    )->cost()
);