<!DOCTYPE html>
<html>
<head>
  <title>Database Mangement</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<?php
require 'preferences.php';

echo("<h2>Database Management</h2>");
/* 

---- 1.install mongodb driver 


sudo apt-get update
sudo apt-get install php5-dev php5-cli php-pear -y
sudo pecl install mongo

---- 2.change php.ini file

add below in php.ini

extension=mongo.so

----- 3.restart apache

sudo /etc/init.d/apache2 restart

----- 4. run Mongo db

$ mkdir data      // where data are stored
$ echo 'mongod --bind_ip=$IP --dbpath=data --nojournal --rest "$@"' > mongod
$ chmod a+x mongod 

$ ./mongod

----- 5. run mongodb Client
$ mongo

---- reference
https://docs.c9.io/docs/setting-up-mongodb
https://docs.c9.io/docs/setup-a-database

http://www.sitepoint.com/building-simple-blog-app-mongodb-php/

----- mogodb documentation
https://docs.mongodb.org/manual/?_ga=1.77802384.540156671.1447120948
*/

// connect
/*
$./mongod(enter)
checkout dbpath


// shutdown
./mongod --shutdown

// repair

./mongod --repair


$m = new MongoClient("mongodb:host:port");
*/
//$m = new MongoClient( "mongodb://ohnarya-project634php-2006741:27017" );


// select a database
// $db = $m->project634;


?>
<div class="container-fluid">
<button id='truncatetable' type="button" class="btn btn-default">migrate down.....</button>
<button id='inserttable' class='btn'>migrate up.....</button>
<p id="notify1"></p>
<p id="notify2"></p>
</div>


<script>
$(document).ready(function() {
    $("#truncatetable").on('click', function(){
        document.getElementById("notify1").innerHTML = "truncating collections........";
        document.getElementById("notify2").innerHTML = "";
        $.ajax({
               url: './migrate.php?mode=t',
               dataType: 'json',
               success: function(data){
                   
                    $("#notify2").html( "<span style='color:blue'><b>collections were truncated.</b></span>");
               },
               error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    $("#notify2").html( "<span style='color:red'>"+ errorThrown + ": Error has been occured.</span>");
               }
            });
    });
    
    $("#inserttable").on('click', function(){
        document.getElementById("notify1").innerHTML = "inserting collections........";
        document.getElementById("notify2").innerHTML = "";
        $.ajax({
               url: './migrate.php?mode=i',
               dataType: 'json',
               success: function(data){
                  
                    $("#notify2").html( "<span style='color:blue'><b>collections were inserted.</b></span>");
               },
               error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    $("#notify2").html( "<span style='color:red'>"+ errorThrown + ": Error has been occured.</span>");
               }
               
            });
            
    });    
});    
</script>
</html>

