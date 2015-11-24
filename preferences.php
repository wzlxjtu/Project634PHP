<?php

$DATABASE_HOST = "mongodb://jandufek-project634php-2006737:27017";

$m  = new MongoClient($DATABASE_HOST);  /*connect*/
$db = $m->selectDB("project634");  /*select DB*/

?>