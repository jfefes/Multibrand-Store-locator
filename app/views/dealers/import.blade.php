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

  <div class="row">
    <div class="alert alert-danger col-md-7 col-md-offset-3">
      <strong>NOTE:</strong> Importing a file into an existing brand will erase any pre-existing data. To add a list of dealers to a populated brand, select 'Raw import'.
    </div>
  </div>

  <h3>Import new info to a dealer</h3>


  <div class="well">
    <form action="/dealers/import" method="POST" enctype="multipart/form-data">

        <div class="form-input">
          <div class="row">

            <div class="col-sm-4">
              {{ Form::file('import'); }} <br>

              Select brand:
              <select class="form-control" name="brand" id="brand">
                <option value="raw">Raw import</option>
                @foreach($data['brands'] as $brand)
                  <option value="{{ $brand->dealer_table }}">{{ $brand->name }}</option>
                @endforeach
              </select> <br>

            </div>
          </div>

          <input type="submit" value="Import" class="btn btn-success"/>

        </div>
    </form>
  </div>


</div>

@stop