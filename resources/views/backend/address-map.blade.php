@extends('layouts.backend.dashboard')  
@section('top-styles')
<link href="{{ asset('assets/backend/libs/select2/css/select2.min.css')}}" rel="stylesheet" />
<style>
   #gmaps-markers {
   height: 280px;
   }
</style>
@endsection
@section('backend-content')
<div class="col-lg-12">
   <div class="card-box">
      <h4 class="header-title m-t-0">{{$title}}</h4>
      <form method="POST" action="{{ route($aroute) }}" enctype="multipart/form-data">
         @csrf
         <div class="row">
            <div class="col-md-4">
               <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" id="address" aria-describedby="address" placeholder="Noapara Group" name="address" value="{{ old('address') }}">
                  <input type="hidden" id="labLat" name="lat" value="{{ old('lat') }}">      
                  <input type="hidden" id="labLong" name="long" value="{{ old('long') }}"> 
                  @if ($errors->has('address'))
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('address') }}</strong>
                  </span>
                  @endif 
               </div>
            </div>
            <div class="col-md-8">
               <div id="gmaps-markers" style="max-height: 908px;"></div>
            </div>
         </div>
         <div class="form-group text-right m-b-0 mt-5">
            <button class="btn btn-primary waves-effect waves-light" type="submit">
            Submit
            </button>
            <button type="reset" class="btn btn-light waves-effect m-l-5">
            Cancel
            </button> 
            <a class="btn btn-warning  m-l-5 float-left" href="{{route('edit-address', $page->id)}}">
            Click an update Website settings!
            </a>
         </div>
      </form>
   </div>
   <!-- end card-box -->
</div>

<!-- end row -->    
@endsection
@section('scripts')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDiAobbZlKHBizVrCVvqrIL9oKdRaS1v5Y&libraries=places&callback=initMap"></script>
<script>
   var map,marker,searchBox,
   infoWindow = '',
   latEl = document.querySelector( '#labLat' ),
   longEl = document.querySelector( '#labLong' ),
   city = document.querySelector( '#city' ),
   addressEl = document.querySelector( '#address' );
   
   
   
   function initMap() {
     map = new google.maps.Map(document.getElementById('gmaps-markers'), {
       // center: {lat: -34.397, lng: 150.644},
       center: {lat: 23.7508886, lng: 90.380102},
       zoom: 14
     });
   
     /**23.7508886,90.380102
    * Creates the marker on the map
    */
     var marker = new google.maps.Marker({
     position: {lat: 23.7508886, lng: 90.380102},
     map: map,
     // icon: 'http://pngimages.net/sites/default/files/google-maps-png-image-70164.png',
     draggable: true
   });
   
     /**
    * Creates a search box
    */
   searchBox = new google.maps.places.SearchBox( addressEl );
   
   
   /**
   * When the place is changed on search box, it takes the marker to the searched location.
   */
   google.maps.event.addListener( searchBox, 'places_changed', function () {
     var places = searchBox.getPlaces(),
       bounds = new google.maps.LatLngBounds(),
       i, place, lat, long, resultArray,
       addresss = places[0].formatted_address;
   
     for( i = 0; place = places[i]; i++ ) {
       bounds.extend( place.geometry.location );
       marker.setPosition( place.geometry.location );  // Set marker position new.
     }
   
     map.fitBounds( bounds );  // Fit to the bound
     map.setZoom( 15 ); // This function sets the zoom to 15, meaning zooms to level 15.
     // console.log( map.getZoom() );
   
     lat = marker.getPosition().lat();
     long = marker.getPosition().lng();
     latEl.value = lat;
     longEl.value = long;
   
     resultArray =  places[0].address_components;
   
     // Get the city and set the city input value to the one selected
     for( var i = 0; i < resultArray.length; i++ ) {
       if ( resultArray[ i ].types[0] && 'administrative_area_level_2' === resultArray[ i ].types[0] ) {
         citi = resultArray[ i ].long_name;
         city.value = citi;
       }
     }
   
     // Closes the previous info window if it already exists
     if ( infoWindow ) {
       infoWindow.close();
     }
     /**
      * Creates the info Window at the top of the marker
      */
     infoWindow = new google.maps.InfoWindow({
       content: addresss
     });
   
     infoWindow.open( map, marker );
   } );
   
   
   /**
    * Finds the new position of the marker when the marker is dragged.
    */
   google.maps.event.addListener( marker, "dragend", function ( event ) {
     var lat, long, address, resultArray, citi;
   
     console.log( 'i am dragged' );
     lat = marker.getPosition().lat();
     long = marker.getPosition().lng();
   
     var geocoder = new google.maps.Geocoder();
     geocoder.geocode( { latLng: marker.getPosition() }, function ( result, status ) {
       if ( 'OK' === status ) {  // This line can also be written like if ( status == google.maps.GeocoderStatus.OK ) {
         address = result[0].formatted_address;
         resultArray =  result[0].address_components;
   
         // Get the city and set the city input value to the one selected
         for( var i = 0; i < resultArray.length; i++ ) {
           if ( resultArray[ i ].types[0] && 'administrative_area_level_2' === resultArray[ i ].types[0] ) {
             citi = resultArray[ i ].long_name;
             console.log( citi );
             city.value = citi;
           }
         }
         addressEl.value = address;
         latEl.value = lat;
         longEl.value = long;
   
       } else {
         console.log( 'Geocode was not successful for the following reason: ' + status );
       }
   
       // Closes the previous info window if it already exists
       if ( infoWindow ) {
         infoWindow.close();
       }
   
       /**
        * Creates the info Window at the top of the marker
        */
       infoWindow = new google.maps.InfoWindow({
         content: address
       });
   
       infoWindow.open( map, marker );
     } );
   });
   
   infoWindow = new google.maps.InfoWindow;
   
   // Try HTML5 geolocation.
         if (navigator.geolocation) {
           navigator.geolocation.getCurrentPosition(function(position) {
             var pos = {
               lat: position.coords.latitude,
               lng: position.coords.longitude
             };
   
             infoWindow.setPosition(pos);
             infoWindow.setContent('Location found.');
             infoWindow.open(map);
             map.setCenter(pos);
           }, function() {
             handleLocationError(true, infoWindow, map.getCenter());
           });
         } else {
           // Browser doesn't support Geolocation
           handleLocationError(false, infoWindow, map.getCenter());
         }
       }
   
       function handleLocationError(browserHasGeolocation, infoWindow, pos) {
         infoWindow.setPosition(pos);
         infoWindow.setContent(browserHasGeolocation ?
                               'Error: The Geolocation service failed.' :
                               'Error: Your browser doesn\'t support geolocation.');
         infoWindow.open(map);
   
   
   }
   
   
</script>
@endsection