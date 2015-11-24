
<?php

// Old code
$Building = $_GET['Building'];
$Lots = $_GET['Lots'];
//echo the data received from the client
//echo "Building = $building";
//echo "<br>Lots = $lots";
// echo in the JSON format
echo '{"Building": "'. $Building .'","Lots": "' . $Lots .'"}';

?>