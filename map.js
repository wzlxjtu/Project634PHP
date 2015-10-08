
// Google Maps functions
var map, google;
google.maps.event.addDomListener(window, 'load', initialize);

function initialize() {
    var mapCanvas = document.getElementById('map');
    var mapOptions = {
        center: new google.maps.LatLng(30.627977,-96.334407),
        zoom: 12,
        mapTypeId: google.maps.MapTypeId.ROADMAP
     }
     map = new google.maps.Map(mapCanvas, mapOptions);
}
function CurrentLatlng(){
    return map.getCenter();
}
function MoveMap(){
    var degree = parseFloat(FormData.degree);
    if (isNaN(degree))
        degree = 0.01;
    var x = degree;
    var y = -degree;
    var current_pos = CurrentLatlng ();
    var new_pos = new google.maps.LatLng(current_pos.lat()+x,current_pos.lng()+y,true);
    //window.alert(pos1);
    //document.getElementById("showserver").innerHTML = x;
    map.panTo(new_pos);
    
}

