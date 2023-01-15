<?php
namespace App\Repositories\Order;

use Illuminate\Support\ServiceProvider;

class OrderRespositoryServiceProvider extends ServiceProvider

{

    /**
    * Bootstrap the application services.
    *
    * @return void
    */
    public function boot(){

    }

    /**
    * Register the application services.
    *
    * @return void
    */
    public function register(){

        $this->app->bind('App\Repositories\Order\OrderInterface', 'App\Repositories\Order\OrderRepository');

    }

}