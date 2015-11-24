<?php
require 'head.php';

require 'preferences.php';
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  # Get attributes
  $first_name = secure($_POST["first_name"]);
  $last_name = secure($_POST["last_name"]);
  $email = secure($_POST["email"]);
  $password = secure($_POST["password"]);
  $password_confirmation = secure($_POST["password_confirmation"]);
  
  # Check if password matches password confirmation
  if ($password == $password_confirmation) {
    
    # Compute MD5 hash
    $password_md5 = md5($password);
    
    # Initialize new user
    $user = ['first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'password'=> $password_md5, 'active' => true, 'well_lit' => false, 'easy_exit' => false, 'easy_parking' => false, 'like_walking' => false];
    
    # Select user collection
    $collection = $db->selectCollection("user");
    
    try {
      # Save user to the database
      $result = $collection->insert($user);
    } catch(MongoCursorException $e) {
      # There was a mistake while saving data to the database
      $_SESSION['message'] = "Error while creating a new user.";
    }
    
    # User was saved succesfully
    $_SESSION['message'] = "Your user account was successfully created.";
  
  } else {
    # Password and password confirmation does not match
    $_SESSION['message'] = "Your password and password confirmation do not match.";
  }
}
?>

<section class="form_section">
  <div class="icon">
    <i class="fa fa-users fa-5x"></i>
  </div>
  <div class="page_title">
    Sign Up
  </div>
  <div>
    <form action="signup.php" method="post">
      <input type='text' id='first_name' name='first_name' placeholder="First name" />
      <input type='text' id='last_name' name='last_name' placeholder="Last name" />
      <input type='text' id='email' name='email' placeholder="E-mail" />
      <input type='password' id='password' name='password' placeholder="Password" />
      <input type='password' id='password_confirmation' name='password_confirmation' placeholder="Password confirmation" />
      <input id="submit" type="submit" class='btn' value="Create account" >
    </form>
    <div>
      <p>Already have an account? <a href="login.php">Log in</a></p>
    </div>
  </div>
</section>

<?php

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$password = $_POST["password"];
$password_confirmation = $_POST["password_confirmation"];

echo "<h1> $first_name </h1>";


$collection = $db->selectCollection("user");
$result = $collection->insert( ['id'=>'5','userid'=>'visitor','password'=>'test','active'=>true, 'well_lit'=>true,'easy_exit'=>false,'easy_parking'=>true] );

require 'foot.php';
?>