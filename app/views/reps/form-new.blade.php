@extends('layouts.base')

<?php $title="Home" ?>

@section('content')
<div class="container">

  @if(isset($status))
  <div class="alert alert-info col-md-7 col-md-offset-3">
    {{ $status }}
  </div>
  @endif


  <form class="" action="/reps/generate-map" method="post">


    <div class="well row">
      <h4>Step 1: Select brand, and/or add multiple brands</h4>
      <br>

      <div class="col-xs-4">
        <div id="brand"></div>
      </div>

      <div class="col-xs-6">
        Brand(s)
        <br>
        <input type="button" class="btn btn-primary" value="Add brand" onClick="addBrand();">
      </div>

    </div>

    <div class="well row">
      <h4>Step 2: Add location(s) using 2-letter abbreviation</h4>
      <br>
      <div class="col-xs-4">
        <div id="location"></div>
      </div>
      <div class="col-xs-4">
        Location(s)
        <br>
        <input type="button" class="btn btn-primary" value="Add location" onClick="addLocation();">
      </div>

    </div>

    <input type="submit" class="btn btn-success" value="Generate Map">
  </form>

</div>


<script type="text/javascript">

  function addBrand(){
    var content =  "<div class='row'>";
    content+=    "<br>";
    content+= "   <select class='form-control' name='brand[]'>"
    content+= "     @foreach($brands as $brand)"
    content+= "       <option value='{{$brand->dealer_table}}'>{{$brand->name}}</option>"
    content+= "     @endforeach"
    content+= "  </select>"

   var newdiv = document.createElement('div');
    newdiv.innerHTML = content;
    document.getElementById('brand').appendChild(newdiv);
  }


  function addLocation(){
    var content =  "<div class='row'>";
    content+=    "<br>";
    content+=    "<input type='text' name='location[]' value=''>";

    var newdiv = document.createElement('div');
    newdiv.innerHTML = content;
    document.getElementById('location').appendChild(newdiv);
  }

</script>

@stop
