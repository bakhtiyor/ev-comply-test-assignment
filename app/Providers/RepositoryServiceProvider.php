<?php

namespace App\Providers;

use App\Repository\Eloquent\SubscriptionRepository;
use App\Repository\SendMailRepositoryInterface;
use App\Repository\Service\SendMailRepository;
use App\Repository\SubscriptionRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SubscriptionRepositoryInterface::class, SubscriptionRepository::class);
        $this->app->bind(SendMailRepositoryInterface::class, SendMailRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
