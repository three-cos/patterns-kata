<?php

namespace Warden\Patterns\Behavioral\State\RealWorld\States;

use LogicException;

class OrderClosed extends OrderState
{
    public function next()
    {
        throw new LogicException('Order is finished');
    }
}
