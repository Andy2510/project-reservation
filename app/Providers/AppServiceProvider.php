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

          $dishes = Dish::whereHas('carts', function ($query) {
            $query->where('token', '=', csrf_token());
          })
          ->get();
          $cartPrice = 0;
          foreach ($dishes as $dish) {
             $cartPrice = round(($cartPrice + $dish->price), 3, PHP_ROUND_HALF_UP);
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
