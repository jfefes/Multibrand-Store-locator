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



  <h3>Move contents to new table</h3>


  <div class="well">
    <form action="/raw/export" method="POST" enctype="multipart/form-data">

        <div class="form-input">
          <div class="row">

            <div class="col-sm-4">

              Select brand:
              <select class="form-control" name="brand" id="brand">
                @foreach($brands as $brand)
                  <option value="{{ $brand->dealer_table }}">{{ $brand->name }}</option>
                @endforeach
              </select> <br>

            </div>
          </div>


          <br><br>

          <input type="submit" value="Transfer" class="btn btn-success"/>

        </div>
    </form>
  </div>


</div>

@stop
