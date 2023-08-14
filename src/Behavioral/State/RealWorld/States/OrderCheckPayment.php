<?php

namespace Warden\Patterns\Behavioral\State\RealWorld\States;

class OrderCheckPayment extends OrderState
{
    public function next()
    {
        if ($this->order->isPaid()) {
            $this->order->setState(new OrderAccepted($this->order));
        }

        if ($this->isNotChanged()) {
            echo "Order is not payed yet \n";
        }
    }
}
