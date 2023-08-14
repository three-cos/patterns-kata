<?php

namespace Warden\Patterns\Behavioral\State\RealWorld\States;

class OrderCrmError extends OrderState
{
    public function next()
    {
        $this->order->setState(new OrderClosed($this->order));
    }
}
