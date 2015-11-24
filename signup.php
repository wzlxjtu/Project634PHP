<?php
require 'head.php';

require 'preferences.php';

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