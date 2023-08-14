<?php

namespace Warden\Patterns\Creational\Builder\Conceptual;

class Manual 
{
    public function setModel(string $model)
    {
        $this->model = 'Brand new ' .$model;
    }

    public function setDoors(int $doors)
    {
        $this->doors = 'Equiped with '.$doors;
    }

    public function setEngine(string $engine)
    {
        $this->engine = 'Powerfull '.$engine;
    }

    public function setGPS(bool $gps)
    {
        $this->gps = $gps ? 'GPS Included' : 'GPS Not included';
    }
}