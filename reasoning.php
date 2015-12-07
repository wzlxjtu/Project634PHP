
<?php

/*
// Old code
$Building = $_GET['Building'];
$Lots = $_GET['Lots'];
//echo the data received from the client
//echo "Building = $building";
//echo "<br>Lots = $lots";
// echo in the JSON format
echo '{"Building": "'. $Building .'","Lots": "' . $Lots .'"}';
*/

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
$tempLotList[] = $collectionLots->findOne($lotQuery);//, array('name'=> true, '_id' => false));

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
              Else: Add other daytime options
*/

/*if(($timeHour >= 4 && $time_AM_PM == 'PM') || ($timeHour < 6 && time_AM_PM == 'AM'))
{  
    $lotQuery = array('id' => 'WCG');
    $cursor = $collectionLots->find($lotQuery);//, array('name'=> true, '_id' => false));
    foreach($cursor as $id => $value)
    {
        $tempLotList[] = $value;
    }
  
    $lotQuery = array('night' => true);
    $cursor = $collectionLots->find($lotQuery);//, array('name'=> true, '_id' => false));
  
    foreach($cursor as $id => $value)
    {
        $tempLotList[] = $value;
    }
}*/

if(($timeHour <= 4 && $time_AM_PM == 'PM') || ($timeHour >= 6 && $time_AM_PM == "AM")) 
{   
    $lotQuery = array('id' => '100');
    $tempLotList[] = $collectionLots->findOne($lotQuery); 
   /* $lotQuery = array('id' => '104');
    $tempLotList[] = $collectionLots->findOne($lotQuery); 
    $lotQuery = array('id' => '88');
    $tempLotList[] = $collectionLots->findOne($lotQuery); 
    $lotQuery = array('id' => '78');
    $tempLotList[] = $collectionLots->findOne($lotQuery); 
    $lotQuery = array('id' => '71');
    $tempLotList[] = $collectionLots->findOne($lotQuery); 
    $lotQuery = array('id' => '126');
    $tempLotList[] = $collectionLots->findOne($lotQuery); 
    $lotQuery = array('id' => '33');
    $tempLotList[] = $collectionLots->findOne($lotQuery); */
}
if(($timeHour < 6 && $time_AM_PM == 'AM') || ($timeHour >= 5 && $time_AM_PM == 'PM'))
{   print_r('In if ');
    $lotQuery = array('night' => true);
    $cursor = $collectionLots->find($lotQuery);//, array('name'=> true, '_id' => false));
    
    foreach($cursor as $id => $value)
    {
        $tempLotList[] = $value;
    }
}


else
{
    $weekend = date('w', strtotime($date));
    if($weekend == 0 || $weekend == 6)
    {
        $lotQuery = array('night' => true);
        $cursor = $collectionLots->find($lotQuery);//, array('name'=> true, '_id' => false));
        foreach($cursor as $id => $value)
        {
            $tempLotList[] = $value;
        }
    }
    else
    {
            $month = date('m', strtotime($date));
            $day = date('d', strtotime($date));
            if($month == 3 && ($day >= 12 && $day <= 20))
            {
                $lotQuery = array('summer' => true);
                $cursor = $collectionLots->find($lotQuery);//, array('name'=> true, '_id' => false));
                foreach($cursor as $id => $value)
                {
                     $tempLotList[] = $value;
                }
            }
            elseif(($month == 6 || $month == 7 || $month == 8) && $Lots != 'Night')
            {
                //print_r('In month elseif');
                $lotQuery = array('summer' => true);
                $cursor = $collectionLots->find($lotQuery);//, array('name'=> true, '_id' => false));
                foreach($cursor as $id => $value)
                {
                    $tempLotList[] = $value;
                }
            }
    }
}

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
Check list for user preferences.
What if multiple parking lots meet preferences?
*/
$userQuery = array('email' => $userEmail);
$thisUser = $collectionUser->findOne($userQuery);
$userPreference_well_lit = $thisUser['well_lit'];
$userPreference_easy_parking = $thisUser['easy_parking'];
$userPreference_easy_exit = $thisUser['easy_exit'];

$tempPreferenceLots = array();
$tempThreePreference = array();
$tempTwoPreference = array();
$tempOnePreference = array();

foreach($tempLotList as $value)
{   
    if($userPreference_well_lit)
    {  
        if($value['well_lit'])
        {   
            $tempPreferenceLots[] = $value;//['well_lit'];
        }
    }
    if($userPreference_easy_exit)
    {
        if($value['easy_exit'])
        {
            $tempPreferenceLots[] = $value;//['easy_exit'];
        }
    }
    if($userPreference_easy_parking)
    {
        if($value['easy_parking'])
        {
            $tempPreferenceLots[] = $value;//['easy_parking']; 
        }
    }
}
/*
If the user had preferences, determine lot to add to $tempLotList
*/
if(!empty($tempPreferenceLots))
{   
    foreach($tempPreferenceLots as $lotValue)
    {   
        $count = 0;
        if($lotValue['well_lit'] == true)
        {  
            $count += 1;
        }
         if($lotValue['easy_exit'] == 1)
        {
            $count += 1;
        }
         if($lotValue['easy_parking'] == 1)
        {
            $count += 1;
        }
        if($count == 3)
        {
            $tempThreePreference[] = $lotValue;
        }
        elseif($count == 2)
        {
            $tempTwoPreference[] = $lotValue;   
        }
        elseif($count == 1)
        {
            $tempOnePreference[] = $lotValue;
        }
        else
        {
            
        }
    }
    /*
    Determine which lot fits the most user preferences
    */
    if(!empty($tempThreePreference))
    {
        $tempLotList[] = $tempThreePreference[0];
    }
    elseif(!empty($tempTwoPreference))
    {
        $tempLotList[] = $tempTwoPreference[0];
    }
    elseif(!empty($tempOnePreference))
    {
        $tempLotList[] = $tempOnePreference[0];
    }
}
/*
If the user had no preferences, append their parking permit lot.
*/
else
{   //print_r('Preference empty. ');
    $lotQuery = array('id' => $Lots);
    $tempLotList[] = $collectionLots->findOne($lotQuery);//, array('name'=> true, '_id' => false));
}

/*
Check list for user history and return "most used" lot.
Are we taking into account the building they want to visit?
*/
$userHistory = $thisUser['history'];
$tempHistoryLot = array();
if(!empty($userHistory))
{
foreach($userHistory as $index => $historyValue)
{   
    if($index == $Building)
    {   
        $mostUsed = array_count_values($historyValue);
        asort($mostUsed);
        end($mostUsed);
        $mostUsed = key($mostUsed);
        $mostUsed = (string)$mostUsed;
        foreach($tempLotList as $checkLot)
        {   
            if($checkLot['id'] == $mostUsed)
            {   
                $lotQuery = array('id' => $mostUsed);
                $tempHistoryLot[] = $collectionLots->findOne($lotQuery);
                break;
            }
        }
    }
    
}
}

/*
Add user history lot to $tempLotList
If the user has no history, append their parking permit lot.
Otherwise, append historic parking lot.
*/
if(empty($tempHistoryLot))
{   //print_r('History empty. ');
    $lotQuery = array('id' => $Lots);
    $tempLotList[] = $collectionLots->findOne($lotQuery);//, array('name'=> true, '_id' => false));
}
else
{   
     $tempLotList[] = $tempHistoryLot[0];
}

/*
Pass list
*/

echo json_encode($tempLotList);
?>

