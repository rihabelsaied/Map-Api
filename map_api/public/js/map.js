
var map;
var marker = null;
        
function initMap() 
{

    var latitude =  -33.8688; 
    var longitude = 151.2195;
    
    var myLatLng = {lat: latitude, lng: longitude};
    
    map = new google.maps.Map(document.getElementById('map'), {
      center: myLatLng,
      zoom: 14,
      disableDoubleClickZoom: true, 
      mapTypeId: 'roadmap'

    });
    
    // Update lat/long value of div when anywhere in the map is clicked    
    google.maps.event.addListener(map, 'click', function (event) {
      document.getElementById('latclicked').value = event.latLng.lat();
      document.getElementById('longclicked').value = event.latLng.lng();
  
      if (marker) {
        marker.setPosition(event.latLng);
      }
      else {
        marker = new google.maps.Marker({
          position: event.latLng,
          map: map,
          title: event.latLng.lat() + ', ' + event.latLng.lng()
        });
      }
  
  
    });
    // to set marker in map 
           
     // Create the search box and link it to the UI element.
     var input = document.getElementById('search');
     var searchBox = new google.maps.places.SearchBox(input);
     map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

     // Bias the SearchBox results towards current map's viewport.
     map.addListener('bounds_changed', function() {
       searchBox.setBounds(map.getBounds());
     });

     var markers = [];
     
     // more details for that place.
     searchBox.addListener('places_changed', function() {
       var places = searchBox.getPlaces();

       if (places.length == 0) {
         return;
       }

       // Clear out the old markers.
       markers.forEach(function(marker) {
         marker.setMap(null);
       });
       markers = [];

       // For each place, get the icon, name and location.
       var bounds = new google.maps.LatLngBounds();
       places.forEach(function(place) {
         if (!place.geometry) {
           console.log("Returned place contains no geometry");
           return;
         }
         var icon = {
           url: place.icon,
           size: new google.maps.Size(71, 71),
           origin: new google.maps.Point(0, 0),
           anchor: new google.maps.Point(17, 34),
           scaledSize: new google.maps.Size(25, 25)
         };

         // Create a marker for each place.
         markers.push(new google.maps.Marker({
           map: map,
           icon: icon,
           title: place.name,
           position: place.geometry.location
         }));

         if (place.geometry.viewport) {
           // Only geocodes have viewport.
           bounds.union(place.geometry.viewport);
         } else {
           bounds.extend(place.geometry.location);
         }
       });
       map.fitBounds(bounds);
     });
   }

    
  
    
    
   