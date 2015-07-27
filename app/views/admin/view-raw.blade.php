@extends('layouts.base')

<?php $title="Raw" ?>

@section('content')
<div class="container">

<div class="well">
  <div class="row">
    <a class="btn btn-default" href="/raw/export">Move table</a>
  </div>
</div>

@foreach($dealers as $dealer)
<div class="well">

  <form method="get" action="/dealers/update/raw/{{$dealer->id}}">
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
</div>

@endforeach


@stop
