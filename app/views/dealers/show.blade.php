@extends('layouts.base')

@section('content')

<div class="container">

  @if(isset($status))
  <div class="row">
    <div class="alert alert-info col-md-7 col-md-offset-3">
      {{ $status }}
    </div>
  </div>
  @endif

  <h3>Info for {{ $data['brand'] }}:</h3>

  @foreach($data['dealers'] as $dealer)
    <form method="get" action="/dealers/update/{{ $data['table']}}/{{$dealer->id}}">
        <div class="form-input">
          <div class="row">

            <div class="col-sm-4">
              Dealer name:    <strong>{{ $dealer->name }}</strong> <br>
              Phone number:   <strong>{{ $dealer->phone }}</strong> <br>
              Email:          <strong>{{ $dealer->email }}</strong> <br>

            </div>

            <div class="col-sm-4">
              Address:  <strong>{{ $dealer->address }}</strong> <br>
              City:     <strong>{{ $dealer->city }}</strong> <br>
              State:    <strong>{{ $dealer->state }}</strong> <br>
              Postal:   <strong>{{ $dealer->postal }}</strong> <br>
              Country:  <strong>{{ $dealer->country }}</strong> <br>
            </div>

            <div class="col-sm-4">
              Latitude:   <strong>{{ $dealer->lat }}</strong> <br>
              Longitude:  <strong>{{ $dealer->lng }}</strong> <br>

              @if(isset($dealer->category))
              <br>
                Dealer level:  <strong>{{ $dealer->category }}</strong> <br>
              @endif

            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <p>Notes:  <strong>  {{{ $dealer->notes or ''}}} </strong></p>
            </div>
          </div>
          <input type="submit" value="Edit" class="btn btn-success"/>

        </div>
    </form>
    <hr>
  @endforeach
</div>

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="/static/js/geocodeImport1.js"></script>

@stop
