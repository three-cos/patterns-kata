<?php

namespace Warden\Patterns\Behavioral\State\RealWorld\States;

use ReflectionClass;
use Warden\Patterns\Behavioral\State\RealWorld\Order;

abstract class OrderState
{
    public ?OrderState $previous = null;

    public function __construct(protected Order $order)
    {
        $this->onApply();
    }

    public function onApply()
    {
        echo sprintf("Order #%d is in %s state \n", $this->order->id, $this->name());
    }

    public function name(): string
    {
        $r = new ReflectionClass($this);

        return $r->getShortName();
    }

    protected function isNotChanged(): bool
    {
        return $this->order->getState() == $this->previous;
    }

    abstract public function next();
}
