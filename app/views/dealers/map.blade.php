@extends('layouts.base')

@section('content')
    <link rel="stylesheet" type="text/css" href="/static/locator/storelocator.css" />

    <h3 class="text-center">{{ $table }} Map Preview</h3> <br>

    <div class="row">
      <div class="bh-sl-container">
        <div class="col-md-offset-3">
          <div class="bh-sl-form-container">
            <form id="bh-sl-user-location" method="post" action="#">
                <div class="form-input">
                  <label for="bh-sl-address">Enter Address or Zip Code:</label>
                  <input type="text" id="bh-sl-address" name="bh-sl-address" />
                </div>

                <button class="btn btn-primary" id="bh-sl-submit" type="submit">Submit</button>
            </form>
          </div>
        </div>

        <div class="col-md-offset-1">
          <div id="map-container" class="bh-sl-map-container">
            <div class="bh-sl-loc-list">
                <ul class="list"></ul>
            </div>
            <div id="bh-sl-map" class="bh-sl-map"></div>
          </div>
        </div>
      </div>
    </div>

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="/assets/js/libs/handlebars.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="/assets/js/plugins/storeLocator/jquery.storelocator.js"></script>
		<script>
    var table = '<?php echo $table ?>'
			$(function() {
				$('#map-container').storeLocator({
          catMarkers : {
    				'0' : ['/static/locator/markers/elite-bronze.png', 50, 60],
    				'1' : ['/static/locator/markers/elite-bronze.png', 50, 60],
    				'2' : ['/static/locator/markers/elite-silver.png', 50, 60],
    				'3' : ['/static/locator/markers/elite-gold.png', 50, 60],
    				'4' : ['/static/locator/markers/elite-platinum.png', 50, 60],
    				'5' : ['/static/locator/markers/elite-platinum.png', 50, 60],
    				'6' : ['/static/locator/markers/elite-platinum.png', 50, 60],
    			},
					'dataType': 'json',
					'dataLocation': '/data/<?php echo $table ?>.json',
          'storeLimit': '20'
          })
  		});
  </script>
@stop
