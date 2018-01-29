@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-lg-8 mb-4">
        <h3>Edit your selected dish</h3>
        <form name="sentMessage" id="contactForm" novalidate method="POST" action="{{ route('dish_update', $dish->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}

          <div class="control-group form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <div class="controls">
              <label>Title:</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $dish->title) }}">
              @if ($errors->has('title'))
                  <span class="help-block">
                      <strong>{{ $errors->first('title') }}</strong>
                  </span>
              @endif
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <div class="controls">
              <label>Description:</label>
              <textarea rows="10" cols="40" class="form-control" name="description">{{ old('description', $dish->description) }}</textarea>
              @if ($errors->has('description'))
                  <span class="help-block">
                      <strong>{{ $errors->first('description') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="control-group form-group{{ $errors->has('price') ? ' has-error' : '' }}">
            <div class="controls">
              <label>Price:</label>
              <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $dish->price) }}">
              @if ($errors->has('price'))
                  <span class="help-block">
                      <strong>{{ $errors->first('price') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          {{-- <div class="control-group form-group">
            <div class="controls">
              <label>ImageUrl:</label>
              <input type="text" class="form-control" id="price" name="imageUrl" value="http://lorempixel.com/640/480/" >
            </div>
          </div> --}}
          <div class="control-group form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <div class="controls">
              <label>Photo:</label>
              <input type="file" name="imageUrl">

              @if ($errors->has('imageUrl'))
              <i class="has-error ">{{ $errors->first('imageUrl') }}</i></br>
              @endif

            </div>
          </div>
          <div id="success"></div>
          <!-- For success/fail messages -->
          <button type="submit" class="btn btn-primary" id="submit">Save</button>
        </form>
      </div>

    </div>
</div>
@endsection
