
<?php

require 'preferences.php';
//require 'head.php';
session_start();

//Receiving the data from the client 
$Building = $_GET['Building'];
$Lots = $_GET['Lots'];
$timeHour = $_GET['Hours'];
$timeHour = (int)$timeHour;
$time_AM_PM = $_GET['Meridiems'];
$date = $_GET['Date'];
//Need the userid to search for preferences
$userID = $_SESSION['user'];
$userEmail = $userID['email'];
//print_r('userEmail = ');
//print_r($userEmail);


$collectionLots = $db->selectCollection("parkinglot");
$collectionBuildings = $db->selectCollection("building");
$collectionUser = $db->selectCollection("user");
    
$tempLotList = array();

//Retrieving lot corresponding to permit
$lotQuery = array('id' => $Lots);
$tempLotList[] = $collectionLots->findOne($lotQuery, array('name'=> true, '_id' => false));

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

if(($timeHour >= 4 && $time_AM_PM == 'PM') || ($timeHour <= 6 && time_AM_PM == "AM"))
{   //print_r('In if');
    $lotQuery = array('id' => 'WCG');
    $cursor = $collectionLots->find($lotQuery, array('name'=> true, '_id' => false));
    foreach($cursor as $id => $value)
    {
        $tempLotList[] = $value;
    }
   // if(count($cursor) > 1)
    //{   
      //$tempLotList[] = iterator_to_array($cursor);
    //}
    $lotQuery = array('night' => true);
    $cursor = $collectionLots->find($lotQuery, array('name'=> true, '_id' => false));
  
    foreach($cursor as $id => $value)
    {
        $tempLotList[] = $value;
    }
}

elseif(($timeHour >= 5 && $time_AM_PM == 'PM') || ($timeHour <= 6 && time_AM_PM == 'AM'))
{
    //print_r('In elseif');
    $lotQuery = array('night' => true);
    $cursor = $collectionLots->find($lotQuery, array('name'=> true, '_id' => false));
    foreach($cursor as $id => $value)
    {
        $tempLotList[] = $value;
    }
    //$tempLotList[] = iterator_to_array($cursor);
}
else
{
    //print_r('In else');
    $weekend = date('w', strtotime($date));
    if($weekend == 0 || $weekend == 6)
    {
        //print_r('In weekend if');
        $lotQuery = array('night' => true);
        $cursor = $collectionLots->find($lotQuery, array('name'=> true, '_id' => false));
        foreach($cursor as $id => $value)
        {
            $tempLotList[] = $value;
        }
       // $tempLotList[] = iterator_to_array($cursor);
    }
    else
    {
        //print_r('In weekend else');
            $month = date('m', strtotime($date));
            $day = date('d', strtotime($date));
            if($month == 3 && ($day >= 12 && $day <= 20))
            {
                //print_r('In month if');
                $lotQuery = array('summer' => true);
                $cursor = $collectionLots->find($lotQuery, array('name'=> true, '_id' => false));
                foreach($cursor as $id => $value)
                {
                     $tempLotList[] = $value;
                }
                //$tempLotList[] = iterator_to_array($cursor);
            }
            elseif(($month == 6 || $month == 7 || $month == 8) && $Lots != 'Night')
            {
                //print_r('In month elseif');
                $lotQuery = array('summer' => true);
                $cursor = $collectionLots->find($lotQuery, array('name'=> true, '_id' => false));
                foreach($cursor as $id => $value)
                {
                    $tempLotList[] = $value;
                }
                //$tempLotList[] = iterator_to_array($cursor);
            }
    }
}
//print_r($date);
//print_r('Month: ');
//echo date('m', strtotime($date));

/*
Iterate through lot list and remove any with construction.
*/
/*foreach($tempLotList as $index => $current)
{
    if($current['construction'] == true)
    {
        unset($tempLotList[$index]);
    }
    //Reindex the array
    $tempLotList = array_values($tempLotList);
    print_r($tempLotList);
}*/
/* 
Pass entire list to ?? to determine shortest walking time.
*/

print_r($tempLotList);

/*
Check list for user preferences.
What if multiple parking lots meet preferences?
*/
$userQuery = array('email' => $userEmail);
$thisUser = $collectionUser->findOne($userQuery);
$userPreference_well_lit = $thisUser['well_lit'];
$userPreference_easy_parking = $thisUser['easy_parking'];
$userPreference_easy_exit = $thisUser['easy_exit'];

$tempPreferenceLots = array();

foreach($tempLotList as $value)
{
    if($userPreference_well_lit)
    {  print_r('In well lit');
        if($value['well_lit'])
        {
            $tempPreferenceLots[] = $value['well_lit'];
        }
    }
    if($userPreference_easy_exit)
    {
        if($value['easy_exit'])
        {
            $tempPreferenceLots[] = $value['easy_exit'];
        }
    }
    if($userPreference_easy_parking)
    {
        if($value['easy_parking'])
        {
            $tempPreferenceLots[] = $value['easy_parking']; 
        }
    }
}
/*
Add user preference lot to $tempLotList
*/
/*
Check list for user history and return "most used" lot.
Are we taking into account the building they want to visit?
*/
$userHistory = $thisUser['History'];
?>
