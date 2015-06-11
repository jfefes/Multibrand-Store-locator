@extends('layouts.base')

<?php $title= $brand_info['name'] . ' Dealers' ?>

@section('content')
<div class="container">

  @if(isset($status))
  <div class="row">
    <div class="alert alert-info col-md-7 col-md-offset-3">
      {{ $status }}
    </div>
  </div>
  @endif

  <h3>Info for {{ $brand_info['name'] }}:</h3>

  <div class="well row">
    <p>Dealers: {{ $brand_info['count']}}</p>

    <a type="button" href="/dealers/edit/{{$brand_info['id']}}" class="btn btn-warning">View all dealers</a>

    <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#addDealer" aria-expanded="false" aria-controls="collapseExample">Add new dealer</button>

    <a type="button" class="btn btn-info" href="/dealers/map/{{$brand_info['table_name']}}">Preview map</a>

    <div class="dropdown pull-right">
      <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
        Export
        <span class="caret"></span>
      </button>

      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
        <li role="presentation"> <a role="menuitem" tabindex="-1" href="/dealers/get/?dealer={{$brand_info['table_name']}}">view Json</a> </li>
        <li role="presentation"> <a role="menuitem" tabindex="-1" href="/dealers/csv/{{$brand_info['table_name']}}">Download CSV</a></li>
      </ul>
    </div>

  </div>

  <div class="collapse" id="addDealer">
      <div class="well">
        <form method="post" action="/dealers/add">

            <div class="form-input">
              <div class="row">

                <input type="hidden" name="table" value="{{$brand_info['table_name']}}"/>

                <div class="col-sm-4">
                  Dealer name:<input class="form-control" type="text" id="name" name="name" placeholder="(dealer name)" value="{{{ $input['name'] or '' }}}"> <br>
                  Phone number:<input class="form-control" type="text" id="phone" name="phone" placeholder="(phone number)" value="{{{ $input['phone'] or '' }}}"> <br>
                  Email address:<input class="form-control" type="text" id="email" name="email" placeholder="(email address)" value="{{{ $input['email'] or '' }}}"> <br>

                </div>

                <div class="col-sm-4">
                  Address: <input class="form-control" type="text" id="address" name="address" placeholder="(address)" value="{{{ $input['address'] or '' }}}"> <br>
                  City: <input class="form-control" type="text" id="city" name="city" placeholder="(city)" value="{{{ $input['city'] or '' }}}"> <br>
                  State: <input class="form-control" type="text" id="state" name="state" placeholder="(state)" value="{{{ $input['state'] or '' }}}"> <br>
                  Postal: <input class="form-control" type="text" id="postal" name="postal" placeholder="(postal)" value="{{{ $input['postal'] or '' }}}"> <br>
                  Country: <input class="form-control" type="text" id="country" name="country" placeholder="(country)" value="{{{ $input['country'] or '' }}}"> <br>
                </div>

                <div class="col-sm-4">
                  Latitude: <input class="form-control" type="text" id="lat" name="lat" value="Click 'Get geocode'" readonly value="{{{ $input['lat'] or '' }}}"> <br>
                  Longitude: <input class="form-control" type="text" id="lng" name="lng" value="Click 'Get geocode'" readonly value="{{{ $input['lng'] or '' }}}"> <br>
                  <br> <br>
                  Level: <input class="form-control" type="text" id="category" name="category" value="{{{ $input['category'] or '' }}}"> <br>


                </div>
              </div>
              <a class="btn btn-info" id="geo">Get geocode</a>

              <input type="submit" value="Add dealer" class="btn btn-success"/>

            </div>
        </form>
      </div>
  </div>
</div>

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="/static/js/geocodeImport1.js"></script>
@stop
