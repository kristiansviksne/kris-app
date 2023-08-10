<?php

namespace App\Services;

use App\Interfaces\PaymentServiceInterface;

class PaymentServiceTwo implements PaymentServiceInterface
{
    public function __construct(private string $method)
    {

    }

    public function processPayment() {
        echo "This is method ".$this->method;
    }
}