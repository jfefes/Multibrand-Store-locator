@extends('layouts.base')
@section('content')

<?php $title= $table . ' Dealers' ?>

<div class="container">

  @if(isset($status))
  <div class="row">
    <div class="alert alert-info col-md-7 col-md-offset-3">
      {{ $status }}
    </div>
  </div>
  @endif

  <h2>Results for "{{$key}}":</h2>

    @foreach($results as $dealer)
      <div class="well">

        <form method="get" action="/dealers/update/{{$table}}/{{$dealer->id}}">
            <div class="form-input">
              <div class="row">

                <div class="col-sm-4">
                  Dealer name:    <strong>{{ $dealer->name }}</strong> <br>
                  Phone number:   <strong>{{ $dealer->phone }}</strong> <br>

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

                  <br>
                  @if(isset($dealer->show_dealer))
                  Dealer is
                    @if($dealer->show_dealer==0)
                    <strong>NOT</strong>
                    @endif
                  showing on locator
                  @endif

                </div>
              </div>
              <input type="submit" value="Edit" class="btn btn-success"/>

            </div>
        </form>
        <hr>
      </div>
      <br>
    @endforeach
  </div>

@stop
