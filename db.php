<?php
/* 

---- install mongodb driver 


sudo apt-get update
sudo apt-get install php5-dev php5-cli php-pear -y
sudo pecl install mongo

---- change php.ini file

add below in php.ini

extension=mongo.so

----- restart apache

sudo /etc/init.d/apache2 restart

---- reference
https://docs.c9.io/docs/setting-up-mongodb
https://docs.c9.io/docs/setup-a-database

*/

// connect
$m = new MongoClient( "mongodb://ohnarya-project634php-2006741:27017" );
//$m = new MongoClient("mongodb:host:port");

// select a database
// $db = $m->project634;

$db = $m->test;

// select a collection (analogous to a relational database's table)
$collection = $db->book;

// find everything in the collection
$cursor = $collection->find();

// iterate through the results
foreach ($cursor as $document) {
    echo $document["title"] . "\n";
}

?>