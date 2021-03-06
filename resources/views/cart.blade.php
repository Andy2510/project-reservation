@extends('layouts.app')
@section('content')

<h1 class="my-4">Shopping Cart</h1>


    @foreach ($cartItems as $cartItem)

      <div class="row">

        <div class="col-xs-12 col-sm-2">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="{{ $cartItem->dishes->url }}" alt="">
          </a>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-4">
          <h4>{{ $cartItem->dishes->title }}</h4>
        </div>

        <div class="col-xs-12 col-sm-4 col-lg-4">
          <h4>{{ $cartItem->dishes->price }}</h4>
        </div>
        <div class="col-xs-12 col-sm-1 col-lg-1">
          <a class="btn btn-default" type="submit" class="destroy-button" href="{{ route('cartItem_destroy', $cartItem->id) }}">X</a>
        </div>
      </div>
    @endforeach

      <!-- /.row -->

      <hr>

      <div class="row">
        <div class="col-xs-12 col-sm-3">
          <h5 style="font-weight: bold">Sub Total: {{ $beforeTaxes }} Eur</h5>
        </div>
      </div>

      <div class="row">
          <div class="col-xs-12 col-sm-3">
            <h5 style="font-weight: bold">VAT: {{ $vat }} Eur</h5>
          </div>
      </div>

        <div class="row">
            <div class="col-xs-12 col-sm-3">
              <h5 style="color:red; font-weight: bold">Total: {{ $total }} Eur</h5>
            </div>


          </div>
          <br>

          <div class="row">
            <div class="col-xs-12 col-sm-2">
              <form action="{{ route('order') }}" method="post">
                {{ csrf_field() }}

                <input type="hidden" name="total_amount" value="{{ $total }}">
                <input type="hidden" name="tax_amount" value="{{ $vat }}">
                <input type="hidden" name="user_id" value="
                @guest
                @else
                {{ Auth::user()->id }}
                @endguest">
                <button class="btn btn-success" name="button" type="submit">Order</button>
              </form>
            </div>


            <div class="col-xs-12 col-sm-2">
                <a href="{{ route('reservate') }}" class="btn btn-info" role="button">Reservate a table</a>
            </div>
          </div>
        </div>
          <br>
          <br>

@endsection
