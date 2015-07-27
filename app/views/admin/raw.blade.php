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

  <h3>Import new info to a dealer</h3>


  <div class="well">
    <form action="/dealers/import/raw" method="POST" enctype="multipart/form-data">

        <div class="form-input">
          <div class="row">

            <div class="col-sm-4">
              {{ Form::file('import'); }} <br>



            </div>
          </div>


          <br><br>

          <input type="submit" value="Import" class="btn btn-success"/>

        </div>
    </form>
  </div>


</div>

@stop
