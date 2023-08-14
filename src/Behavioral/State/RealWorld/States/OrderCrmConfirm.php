<?php

namespace Warden\Patterns\Behavioral\State\RealWorld\States;

class OrderCrmConfirm extends OrderState
{
    public function next()
    {
        $this->order->setState(new OrderClosed($this->order));
    }
}
