<?php

namespace Warden\Patterns\Behavioral\Command\RealWorld;

interface Command
{
    public function execute(): void;
}

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

class TurnOnTv implements Command
{
    public function __construct(protected Tv $tv)
    {
    }

    public function execute(): void
    {
        $this->tv->turnOn();
    }
}

class TurnOffTv implements Command
{
    public function __construct(protected Tv $tv)
    {
    }

    public function execute(): void
    {
        $this->tv->turnOff();
    }
}

class Remote
{
    protected array $btns = [];

    public function setButtonCommand(int $btn, Command $command): void
    {
        $this->btns[$btn] = $command;
    }

    public function pressBtn($btn): void
    {
        if (array_key_exists($btn, $this->btns)) {
            $this->btns[$btn]->execute();
        }
    }
}

class SmartHomeControll
{
    protected array $webhooks = [];

    public function setWebhook(string $webhook, Command $command): void
    {
        $this->webhooks[$webhook] = $command;
    }

    public function processWebhook(string $webhook): void
    {
        if (array_key_exists($webhook, $this->webhooks)) {
            $this->webhooks[$webhook]->execute();
        }
    }
}

$tv = new Tv;

$remote = new Remote;
$remote->setButtonCommand(1, new TurnOnTv($tv));
$remote->setButtonCommand(2, new TurnOffTv($tv));

$remote->pressBtn(1);
$remote->pressBtn(2);

$smartHome = new SmartHomeControll;
$smartHome->setWebhook('localhost:9950', new TurnOffTv($tv));
$smartHome->processWebhook('localhost:9950');