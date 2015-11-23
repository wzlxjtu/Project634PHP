

<?php

//Receiving the data from the client 
$Building = $_GET['Building'];
$Lots = $_GET['Lots'];
$timeHour = $_GET['Hours'];
$time_AM_PM = $_GET['Meridiems'];
$date = $_GET['Date'];

$tempLotList = array[];

//echo the data received from the client
//echo "Building = $building";
//echo "<br>Lots = $lots";

// echo in the JSON format
echo '{"Building": "'. $Building .'","Lots": "' . $Lots .'"}';

//Retrieving lot corresponding to permit
$tempLotList[] = db.parkinglot.find({$id: {$eq: $Lots}});
/*Check time of day.    
    If after 4pm, but before 6am: retrieve WCG record and all "night" parking lots.
    Elseif after 5pm, but before 6am: retrieve all "night" parking lots.
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

if(($timeHour >= 4 && $time_AM_PM == "PM") || ($timeHour <= 6 && time_AM_PM == "AM"))
{
    $tempLotList[] = db.parkinglot.find({$id: {$eq: "WCG"}});
    $tempLotList[] = db.parkinglot.find({$night : {$eq: true}});

}
elseif(($timeHour >= 5 && $time_AM_PM == "PM") || ($timeHour <= 6 && time_AM_PM == "AM"))
{
    $tempLotList[] = db.parkinglot.find({$night : {$eq: true}});
}
else
{
    $weekend = date('w', strtotime($date));
    if($weekend == 0 || $weekend == 6)
    {
        $tempLotList[] = db.parkinglot.find({$night : {$eq: true}});
    }
    else
    {
            
    }
}
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
