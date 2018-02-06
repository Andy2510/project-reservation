<?php

namespace App\Http\Controllers;

use Auth;
use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $orders = Order::where('user_id', Auth::user()->id)->get();
      dump($orders);

      $cartItems = $orders[0];

        // $cartItems = $orders[0]->carts();
        // dump($cartItems);

        foreach ($orders[0]->carts as $cartItem) {

          dump($cartItem);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *arts
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->except('_token');
        $order = Order::create($post);

        //update user_id field in carts table for successfuly ordered cart Items


        $cartItems = Cart::where('token', csrf_token())
        ->whereNull('order_id')
        ->get();

        

        foreach ($cartItems as $cartItem) {
          $cartItem->order_id = $order->id;

          $cartItem->save();
        }

        return redirect()->to('/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $orders = Order::get();
        return view ('orders_show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
