@extends('layouts.base')

<?php $title="Generate a report" ?>

@section('content')
<div class="container">

  @if(isset($status))
  <div class="alert alert-info col-md-7 col-md-offset-3">
    {{ $status }}
  </div>
  @endif



<div class="row">
  <div class="col-xs-12">
    <h3 class="text-center">Unavailible.</h3>
    <p class="text-center">
      Looking to run a report? Let us know what it needs to include.
    </p>
</div>



  </div>

@stop
