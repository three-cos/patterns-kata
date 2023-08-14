<?php

namespace Warden\Patterns\Behavioral\State\RealWorld\States;

use Warden\Patterns\Behavioral\State\RealWorld\Order;

class OrderCreating extends OrderState
{
    public function __construct(protected Order $order, protected array $paymentInfo)
    {
        parent::__construct($order);
    }

    public function next()
    {
        if ($this->paymentInfo['method'] === 'cash') {
            $this->order->setState(new OrderAccepted($this->order));
        } else {
            $this->order->setState(new OrderNeedPayment($this->order));
        }
    }
}
