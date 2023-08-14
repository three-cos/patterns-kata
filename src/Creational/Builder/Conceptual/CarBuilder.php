<?php

namespace Warden\Patterns\Creational\Builder\Conceptual;

class CarBuilder
{
    public function __construct()
    {
        $this->car = new Car();
    }

    public function setModel(string $model)
    {
        $this->car->model = $model;
        return $this;
    }

    public function setDoors(int $doors)
    {
        $this->car->doors = $doors;
        return $this;
    }

    public function setEngine(string $engine)
    {
        $this->car->engine = $engine;
        return $this;
    }

    public function setGPS(bool $gps)
    {
        $this->car->gps = $gps;
        return $this;
    }

    public function getCar(): Car
    {
        return $this->car;
    }
}