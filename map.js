
// Google Maps functions
var map, MyLocation, google, Locations;
var directionsDisplay, directionsService = new google.maps.DirectionsService();

google.maps.event.addDomListener(window, 'load', InitMap);

function InitMap() {
    var mapCanvas = document.getElementById('map');
    var mapOptions = {
        zoom: 12,
        mapTypeId: google.maps.MapTypeId.ROADMAP
     }
     map = new google.maps.Map(mapCanvas, mapOptions);
     directionsDisplay = new google.maps.DirectionsRenderer({
        draggable: true,
        map: map,
        //panel: document.getElementById('RoutePanel'),
        suppressMarkers: true
      });
      GetMyPosition();
}


            
function CalcRoute(number) {
  var request = {
    origin: MyLocation.position,
    destination: Locations[number],
    travelMode: google.maps.TravelMode.DRIVING
  };
  directionsService.route(request, function(result, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        var duration = result.routes[0].legs[0].duration.value; //duration in seconds
        var Destination = createLOCATION(Locations[number], "Lot #" + number + "<br>Time: " + duration + "s");
        Destination.ShowMarker(true);
        Destination.marker.addListener('click', function() {
            directionsDisplay.setDirections(result);
        });
      }
  });
}

function LOCATION(position, marker, infowindow){ // the SPOT class stores the destination information
    this.position = position; //Latlng
    this.marker = marker;
    this.infowindow = infowindow;
}
// if info is true, then also show info box
LOCATION.prototype.ShowMarker = function(info){
    this.marker.setMap(map);
    if(info)
        this.infowindow.open(map, this.marker);
}
function createLOCATION(location, text){
    //Create a spot object
    var boxText = document.createElement("div");
        boxText.style.cssText = "font-size: 15px;color: #500000;font-weight: bold;";
        boxText.innerHTML = text;
    var infowindow = new google.maps.InfoWindow({
        content: boxText
      });
    var marker = new google.maps.Marker({
        position: location,
        animation: google.maps.Animation.DROP
      });
    return new LOCATION(location, marker, infowindow);
}


function GetMyPosition(){ //Get the current location
    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var currentLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
            MyLocation = createLOCATION(currentLocation,"MyLocation");
            map.setCenter(currentLocation);
            MyLocation.marker.setIcon('resources/MyLocation.png');
            MyLocation.ShowMarker(false);
        }); 
    }
}

function ResetMap(){
    InitMap();
}