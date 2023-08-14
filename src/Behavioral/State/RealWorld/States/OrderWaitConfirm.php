<?php

namespace Warden\Patterns\Behavioral\State\RealWorld\States;

class OrderWaitConfirm extends OrderState
{
    public function next()
    {
        $this->order->setState(new OrderAccepted($this->order));
    }
}
