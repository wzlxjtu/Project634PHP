<!DOCTYPE html>
<html>
<head>
  <title>Project634</title>
  <script src="https://maps.googleapis.com/maps/api/js"></script>
  <script src="index.js"></script>
  <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
  

<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console
  include 'form.php';
  echo '<br>';
  echo $_GET["Name"];
  echo '<br>';
  echo $_GET["Lots"];
?>

<br>


<button type="button"
onclick="MoveMap(0.01,-0.01)">
Click me</button>
<!--onclick="document.getElementById('demo').innerHTML = DateFunc()"> -->
<p id="demo"></p>
  

<div id="map"></div>

</body>
</html>