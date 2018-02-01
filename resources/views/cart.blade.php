@extends('layouts.app')
@section('content')

<h1 class="my-4">Shopping Cart</h1>


      @foreach ($dishes as $dish)
      <div class="row">

        <div class="col-xs-12 col-sm-2">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="{{ $dish->url }}" alt="">
          </a>
        </div>
        <div class="col-xs-12 col-sm-3 col-lg-3">
          <h4>{{ $dish->title }}</h4>
        </div>
        <div class="col-xs-12 col-sm-3 col-lg-3">
          <button class="btn btn-default" type="submit" name="button">-</button>
            <input class="cart-inp" type="text" name="" value="1">
          <button class="btn btn-default" type="submit" name="button">+</button>
        </div>
        <div class="col-xs-12 col-sm-3 col-lg-3">
          <h4>{{ $dish->price }}</h4>
        </div>
        <div class="col-xs-12 col-sm-1 col-lg-1">
          <a class="btn btn-default" type="submit" name="button" href="{{ route('cartItem_destroy', $cartItems->id) }}">X</a>
        </div>
      </div>
    @endforeach
      <!-- /.row -->

      <hr>

      <div class="row">
        <div class="col-xs-12 col-sm-3">
          <h5 style="font-weight: bold">Sub Total: {{ $cartPrice }} Eur</h5>
        </div>
      </div>

      <div class="row">
          <div class="col-xs-12 col-sm-3">
            <h5 style="font-weight: bold">VAT: {{ ($cartPrice)*0.21 }} Eur</h5>
          </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-3">
              <h5 style="color:red; font-weight: bold">Total: {{ ($cartPrice)*0.21+$cartPrice }} Eur</h5>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-3">
              <form class="" action="{{ route('checkout') }}" method="post">
                <input type="hidden" name="total_amount" value="{{ ($cartPrice)*0.21 }}">
                <input type="hidden" name="tax_amount" value="{{ ($cartPrice)*0.21+$cartPrice }}">
                <input type="hidden" name="user_id" value="{{ ($cartPrice)*0.21+$cartPrice }}">
                <a class="btn btn-success" name="button" href="">Order</a>
              </form>
            </div>
          </div>



@endsection
