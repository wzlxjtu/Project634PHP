
// Google Maps functions
var map, spots=[], currentSPOT, google, Locations;

google.maps.event.addDomListener(window, 'load', InitMap);

function InitMap() {
    var mapCanvas = document.getElementById('map');
    var mapOptions = {
        center: Locations[0],
        zoom: 12,
        mapTypeId: google.maps.MapTypeId.ROADMAP
     }
     map = new google.maps.Map(mapCanvas, mapOptions);
}

function SPOT(position, marker, infowindow){ // the SPOT class stores the destination information
    this.position = position; //Latlng
    this.marker = marker;
    this.infowindow = infowindow;
}

function CurrentLatlng(){
    return map.getCenter();
}
function ShowLot(number){

    var spot = createSPOT(Locations[number],"LOT #"+number);
    spots.push(spot);
    ShowMarkers(map);
}
function createSPOT(location, text){
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
      return new SPOT(location, marker, infowindow);
}

function GetMyPosition(){ //Get the current location
    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var currentLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
            currentSPOT = createSPOT(currentLocation,"Current");
            map.setCenter(currentLocation);
            map.setZoom(13);
            currentSPOT.marker.setMap(map);
            currentSPOT.marker.addListener('animation_changed', function() {
                 currentSPOT.infowindow.open(map, currentSPOT.marker);
            });
        }); 
    }
    else{
        currentSPOT = createSPOT(Locations[0],"Default");
        map.setCenter(Locations[0]);
        map.setZoom(13);
        currentSPOT.marker.setMap(map);
        currentSPOT.marker.addListener('animation_changed', function() {
            currentSPOT.infowindow.open(map, currentSPOT.marker);
        });
    }

}

// Sets the map on all markers in the array.
function ShowMarkers(map) {
  var marker, infowindow;
  for (var i = 0; i < spots.length; i++) {
    marker = spots[i].marker;
    infowindow = spots[i].infowindow;
    marker.setMap(map);
    marker.addListener('animation_changed', function() {
        infowindow.open(map, marker);
      });
  }
}
// Removes the markers from the map, and clear the array.
function ResetMap(){
    InitMap();
    spots = [];
    ShowMarkers(null);
}