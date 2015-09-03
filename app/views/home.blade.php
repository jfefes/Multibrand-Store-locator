@extends('layouts.base')

<?php $title="Home" ?>

@section('content')
<div class="container">

  @if(isset($status))
  <div class="alert alert-info col-md-7 col-md-offset-3">
    {{ $status }}
  </div>
  @endif



<div class="row">
  <div class="col-xs-12 col-sm-6">
    <h3 class="text-center">Brands:</h3>
    <p>
      Click a brand to add a new dealer, update an existing dealer, export, search, etc.
    </p>
    <div class="row">

      @foreach($brands as $brand)
        <div class="col-xs-3">
          <a href="/dealers/show/{{$brand->id}}" class="btn btn-default">{{$brand->name}}</a>
        </div>
      @endforeach
    </div>

    <div class="row">
      <br>
      <br>
      <br>
      <p>
        Testing something out? Changes in 'sandbox' won't effect anything- its simply for experimenting.
      </p>
    </div>
  </div>

  <div class="col-xs-12 col-sm-6">
    <h3 class="text-center">Other actions</h3>
    <div class="text-center">
      <div class="well" id="tools">
        <div class="row">
          <div class="text-left">
            <a style="margin-left:20px" href="/report" class="btn btn-primary">Run a report</a>
            <a style="margin-left:20px" href="warranty" class="btn btn-primary">Add to dealer warranty</a>
          </div>
        </div>
      </div>
      <br>
      <br>
      <h3>Sales Rep maps</h3>
      <div class="well">
        <a style="margin-left:20px" href="/reps/maps/ny-pa" class="btn btn-primary">New York and PA</a>
        <a style="margin-left:20px" href="/reps/report/new" class="btn btn-primary">Create</a>
      </div>
    </div>
  </div>

</div>

@stop
