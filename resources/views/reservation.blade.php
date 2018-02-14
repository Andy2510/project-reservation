@extends('layouts.app')
@section('content')
    <h1 class="my-4">Reservations</h1>

    <hr>

   <div class="panel panel-default">

@if (Auth::check() && Auth::user()->isAdmin())
      <h3>Reservations (Admin mode)</h3>
      <br>
      <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th></th>

              <th>Reservation Id</th>
              <th>Customer ID</th>
              <th>Customer Name</th>
              <th>Customer Phone</th>
              <th>Amount of Persons</th>
              <th>Reservated at (date)</th>
              <th>Reservated at (time)</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($reservations as $reservation)
            <tr>
              <td></td>

                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->user_id }}</td>
                <td>{{ $reservation->name }}</td>
                <td>{{ $reservation->phone }}</td>
                <td>{{ $reservation->no_persons }}</td>
                <td>{{ $reservation->date }}</td>
                <td>{{ $reservation->time }}</td>

            </tr>
            @endforeach
          </tbody>
        </table>
@endif





@if (Auth::user() && !Auth::user()->isAdmin())
        <br>

        <table class="table table-bordered table-hover">
          <thead>
            <tr>

              <th>Customer Name</th>
              <th>Customer Phone</th>
              <th>Amount of Persons</th>
              <th>Reservated at (date)</th>
              <th>Reservated at (time)</th>
              <th>Delete Reservation</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($reservations as $reservation)
            <tr>
              <td>{{ $reservation->name }}</td>
              <td>{{ $reservation->phone }}</td>
              <td>{{ $reservation->no_persons }}</td>
              <td>{{ $reservation->date }}</td>
              <td>{{ $reservation->time }}</td>
              <td><a class="btn btn-default" type="submit" class="destroy-button" href="{{ route('reservation_destroy', $reservation->id) }}">X</a></td>
            </tr>
              @endforeach
          </tbody>
      </table>


    </div>

@endif

@endsection
