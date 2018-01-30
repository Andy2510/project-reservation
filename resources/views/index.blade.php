@extends('layouts.app')
@section('content')




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

              @if (Auth::check() && Auth::user()->isAdmin())
                    <a href="{{ route('destroy', $dish->id) }}" class="btn btn-danger" role="button">Delete</a>
                    <a href="{{ route('dish_edit', $dish->id) }}" class="btn btn-info" role="button">Edit</a>
              @endif

                </form>
            </div>
          </div>
        </div>
@endforeach
      </div>


  <div class="row">
    <div class="col-lg-4 col-sm-6">

      @if (Auth::check() && Auth::user()->isAdmin())
      <a href="{{ route('dish_create') }}" class="btn btn-info" role="button">Insert new dish</a>
      @endif

    </div>

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
                      </div>$('html').prepend(msg.responseText);
                }
            })
          });
        });

    </script>
@endsection
    <!-- /.container -->
