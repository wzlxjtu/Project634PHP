// Google Maps functions
var map, MyLocation, currentLocation, google, Locations;
var DriveDirection, WalkDirection;
var ParkingLots, LotNames, Dest_Building;
var SWT, MOU, PP, SWT_lot, MOU_lot, PP_lot;
var FormData;
google.maps.event.addDomListener(window, 'load', InitMap);

var directionsService = new google.maps.DirectionsService();
var WalkLine = new google.maps.Polyline({
  strokeOpacity: 0,
  strokeColor: '0099FF',
  icons: [{
    icon: {path: 'M 0,-1 0,1', strokeOpacity: 0.7, scale: 4 },
    offset: '0',
    repeat: '20px'
  }]
});

function InitMap() {
    var mapCanvas = document.getElementById('map');
    var mapOptions = {
        zoom: 12,
        mapTypeId: google.maps.MapTypeId.ROADMAP
     }
     map = new google.maps.Map(mapCanvas, mapOptions);
     DriveDirection = new google.maps.DirectionsRenderer({
        draggable: true,
        map: map,
        suppressMarkers: true
      });
      WalkDirection = new google.maps.DirectionsRenderer({
        polylineOptions: WalkLine,
        draggable: true,
        map: map,
        suppressMarkers: true
      });
      
    GetMyPosition();
    
    SWT = SetClick("SWT");
    MOU = SetClick("MOU");
    PP = SetClick("PP");
}

function BuildPos(data){
    // Build a LatLng from FormData
    var position = {lat: Number(data.lat), lng: Number(data.lng)};
    return position;
}
function CalcRoute(formdata) {
    //var a = BuildPos(FormData[10]);
    FormData = formdata;
    ParkingLots = [], LotNames = [];
    for (var i = 0; i < FormData.length; i++) {
        ParkingLots.push(BuildPos(FormData[i]));
        LotNames.push(FormData[i].id);
    }
    //alert(formdata.length)
    Dest_Building = [Locations[dest_name]];

    var service = new google.maps.DistanceMatrixService();
    service.getDistanceMatrix(
      {
          origins: ParkingLots, //LatLng Array
          destinations: Dest_Building, //LatLng Array
          travelMode: google.maps.TravelMode.WALKING,
      }, CalcTime);
}


function CalcTime(response, status) {
  if (status == google.maps.DistanceMatrixStatus.OK) {
    var min_num = ShortestWalkLot(response);
    SWT_lot = ParkingLots[min_num];
    MOU_lot = ParkingLots[FormData.length-1];
    PP_lot = ParkingLots[FormData.length-2];
    var Destination = createLOCATION(SWT_lot, "Lot #" + LotNames[min_num] + "<br>Nearest: " + 
        response.rows[min_num].elements[0].duration.text); 
    Destination.ShowMarker(true);
    Destination.marker.addListener('click', function() {
        Destination.ShowMarker(false);
        requestDirections(currentLocation, SWT_lot, 'DRIVING');
        requestDirections(SWT_lot, Dest_Building[0], 'WALKING');
        });
    
    document.getElementById("SWT_text").innerHTML = '<h2>Parking Lot ' + eval(LotNames[min_num]) + '</h2>';
    document.getElementById("MOU_text").innerHTML = '<h2>Parking Lot ' + eval(LotNames[FormData.length-1]) + '</h2>';
    document.getElementById("PP_text").innerHTML = '<h2>Parking Lot ' + eval(LotNames[FormData.length-2]) + '</h2>';
    document.getElementById("d1").innerHTML = '<p>Numbered parking permit required</p>';
    document.getElementById("d2").innerHTML = '<p>Parking free after 5 PM</p>';
    document.getElementById("d3").innerHTML = '<p>Parking free after 5 PM</p>';
    if (!(FormData[min_num].well_lit)) document.getElementById("icon11").style.visibility = "hidden";
    if (!(FormData[min_num].easy_exit)) document.getElementById("icon12").style.visibility = "hidden";
    if (!(FormData[min_num].easy_parking)) document.getElementById("icon13").style.visibility = "hidden";
    if (!(FormData[FormData.length-1].well_lit)) document.getElementById("icon21").style.visibility = "hidden";
    if (!(FormData[FormData.length-1].easy_exit)) document.getElementById("icon22").style.visibility = "hidden";
    if (!(FormData[FormData.length-1].easy_parking)) document.getElementById("icon23").style.visibility = "hidden";
    if (!(FormData[FormData.length-2].well_lit)) document.getElementById("icon31").style.visibility = "hidden";
    if (!(FormData[FormData.length-2].easy_exit)) document.getElementById("icon32").style.visibility = "hidden";
    if (!(FormData[FormData.length-2].easy_parking)) document.getElementById("icon33").style.visibility = "hidden";
    ShowTimeInfo();
    
    SWT.onclick = function() {
        ResetMap();
        requestDirections(currentLocation, SWT_lot, 'DRIVING');
        requestDirections(SWT_lot, Dest_Building[0], 'WALKING');
    };
    MOU.onclick = function() {
        ResetMap();
        requestDirections(currentLocation, MOU_lot, 'DRIVING');
        requestDirections(MOU_lot, Dest_Building[0], 'WALKING');
    };
    PP.onclick = function() {
        ResetMap();
        requestDirections(currentLocation, PP_lot, 'DRIVING');
        requestDirections(PP_lot, Dest_Building[0], 'WALKING');
    };
  }
}

