<?php

$DATABASE_HOST = "mongodb://wzlxjtu-project-634-1972520:27017";

$m  = new MongoClient($DATABASE_HOST);  /*connect*/
$db = $m->selectDB("project634");  /*select DB*/

?>