@extends('layouts.base')
@section('content')

<?php $title= $brand . ' Dealers' ?>

<div class="container">

  @if(isset($status))
  <div class="row">
    <div class="alert alert-info col-md-7 col-md-offset-3">
      {{ $status }}
    </div>
  </div>
  @endif


      <div class="well">
        <form method="post" action="/dealers/search">

            <div class="form-input">
              <div class="row">

                <input type="hidden" name="table" value="{{ $brand }}"/>

                <div class="col-sm-6">
                  <label>Search for:</label>
                  <input class="form-control" type="text" id="key" name="key" placeholder="(search terms)" value="{{{ $input['keyy'] or '' }}}"> <br>
                </div>


                <div class="col-sm-4">
                  <label for="term">Search in:</label>
                  <select class="form-control" id="term" name="term">
                    <option value="name"> Dealer name</option>
                    <option value="state"> State</option>
                    <option value="country"> Country</option>
                    <option value="category"> Dealer level</option>
                  </select>
                </div>
              </div>

              <input type="submit" value="Go" class="btn btn-success"/>

            </div>
        </form>
      </div>
  </div>

@stop
