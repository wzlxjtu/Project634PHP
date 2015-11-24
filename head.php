<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Project634</title>
  <link rel="stylesheet" type="text/css" href="display.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  
  <script src="global.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="map.js"></script>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
</head>

<body>

<script src="form.js">
</script>
<div id="wrapper">
  <header>
    <a href="/">Texas A&M University Parking Suggestions</a>
  </header>
  <nav>
    <?php
    
    # If user wants to logout, then logout
    if ($_GET["logout"] == "true") {
      unset($_SESSION["user"]);
    }
    
    # Back button showed on any other page than index.php
    if (basename($_SERVER['PHP_SELF']) != "index.php") {
      echo "<a href='/' class='btn'>Back</a>\n";
    }

    # User is logged in
    if (isset($_SESSION["user"])) {
      
      # Accout button
      if (basename($_SERVER['PHP_SELF']) != "account.php") {
        echo "<a href='account.php' class='btn'>Manage Account</a>\n";
      }
      
      # Logout button
      echo "<a href='index.php?logout=true' class='btn'>Log out</a>\n";
      
    # User is not logged in
    } else {
      
      # Sign up button
      if (basename($_SERVER['PHP_SELF']) != "signup.php") {
        echo "<a href='signup.php' class='btn'>Sign Up</a>\n";
      }
      
      # Login button
      if (basename($_SERVER['PHP_SELF']) != "login.php") {
        echo "<a href='login.php' class='btn'>Log In</a>\n";
      }
    }
    
    ?>
  </nav>