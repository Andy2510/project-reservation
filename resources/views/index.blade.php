@extends('layouts.app')

{{-- <!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Restoranas 'Atgaiva'</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html">Restoranas</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto pull-right">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Register/Login
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                <a class="dropdown-item" href="{{ route('login') }}">Login</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav> --}}

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4">Mes siulome:</h1>

      <!-- Portfolio Section -->
      <div class="row">


@foreach ($dishes as $dish)
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-50">
            <a href="#"><img class="card-img-top" src="{{ $dish->url }}" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">{{ $dish->title }}</a>
              </h4>
              <p class="card-text">{{ $dish->description }}</p>
              <h5>{{ $dish->price}}</h5>
            </div>
            <div class="card-footer">
                <form class="" action="{{ route('addToCart') }}" method="post" >
                  {{ csrf_field() }}
                    <input type="hidden" name="dish_id" value="{{ $dish->id }}">
                    <button type="submit" class="btn btn-primary add-dish">Order</button>

              @if (Auth::user()->isAdmin())
                    <a href="{{ route('destroy', $dish->id) }}" class="btn btn-danger" role="button">Delete</a>
                    <a href="{{ route('dish_edit', $dish->id) }}" class="btn btn-info" role="button">Edit</a>
              @endif

                </form>
            </div>
          </div>
        </div>
@endforeach

<div class="container">
  <div class="row">
    <div class="col-lg-4 col-sm-6">

      @if (Auth::user()->isAdmin())
      <a href="{{ route('dish_create') }}" class="btn btn-info" role="button">Insert new dish</a>
      @endif

    </div>

  </div>

</div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
    crossorigin="anonymous"></script>
  <script type="text/javascript">

      $(document).ready(function(){
        $('.add-dish').on('click', function(e){
          e.preventDefault(); //sustabdo ivyki
          var form = $(this).parent();
          console.log(form.serialize());

          $.ajax({
              url: form.attr('action'),
              method: "POST",
              data: form.serialize(),
              success: function(data){
                var parsed = JSON.parse(data);
                console.log(parsed);
              },
              error: function(msg){
                console.log(msg.responseText);
                $('html').prepend(msg.responseText);
              }
          })
        });
      });

  </script>
      <!-- /.row -->
      </div>


      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

    </div>
    <!-- /.container -->

    {{-- <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Restoranas 'Atgaiva' &copy; 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  </body>

</html> --}}
