<!DOCTYPE html>
<html>
<head>
  <title>Project634</title>
  <script src="global.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  
  <script src="map.js"></script>

  <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
  

<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console
  include 'form.php';
  echo '<br>';

?>



<p id="demo"></p>
<button type="button"
onclick="MoveMap()">
Click me</button>
<!--onclick="document.getElementById('demo').innerHTML = DateFunc()"> -->

<div id="map"></div>

</body>
</html>
