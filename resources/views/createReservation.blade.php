@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-lg-8 mb-4">

        <h3 class="top-headlight">Create Reservation</h3>
        <form name="sentMessage" id="contactForm" method="POST" action="{{ route('reservation_store') }}" enctype="multipart/form-data">

            {{ csrf_field() }}

          <div class="control-group form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <div class="controls">
              <label>Name and Surname:</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
              @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif

            </div>
          </div>
          <div class="control-group form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <div class="controls">
              <label>Phone number:</label>
              <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
              @if ($errors->has('phone'))
                  <span class="help-block">
                      <strong>{{ $errors->first('phone') }}</strong>
                  </span>
              @endif

            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Number of persons:</label>
              <select type="number" class="form-control" id="no_persons" name="no_persons">
              @for ($i=1; $i<=10; $i++)
                  <option value="{{ $i }}" @if(old('no_persons') == $i) {{ 'selected' }} @endif>{{ $i }}</option>
              @endfor
              </select>
            </div>
          </div>
          <div class="control-group form-group{{ $errors->has('date') ? ' has-error' : '' }}">
            <div class="controls">
              <label>Reservation date:</label>
              <input type="text" class="form-control" id="date" name="date" value="{{ old('date') }}">
              @if ($errors->has('date'))
                  <span class="help-block">
                      <strong>{{ $errors->first('date') }}</strong>
                  </span>
              @endif

            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Reservation time:</label>
              <select type="text" class="form-control" id="time" name="time">

              @for ($hours=10; $hours<=22; $hours++)
                  @for ($min=0; $min<=30; $min+=30)
<<<<<<< HEAD
                    <option value="{{ $hours }}:{{ str_pad($min, 2, '0', STR_PAD_LEFT) }}">{{ $hours }}:{{ str_pad($min, 2, '0', STR_PAD_LEFT) }}</option>
=======
                    <option value="{{ $hours }}:{{ str_pad($min, 2, '0', STR_PAD_LEFT) }}" @if(old('time') ==  $hours . ":" . str_pad($min, 2, '0', STR_PAD_LEFT)) {{ 'selected' }} @endif>{{ $hours }}:{{ str_pad($min, 2, '0', STR_PAD_LEFT) }}</option>
>>>>>>> 9e5832218e5574c4d22558f64cc2809ed96e6f5b
                  @endfor
                @endfor
              </select>
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
