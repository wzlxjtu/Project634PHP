<?php
$m = new MongoClient( "mongodb://ohnarya-project634php-2006741:27017" );
$db = $m->selectDB("project634");


if($_GET['mode']=="t"){
    $collections = $db->listCollections();
    foreach ($collections as $collection) {
            $collection->remove();
        }
    
    echo json_encode(['id'=>'success','mode'=>$_GET['mode']]);

    
}else if(isset($_GET['mode']) && $_GET['mode']=="i"){
    include_once('./_seed.php');
    
    $collection = $db->selectCollection("parkingpermit");
    $collection->batchInsert($parkingpermit);
    // foreach($usercollections as $usercollection){
    //     $usercollection->insert($parkingpermit);
    // }
    
     echo json_encode(['id'=>'success','mode'=>$_GET['mode']]);
}else{
    echo json_encode(['id'=>'fail','mode'=>$_GET['mode']]);
}
?>    

<?php

// $db = $m->selectDB("project634");

// $collections = $db->listCollections();

// foreach ($collections as $collection) {
//     echo "amount of documents in $collection: ";
//     echo $collection->count(), "\n";
//     }

// select a collection (analogous to a relational database's table)
//$collection = $db->selectCollection("person");
// $query = array(
//         ['name'=>'Iamasupervisor','age'=>26,'status'=>'A']
//     );

// find everything in the collection
//$cursor = $collection->find();


/*
    db.users.find({age:{$gt:18}}).sort({age:1});
    db.users.find({age:{$gt:18}},
                  {name:1, address:1}).limit(5);
                  
    select id, name, address
      from users
     where age>18
     limit 5
     
*/

// iterate through the results
// foreach ($cursor as $document) {
//     echo $document["name"] . "\n";
//}

?>