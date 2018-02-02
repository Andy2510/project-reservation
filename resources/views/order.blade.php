@extends('layouts.app')
@section('content')
    <h1 class="my-4">Orders (Nr)</h1>

    <hr>

    <div class="panel panel-default">

      <table class="table">
        <thead>
          <tr>
            <th>Nr</th>
            <th>Orders</th>
            <th>User</th>
            <th>Address</th>
            <th>Total Amount</th>
            <th>Tax Amount</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Nr</th>
            <td>
              <ul>
                <li><small><a href="#">Dish Name</a></small></li>
              </ul>
            </td>
            <td>User</td>
            <td>Address</td>
            <td>Total Amount</td>
            <td>Tax Amount</td>
            <td>date</td>
          </tr>
        </tbody>

      </table>

    </div>




@endsection
