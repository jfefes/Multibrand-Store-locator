@extends('layouts.base')

<?php $title= $brand_name . ' Dealers' ?>

@section('content')
<div class="container">

  @if(isset($status))
  <div class="row">
    <div class="alert alert-info col-md-7 col-md-offset-3">
      {{ $status }}
    </div>
  </div>
  @endif

    <h3>Dealers for {{ $brand_name }}:</h3>

    @foreach($dealers as $dealer)
      <div class="well">
        <div class="row">
          <div class="col-xs-3">
            Dealer name: {{ $dealer->name }} <br>
            Phone: {{ $dealer->phone}} <br>
          </div>
          <div class="col-xs-3">
            Address: {{ $dealer->address }} <br>
            City: {{ $dealer->city }} <br>
            State: {{ $dealer->state }} <br>
            Postal: {{ $dealer->postal }} <br>
            Country: {{ $dealer->country }} <br>
          </div>
          <div class="col-xs-3">
            Lat: {{ $dealer->lat }} <br>
            Lng: {{ $dealer->lng }}
          </div>
          <div class="col-xs-3">
            <button class="btn btn-info" style='margin-top:10px' data-toggle="modal" data-target="#editModal{{$dealer->id}}"><i class="glyphicon glyphicon-pencil" style="font-size:20px"></i></button>
          </div>
        </div>
      </div>

      <div class="modal fade" id="editModal{{$dealer->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Editing: {{$dealer->name}}</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                @include('partials.edit-dealer')
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" value="Save changes" />
              </form>
              <a href="#" class="btn btn-danger pull-left">Delete</a>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    @endforeach

  </div>
  
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script src="/static/js/geocodeImport1.js"></script>

@stop
