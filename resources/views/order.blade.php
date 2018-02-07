@extends('layouts.app')
@section('content')
    <h1 class="my-4">Orders (Nr)</h1>

    <hr>

    <div class="panel panel-default">

@if (Auth::check() && Auth::user()->isAdmin())
      <table class="table">
          <thead>
            <tr>
              <th></th>
              <th>Nr</th>
              <th>Order ID</th>
              <th>Customer ID</th>
              <th>Customer Name</th>
              <th>Total Amount</th>
              <th>Tax Amount</th>
              <th>Created</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
            <tr>
              <td></td>
                <td>Nr</td>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user_id }}</td>
                <td>{{ $order->users->name }} {{ $order->users->surname }}</td>
                <td>{{ $order->total_amount }}</td>
                <td>{{ $order->tax_amount }}</td>
                <td>{{ $order->created_at }}</td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>Totals:</th>
              <th>{{ $quantity }}</th>
              <th></th>
              <th></th>
              <th></th>
              <th>{{ $totalSum }}</th>
              <th>{{ $totalTax }}</th>
              <th></th>
            </tr>
          </tfoot>
        </table>

      @else

        <table class="table">
          <thead>
            <tr>
              <th></th>
              <th>Nr</th>
              <th>Order ID</th>
              <th>Dish Name</th>
              <th>Price</th>
              <th>Created</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
            <tr>
              <td></td>
                <td>Nr</td>
                <td>{{ $order->id }}</td>
                <td>
                  {{-- <ul>
                    @foreach ()
                      <li><small><a href="#">Dish Name</a></small></li>
                    @endforeach
                  </ul> --}}
                </td>
                <td>{{ $order->total_amount }}</td>
                <td>{{ $order->created_at }}</td>
            </tr>
            @endforeach
          </tbody>
      </table>

    @endif
    </div>




@endsection