function ShowTimeInfo(){
    var DriveService = new google.maps.DistanceMatrixService();
    DriveService.getDistanceMatrix(
      {
          origins: [currentLocation], //LatLng Array
          destinations: [SWT_lot,MOU_lot,PP_lot], //LatLng Array
          unitSystem: google.maps.UnitSystem.IMPERIAL,
          travelMode: google.maps.TravelMode.DRIVING,
      }, DriveTimeInfo);
    var WalkService = new google.maps.DistanceMatrixService();
    WalkService.getDistanceMatrix(
      {
          origins: [SWT_lot,MOU_lot,PP_lot], //LatLng Array
          destinations: Dest_Building, //LatLng Array
          unitSystem: google.maps.UnitSystem.IMPERIAL,
          travelMode: google.maps.TravelMode.WALKING,
      }, WalkTimeInfo);
}
function DriveTimeInfo(response, status){
    if (status == google.maps.DistanceMatrixStatus.OK) {
        document.getElementById("SWT_drive").innerHTML = 
            response.rows[0].elements[0].duration.text + '(' + response.rows[0].elements[0].distance.text + ')';
        document.getElementById("MOU_drive").innerHTML = 
            response.rows[0].elements[1].duration.text + '(' + response.rows[0].elements[1].distance.text + ')';
        document.getElementById("PP_drive").innerHTML = 
            response.rows[0].elements[2].duration.text + '(' + response.rows[0].elements[2].distance.text + ')';
    }
}
function WalkTimeInfo(response, status){
    if (status == google.maps.DistanceMatrixStatus.OK) {
        document.getElementById("SWT_walk").innerHTML = 
            response.rows[0].elements[0].duration.text + '(' + response.rows[0].elements[0].distance.text + ')';
        document.getElementById("MOU_walk").innerHTML = 
            response.rows[1].elements[0].duration.text + '(' + response.rows[1].elements[0].distance.text + ')';
        document.getElementById("PP_walk").innerHTML = 
            response.rows[2].elements[0].duration.text + '(' + response.rows[2].elements[0].distance.text + ')';
    }
}
function ShortestWalkLot(response){
    var min_num = 0;
    for (var i = 0; i < response.rows.length; i++)
    {
        if (response.rows[i].elements[0].duration.value < response.rows[min_num].elements[0].duration.value)
        { min_num = i; }
    }
    return min_num;
}

function requestDirections(start, end, mode) {
    var marker;
    if (mode == 'DRIVING')
    {
          directionsService.route({
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode.DRIVING
         }, function(result, status) {
             if (status == google.maps.DirectionsStatus.OK) {
                 DriveDirection.setDirections(result);
                 marker = createLOCATION(end, 'Drive:' + result.routes[0].legs[0].duration.text); 
                 marker.ShowMarker(true);
             }
         });
    }
    if (mode == 'WALKING')
    {
          directionsService.route({
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode.WALKING
         }, function(result, status) {
             if (status == google.maps.DirectionsStatus.OK) {
                 WalkDirection.setDirections(result);
                 marker = createLOCATION(end, 'Walk:' + result.routes[0].legs[0].duration.text); 
                 marker.ShowMarker(true);
             }
         });
    }
}
    
    
function SetClick(div_name)
{
    var element = document.getElementById(div_name);
    element.style.cursor = 'pointer';
    // element.onmouseover = function() {
    // };
    // element.onmouseout = function() {
    // };
    return element;
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
    else
        this.infowindow.close();
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
            currentLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
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