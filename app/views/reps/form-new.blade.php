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
      <input type="button" class="btn btn-primary" value="Add brand" onClick="addBrand();">

      <br>

      <div class="col-xs-4">
        <div id="brand"></div>
      </div>


    </div>

    <div class="well row">
      <h4>Step 2: Add location(s) using 2-letter abbreviation</h4>
      <br>
      <div class="col-xs-8">
        Location(s): Enter multiple locations, seperated by a comma- (Leave blank for all locations)
          <input type="text" class="form-control" name="location" value="" placeholder="Example: NY, PA">
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
</script>

@stop
