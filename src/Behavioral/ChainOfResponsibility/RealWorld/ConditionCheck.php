<?php

namespace Warden\Patterns\ChainOfResponsibility\RealWorld;

use Exception;

abstract class ConditionCheck
{
    protected $nextCheck;

    public function setNext(ConditionCheck $nextCheck): ConditionCheck
    {
        $this->nextCheck = $nextCheck;

        return $nextCheck;
    }

    public function callNext()
    {
        return $this->nextCheck ? $this->nextCheck->apply() : 'Passed all checks!';
    }

    public function apply()
    {
        if ($this->pass()) {
            return $this->callNext();
        }

        return 'Failed in ' . print_r($this, true);
    }

    public abstract function pass(): bool;
}

class PriceCheck extends ConditionCheck
{
    public function __construct(private Order $order, private $symbol = '>', private $amount)
    {
    }

    public function pass(): bool
    {
        if ($this->symbol === '>') {
            return $this->order->sum > $this->amount;
        }

        if ($this->symbol === '<') {
            return $this->order->sum < $this->amount;
        }

        if ($this->symbol === '=') {
            return $this->order->sum == $this->amount;
        }

        throw new Exception("Unknown symbol {$this->symbol}");
    }
}

class TimeCheck extends ConditionCheck
{
    public function __construct(private Order $order, private $symbol = '>', private $time)
    {
    }

    public function pass(): bool
    {
        if ($this->symbol === '>') {
            return $this->order->time > $this->time;
        }

        if ($this->symbol === '<') {
            return $this->order->time < $this->time;
        }

        if ($this->symbol === '=') {
            return $this->order->time == $this->time;
        }
    }
}

class Order
{
    public function __construct(public $sum, public $time)
    {
    }
}

$order = new Order(sum: 100, time: 10);

$priceCheck = new PriceCheck($order, '>', 100);
$priceCheck
    ->setNext(new TimeCheck($order, '=', 10))
    ->setNext(new PriceCheck($order, '<', 1001));

var_dump($priceCheck->apply());
