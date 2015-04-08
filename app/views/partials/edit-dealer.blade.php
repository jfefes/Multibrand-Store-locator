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




<form method="POST" action="/dealers/show/{{$id}}">
  <div class="col-xs-4">
    <input type="hidden" id="dealer_id" name="dealer_id" value="{{$dealer->id}}"/>
    Dealer name: <input class="form-control" type="text" id="name" name="name" value="{{ $dealer->name }}"/> <br>
    Phone: <input class="form-control" type="text" id="phone" name="phone" value="{{ $dealer->phone }}"/> <br>
  </div>

  <div class="col-xs-4">
    Address: <input class="form-control" type="text" id="address" name="address" value="{{ $dealer->address }}"/> <br>
    City: <input class="form-control" type="text" id="city" name="city" value="{{ $dealer->city }}"/> <br>
    State: <input class="form-control" type="text" id="state" name="state" value="{{ $dealer->state }}"/> <br>
    Postal: <input class="form-control" type="text" id="postal" name="postal" value="{{ $dealer->postal }}"/> <br>
    Country:  <input class="form-control" type="text" id="country" name="country" value="{{ $dealer->country }}"/> <br>
  </div>

  <div class="col-xs-4">
    Lat: <input class="form-control" type="text" readonly id="lat" name="lat" value="{{ $dealer->lat }}"/> <br>
    Lng: <input class="form-control" type="text" readonly id="lng" name="lng" value="{{ $dealer->lng }}"/> <br>
    <a class="btn btn-success" type="button" id="geo">Get geocode</a>
  </div>
