<?php

namespace App\Http\Controllers;

use App\Helpers\CerkauskasCartHelper;
use App\Helpers\PayseraHelper;
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

     public function __construct(CerkauskasCartHelper $cartHelper, PayseraHelper $payseraHelper) {
         $this->cartHelper = $cartHelper;
         $this->payseraHelper = $payseraHelper;
         $this->middleware('auth');
     }

    public function index()
    {


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
        if(!Auth::check()){
            return redirect('/login');
        }
        $post = $request->except('_token');
        // 3 possible payment statuses available:
        // payment_pending (laukiama apmokejimo)
        // payment_confirmed (apmoketa)
        // payment_canceled (atsauktas)


        $post['payment_status'] = 'payment_pending';
        $order = Order::create($post);

        //update user_id field in carts table for successfuly ordered cart Items
        $cartItems = Cart::where('token', csrf_token())
        ->whereNull('order_id')
        ->get();

        foreach ($cartItems as $cartItem) {
          $cartItem->order_id = $order->id;

          $cartItem->save();
        }

        $this->payseraHelper->payseraPay($order->id, $order->total_amount);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if(Auth::user()->isAdmin()){
          $orders = Order::get();
        }
        else{
          $orders = Order::where('user_id', Auth::user()->id)->get();
        }

        // $ordersArray = [];
        // foreach($orders as $order) {
        //
        //   $orderCartItems = [];
        //   $dishesInCart = [];
        //   $dishesInOrder = [];
        //
        //   $orderCartItems[] = $order->carts;
        //
        //   for ($i=0; $i < count($orderCartItems); $i++) {
        //       foreach ($orderCartItems[$i] as $dishInCart) {
        //       $dishesInCart[] = $dishInCart->dishes->title;
        //     }
        //     $dishesInOrder[] = $dishesInCart;
        //     $order['dishNamesInOrder'] = $dishesInCart;
        //     $dishesInCart = [];
        //   }
        //
        //
        //   $ordersArray[] = $order;
        // }

        $ordersArray = [];
        foreach($orders as $order) {
          $ordersArray[] = $order;
        }

        $cartItems = Cart::where('order_id', $order)->get();

        $dishTitlesArray = [];
        foreach($cartItems as $cartItem){
          $dishTitles = $cartItem->dishes->title;
          $dishTitlesArray[] = $dishTitles;
        }

        $quantity = $this->cartHelper->getQuantity($ordersArray);
        $totalSum = $this->cartHelper->getSum(array_pluck($orders, 'total_amount'));
        $totalTax = $this->cartHelper->getSum(array_pluck($orders, 'tax_amount'));


        return view ('order', [
          'quantity' => $quantity,
          'totalSum' => $totalSum,
          'totalTax' => $totalTax,
          'orders' => $ordersArray,
          'dishTitle' => $dishTitlesArray
        ]);
    }

    /**
     * Show the form for ertHelditing the specified resource.
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

    public function paymentSuccess() {

      $orderId = $this->payseraHelper->updatePaymentStatus();

      Order::findOrFail($orderId)->update([
        'payment_status' => 'payment_confirmed'
      ]);

      return view('paymentSuccess');
    }

    public function paymentCancel() {

      return view('paymentCancel');
    }


    public function payNow($id) {
      $orderAmount = Order::findOrFail($id)->total_amount;
      $this->payseraHelper->payseraPay($id, $orderAmount);

    }


}
