<?php

namespace Warden\Patterns\Creational\Builder\Conceptual;

class Director
{
    public function buildFancyCar()
    {
        $builder = new CarBuilder();

        $manualBuilder = new ManualBuilder();

        $manual = $manualBuilder->setDoors(2)
            ->setEngine('GBL-9000')
            ->setGPS(true)
            ->setModel('Lamborginy Murcielago')
            ->getManual();

        var_dump($manual);

        return $builder->setDoors(2)
            ->setEngine('GBL-9000')
            ->setGPS(true)
            ->setModel('Lamborginy Murcielago')
            ->getCar();
    }

    public function buildFamilyCar()
    {
        $builder = new CarBuilder();

        $manualBuilder = new ManualBuilder();

        $manual = $manualBuilder->setDoors(2)
            ->setEngine('trusty-1000')
            ->setGPS(false)
            ->setModel('Ford Family Bus')
            ->getManual();

        var_dump($manual);

        return $builder->setDoors(5)
            ->setEngine('trusty-1000')
            ->setGPS(false)
            ->setModel('Ford Family Bus')
            ->getCar();
    }
}