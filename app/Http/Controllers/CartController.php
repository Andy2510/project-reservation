<?php

namespace App\Http\Controllers;
use App\Dish;
use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
      public function __construct() {
         // $this->middleware('auth')->except('index');
          $this->middleware('isAdmin')->except('index', 'show');
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $post = [
        'token' => $request['_token'],
        'dish_id' => $request['dish_id']
      ];
      $cart = Cart::create($post);

      //kitas variantas
      // $cart = new Cart;
      // $cart->token = $request->_token;
      // $cart->dish_id = $request->dish_id;
      // $cart->save();

      $dish = Dish::where('id', $request->dish_id)->first();

      $cart->price = $dish->price;

      echo json_encode($cart);
      }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $dishes = Cart::where('token', csrf_token())->get();

      $items = [];
      foreach($dishes as $dish) {
        $items[] = $dish->dishes;
      }

      return view('cart', [
        'dishes' => $items,
        'cartItems' => $dishes
      ]);


        // return view('cart', $dishes = Cart::where('token', csrf_token())->dishes->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $item = Cart::findOrFail($id);
      $item->delete();
      return redirect()->route('cart');
    }
}
