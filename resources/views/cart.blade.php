@extends('layouts.app')
@section('content')

<h1 class="my-4">Shopping Cart</h1>

      <!-- Marketing Icons Section -->
      <!-- Project One -->
      <div class="row">
        <div class="col-xs-12 col-sm-2">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
          </a>
        </div>
        <div class="col-xs-12 col-sm-3 col-lg-3">
          <h4>Title</h4>
        </div>
        <div class="col-xs-12 col-sm-3 col-lg-3">
          <button class="btn btn-default" type="submit" name="button">-</button>
            <input class="cart-inp" type="text" name="" value="1">
          <button class="btn btn-default" type="submit" name="button">+</button>
        </div>
        <div class="col-xs-12 col-sm-3 col-lg-3">
          <h4>$$$</h4>
        </div>
        <div class="col-xs-12 col-sm-1 col-lg-1">
          <button class="btn btn-default" type="submit" name="button">X</button>
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <div class="row">
        <div class="col-xs-12 col-sm-2">
          <h5>Total Price</h5>
        </div>
      </div>

@endsection
