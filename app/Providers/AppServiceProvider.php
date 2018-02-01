<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Session;
use App\Cart;
use App\Dish;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {
          $count = Cart::where('token', csrf_token())->count();
          View::share('count', $count);
          // $cartPrice = Cart::where('token', csrf_token())->sum();

          $dishes = Cart::where('token', csrf_token())->get();
          $cartPrice = 0;

          foreach ($dishes as $dish) {
             $cartPrice = number_format($cartPrice + $dish->dishes->price, 2);
          }
          View::share('cartPrice', $cartPrice);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
