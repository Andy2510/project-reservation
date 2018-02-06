<?php

namespace App\Http\Controllers;
use Auth;
use App\Helpers\CerkauskasCartHelper;
use App\Dish;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Helpers\PhotoHelper;


class CartController extends Controller
{
        /**
       * @var CartHelper
       */
      private $cartHelper;


      // private $photoHelper;

      public function __construct(CerkauskasCartHelper $cartHelper) {
         // $this->middleware('auth')->except('index');
          // $this->middleware('isAdmin')->except('index', 'show', 'store');
          // $this->photoHelper = $photoHelper;
          $this->cartHelper = $cartHelper;
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
      $dishes = Cart::where('token', csrf_token())
      ->whereNull('order_id')->get();

      $items = [];
      foreach($dishes as $dish) {
        $items[] = $dish->dishes;

      }

      // calculate quantity/Total/Vat/beforeVat values using Helpers
      $quantity = $this->cartHelper->getQuantity($items);
      $total = $this->cartHelper->getTotal($items);
      $vat = $this->cartHelper->getVat($items);
      $beforeTaxes = $this->cartHelper->getBeforeTaxes($items);

      return view('cart', [
        'dishes' => $items,
        'quantity' => $quantity,
        'total' => $total,
        'vat' => $vat,
        'beforeTaxes' => $beforeTaxes
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
