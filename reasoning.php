

<?php

//Receiving the data from the client 
$Building = $_GET['Building'];
$Lots = $_GET['Lots'];
$timeHour = $_GET['Hours'];
$time_AM_PM = $_GET['Meridiems'];
$date = $_GET['Date'];
//Need the userid to search for preferences
//$userID = ........

$tempLotList = array();

//echo the data received from the client
//echo "Building = $building";
//echo "<br>Lots = $lots";

// echo in the JSON format
echo '{"Building": "'. $Building .'","Lots": "' . $Lots .'"}';



?>
