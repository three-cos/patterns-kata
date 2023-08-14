<?php

namespace Warden\Patterns\Behavioral\State\RealWorld\States;

class OrderNeedPayment extends OrderState
{
    public function next()
    {
        $this->order->setState(new OrderCheckPayment($this->order));
    }
}
