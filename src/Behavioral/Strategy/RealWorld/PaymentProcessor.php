<?php

namespace Warden\Patterns\Behavioral\Strategy\RealWorld;

class PaymentProcessor
{
    public function process(int $payment, PaymentMethod $paymentMethod): void
    {
        $paymentMethod->process($payment);
    }
}

interface PaymentMethod
{
    public function process(int $payment);
}

class PayPal implements PaymentMethod
{
    public function process(int $payment)
    {
        var_dump("pay {$payment} via paypal gateway");
    }
}

class CreditCard implements PaymentMethod
{
    public function process(int $payment)
    {
        var_dump("pay {$payment} with credit card");
    }
}

class BankTransfer implements PaymentMethod
{
    public function process(int $payment)
    {
        var_dump("pay {$payment} via bank transfer");
    }
}

$processor = new PaymentProcessor;
$processor->process(1000, new BankTransfer);
$processor->process(2000, new PayPal);