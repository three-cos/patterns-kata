<?php

namespace Warden\Patterns\Structural\Facade\RealWorld;

class Tv
{
    public function turnOn(): void
    {
        var_dump('TV is on');
    }
    
    public function turnOff(): void
    {
        var_dump('TV is off');
    }
}

class AudioSystem
{
    public function turnOn(): void
    {
        var_dump('AudioSystem is on');
    }
    
    public function turnOff(): void
    {
        var_dump('AudioSystem is off');
    }
}

class HomeTheaterFacade
{
    public function __construct(private Tv $tv, private AudioSystem $audioSystem)
    {
    }

    public function turnOn(): void
    {
        $this->tv->turnOn();
        $this->audioSystem->turnOn();
    }

    public function turnOff(): void
    {
        $this->tv->turnOff();
        $this->audioSystem->turnOff();
    }
}

$facade = new HomeTheaterFacade(
    new Tv,
    new AudioSystem
);

$facade->turnOn();
$facade->turnOff();