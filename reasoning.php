

<?php

//Receiving the data from the client 
$building = $_GET['Building'];
$lots = $_GET['Lots'];

//echo the data received from the client
//echo "Building = $building";
//echo "<br>Lots = $lots";

// echo in the JSON format
echo '{"building": "'. $building .'","lots": "' . $lots .'"}';

?>
