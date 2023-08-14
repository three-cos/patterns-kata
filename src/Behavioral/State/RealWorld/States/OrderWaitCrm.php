<?php

namespace Warden\Patterns\Behavioral\State\RealWorld\States;

class OrderWaitCrm extends OrderState
{
    public function next()
    {
        if (rand(0, 1)) {
            $this->order->setState(new OrderCrmConfirm($this->order));
        } else {
            $this->order->setState(new OrderCrmError($this->order));
        }
    }
}
