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
              <br><br>
              Dealer Level:

              <select class="form-control" name="category">
                <option value="Standard" @if($dealer_info->category == "Standard") selected @endif >Standard</option>
                <option value="Bronze" @if($dealer_info->category == "Bronze") selected @endif >Bronze</option>
                <option value="Silver" @if($dealer_info->category == "Silver") selected @endif >Silver</option>
                <option value="Gold" @if($dealer_info->category == "Gold") selected @endif >Gold</option>
                <option value="Platinum" @if($dealer_info->category == "Platinum") selected @endif >Platinum</option>
              </select>

              <br><br>

              Show on locator? &nbsp; <input type="checkbox" name="show_dealer" value="1" @if($dealer_info->show_dealer==1) checked @endif> 


            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              Notes: &nbsp; &nbsp;  <em>(This is for internal use only, and will not show up on the locators.)</em><br>
              <textarea name="notes" rows="8" style="width:100%">{{{ $dealer_info->notes or ''}}}</textarea>
            </div>
          </div>
          <h4>If you are updating the address, click here first:  <a class="btn btn-info" id="geo">Update geocode</a> </h4>


          <input type="submit" value="Update dealer" class="btn btn-success"/>

          <button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#myModal">Delete</button>
        </div>
    </form>
  </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete...</h4>
      </div>
      <div class="modal-body">
        <p>Are you <strong>SURE</strong> you want to delete? <br> <strong><em>This cannot be undone!</em></strong></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a type="button" class="btn btn-danger pull-right" href="/dealers/delete/{{$info['table']}}/{{$info['id']}}">Delete (forever!)</a>

      </div>
    </div>
  </div>
</div>

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="/static/js/geocodeImport1.js"></script>
@endforeach

@stop
