<?php

namespace Warden\Patterns\Behavioral\State\RealWorld;

use Throwable;
use Warden\Patterns\Behavioral\State\RealWorld\States\OrderCreating;

class Example
{
    public function __invoke()
    {
        $order = new Order();

        $order->setState(new OrderCreating($order, [
            'method' => 'online' // cash | online
        ]));

        try {
            while (true) {
                $order->nextState();
            }
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
    }
}