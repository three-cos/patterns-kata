<?php

namespace Warden\Patterns\Behavioral\State\RealWorld;

use Warden\Patterns\Behavioral\State\RealWorld\States\OrderState;

class Order
{
    public int $id;
    public bool $isPaid;
    
    private ?OrderState $state = null;

    public function __construct()
    {
        $this->id = random_int(1, 1000);
    }

    public function setState(OrderState $state)
    {
        $this->state = $state;
    }

    public function getState(): ?OrderState
    {
        return $this->state;
    }

    public function nextState(): void
    {
        $this->state->previous = $this->state;
        $this->state->next();
    }

    public function isPaid(): bool
    {
        return rand(0, 1);
    }
}