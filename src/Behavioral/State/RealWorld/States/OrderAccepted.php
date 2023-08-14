<?php

namespace Warden\Patterns\Behavioral\State\RealWorld\States;

class OrderAccepted extends OrderState
{
    public function next()
    {
        $this->order->setState(new OrderWaitCrm($this->order));
    }
}
