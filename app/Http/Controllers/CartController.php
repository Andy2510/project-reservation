<?php

namespace App\Http\Controllers;
use App\Dish;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\PhotoHelper;


class CartController extends Controller
{
      private $photoHelper;

      public function __construct(PhotoHelper $photoHelper) {
         // $this->middleware('auth')->except('index');
          // $this->middleware('isAdmin')->except('index', 'show', 'store');
          $this->photoHelper = $photoHelper;
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
      $mergedItems = DB::table('carts')
       ->select('carts.id', 'dishes.title', 'dishes.price')
       ->join('dishes', 'carts.dish_id', '=', 'dishes.id')
       ->where('carts.token', csrf_token())
       ->get();

      $items = [];
      foreach($dishes as $dish) {
        $items[] = $dish->dishes;
      }
      // dd($items);


      return view('cart', [
        'dishes' => $items,
        'cartItems' => $mergedItems
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
      return redirect()->route('cart_show');

    }
}
