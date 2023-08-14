<?php

namespace Warden\Patterns\Creational\Builder\Conceptual;

class ManualBuilder
{
    public function __construct()
    {
        $this->manual = new Manual();
    }

    public function setModel(string $model)
    {
        $this->manual->setModel($model);
        return $this;
    }

    public function setDoors(int $doors)
    {
        $this->manual->setDoors($doors);
        return $this;
    }

    public function setEngine(string $engine)
    {
        $this->manual->setEngine($engine);
        return $this;
    }

    public function setGPS(bool $gps)
    {
        $this->manual->setGPS($gps);
        return $this;
    }

    public function getManual(): Manual
    {
        return $this->manual;
    }
}