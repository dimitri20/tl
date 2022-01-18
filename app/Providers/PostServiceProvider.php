<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Orchid\Crud\Arbitrator;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Arbitrator $arbitrator)
    {
        $arbitrator->resources([
            UserResource::class,
        ]);
    }
}
