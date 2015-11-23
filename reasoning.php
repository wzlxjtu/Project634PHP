

<?php

//Receiving the data from the client 
$Building = $_GET['Building'];
$Lots = $_GET['Lots'];

//echo the data received from the client
//echo "Building = $building";
//echo "<br>Lots = $lots";

// echo in the JSON format
echo '{"Building": "'. $Building .'","Lots": "' . $Lots .'"}';

//Retrieving lot corresponding to permit
$id = $lots;
$permit_lot = $db::findOne(array('_id' => new MongoID($id)));
echo '{"name":" '. $name .'"}'; 

/*Check time of day.
    If after 4pm, but before 6am: retrieve WCG record and all "night" parking lots.
    Else if after 5pm, but before 6am: retrieve all "night" parking lots.
    Else: 
      Check day of week.
        If Sat/Sun: retrieve "night" records and WCG.
        Else:
          Check date.
            If break: retrieve all "summer" records
            Else if summer:  check permit type
              If not night permit: retrieve all "summer" records
              Else: ??????? Where can they park during the day/school year with their permit???
*/

/* 
Pass entire list to ?? to determine shortest walking time.
*/

/*
Check list for user preferences.
What if multiple parking lots meet preferences?
*/

/*
Check list for user history and return "most used" lot.
Are we taking into account the building they want to visit?
*/


?>
