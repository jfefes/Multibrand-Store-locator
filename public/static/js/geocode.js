function GoogleGeocode()
{
  var a=new google.maps.Geocoder;

  this.geocode=function(b,c){
    a.geocode({address:b},function(a,b){if(b===google.maps.GeocoderStatus.OK)
      {
        var d={};d.latitude=a[0].geometry.location.lat(),d.longitude=a[0].geometry.location.lng(),c(d)
      }
        else alert("Please enter address"),c(null)
      })
  }
}

$(function(){
  $("#address").change(function(a){
    a.preventDefault();
    var b=$("form #address").val();
    var c=new GoogleGeocode,d=b;
    c.geocode(d,function(a){
      if(null!==a){

        var lat = $('#lat');
        lat.empty();
        lat.attr("value", a.latitude);

        var lng = $('#lng');
        lng.empty();
        lng.attr("value", a.longitude);

      }
    })
  })
});
