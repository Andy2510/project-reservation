@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-lg-8 mb-4">
        <h3>Send us a Message</h3>
        <form name="sentMessage" id="contactForm" novalidate method="POST" action="{{ route('profile_update', Auth::user()->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}

          <div class="control-group form-group">
            <div class="controls">
              <label>Title:</label>
              <input type="text" class="form-control" id="title" name="title">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Description:</label>
              <textarea rows="10" cols="40" class="form-control" name="description"></textarea>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Price:</label>
              <input type="text" class="form-control" id="price" name="price">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Photo:</label>
              <input type="file" name="upload">
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
