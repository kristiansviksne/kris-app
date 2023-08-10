<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\PaymentServiceInterface;
use App\Services\PaymentServiceOne;
use App\Services\PaymentServiceTwo;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentServiceInterface::class, function() {
            return new PaymentServiceTwo("two");
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
