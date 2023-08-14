<?php

namespace Warden\Patterns\Creational\Builder\Conceptual;

class Car 
{
    public function setModel(string $model)
    {
        $this->model = $model;
    }

    public function setDoors(int $doors)
    {
        $this->doors = $doors;
    }

    public function setEngine(string $engine)
    {
        $this->engine = $engine;
    }

    public function setGPS(bool $gps)
    {
        $this->gps = $gps;
    }
}