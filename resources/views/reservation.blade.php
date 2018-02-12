@extends('layouts.app')
@section('content')

<h1 class="my-4">Reservation Edit</h1>


    @foreach ($reservations as $reservation)

      <div class="row">

        <div class="col-xs-12 col-sm-3 col-lg-3">
          <h3>{{ $reservation->name }}</h3>
        </div>
        <div class="col-xs-12 col-sm-3 col-lg-3">
          <h3>{{ $reservation->no_persons }}</h3>
        </div>
        <div class="col-xs-12 col-sm-3 col-lg-3">
          <h3>{{ $reservation->date }}</h3>
        </div>
        <div class="col-xs-12 col-sm-3 col-lg-3">
          <h3>{{ $reservation->time }}</h3>
        </div>
        <div class="col-xs-12 col-sm-1 col-lg-1">
          <a class="btn btn-default" type="submit" class="destroy-button" href="{{ route('cartItem_destroy', $cartItem->id) }}">X</a>
        </div>
      </div>
    @endforeach

      <!-- /.row -->

      <hr>

@endsection
