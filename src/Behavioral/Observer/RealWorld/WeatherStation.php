<?php

namespace Warden\Patterns\Behavioral\Observer\RealWorld;

interface GetsUpdatesFromWeatherStation
{
    public function update(WeatherStation $station): void;
}

class WeatherStation
{
    protected int $temperature = 0;
    
    protected array $subscribers = [];

    public function addSubscriber(GetsUpdatesFromWeatherStation $subscriber): void
    {
        $this->subscribers[] = $subscriber;
    }

    public function measure(): void
    {
        log('measure the room temperature');

        $this->temperature = rand(-40, 40);

        $this->update();
    }

    public function getTemperature(): int
    {
        return $this->temperature;
    }

    public function tooHot(): bool
    {
        return $this->temperature > 22;
    }

    public function tooCold(): bool
    {
        return $this->temperature < 10;
    }

    private function update(): void
    {
        foreach ($this->subscribers as $subscriber) {
            $subscriber->update($this);
        }

        log('weather is updated');
    }
}

class Conditioner implements GetsUpdatesFromWeatherStation
{
    public function update(WeatherStation $station): void
    {
        if ($station->tooHot()) {
            $this->coolDown();
        }

        if ($station->tooCold()) {
            $this->heatUp();
        }
    }

    public function coolDown(): void
    {
        log('start to cool down the room');
    }
    
    public function heatUp(): void
    {
        log('start to heat up the room');
    }
}

class WeatherDisplay implements GetsUpdatesFromWeatherStation
{
    public function update(WeatherStation $station): void
    {
        log("Show temperature on display: {$station->getTemperature()}");
    }
}

$weatherStation = new WeatherStation;
$weatherStation->addSubscriber(new WeatherDisplay());
$weatherStation->addSubscriber(new Conditioner());

$weatherStation->measure();
$weatherStation->measure();
$weatherStation->measure();

function log(string $text)
{
    var_dump($text);
}