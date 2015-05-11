@extends('layouts.base')
@foreach($data as $dealer_info)

<?php $title= 'Edit dealer' ?>

@section('content')
<div class="container">


  @if(isset($status))
  <div class="row">
    <div class="alert alert-info col-md-7 col-md-offset-3">
      {{ $status }}
    </div>
  </div>
  @endif

  <div class="well">
    <form method="post" action="/dealers/update">

        <div class="form-input">
          <div class="row">
            <input type="hidden" name="table" value="{{$info['table']}}"/>
            <input type="hidden" name="dealer_id" value="{{$info['id']}}"/>


            <div class="col-sm-4">
              Dealer name:<input class="form-control" type="text" id="name" name="name" placeholder="(dealer name)" value="{{{ $dealer_info->name or '' }}}"> <br>
              Phone number:<input class="form-control" type="text" id="phone" name="phone" placeholder="(phone number)" value="{{{ $dealer_info->phone or '' }}}"> <br>
              Email address:<input class="form-control" type="text" id="email" name="email" placeholder="(email address)" value="{{{ $dealer_info->email or '' }}}"> <br>

            </div>

            <div class="col-sm-4">
              Address: <input class="form-control" type="text" id="address" name="address" placeholder="(address)" value="{{{ $dealer_info->address or '' }}}"> <br>
              City: <input class="form-control" type="text" id="city" name="city" placeholder="(city)" value="{{{ $dealer_info->city or '' }}}"> <br>
              State: <input class="form-control" type="text" id="state" name="state" placeholder="(state)" value="{{{ $dealer_info->state or '' }}}"> <br>
              Postal: <input class="form-control" type="text" id="postal" name="postal" placeholder="(postal)" value="{{{ $dealer_info->postal or '' }}}"> <br>
              Country: <input class="form-control" type="text" id="country" name="country" placeholder="(country)" value="{{{ $dealer_info->country or '' }}}"> <br>
            </div>

            <div class="col-sm-4">
              Latitude: <input class="form-control" type="text" id="lat" name="lat" placeholder="Click 'Get geocode'" readonly value="{{{ $dealer_info->lat or '' }}}"> <br>
              Longitude: <input class="form-control" type="text" id="lng" name="lng" placeholder="Click 'Get geocode'" readonly value="{{{ $dealer_info->lng or '' }}}"> <br>

            </div>
          </div>
          <a class="btn btn-info" id="geo">Update geocode</a>

          <input type="submit" value="Update dealer" class="btn btn-success"/>

        </div>
    </form>
  </div>
</div>

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="/static/js/geocodeImport1.js"></script>
@endforeach

@stop
