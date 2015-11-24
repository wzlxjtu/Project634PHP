<?php
require 'head.php';

require 'preferences.php';
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  # Get attributes
  $email = secure($_POST["email"]);
  $password = secure($_POST["password"]);
  
  # Compute MD5 hash
  $password_md5 = md5($password);
  
  # Initialize new user
  $user = array('email' => $email, 'password' => $password_md5);
  
  # Select user collection
  $collection = $db->selectCollection("user");
  
  # Find the give user
  $result = $collection->find($user);
  
  if ($result->hasNext()) {
    
    # Set user session
    $_SESSION["user"] = $result->getNext();
  } else {
    
    # Unset user session
    unset($_SESSION["user"]);
  }
  
  # Refresh to update header with appropriate buttons
  header("Refresh:0");
}
?>

<section class="form_section">
  <div class="icon">
    <i class="fa fa-user fa-5x"></i>
  </div>
  <div class="page_title">
    Log In
  </div>
  <div>
    <form action="" method="get">
      <input type='text' id='email' placeholder="E-mail" />
      <input type='password' id='password' placeholder="Password" />
      <input id="submit" type="button" class='btn' value="Log in" onclick="SubmitForm('login.php')">
    </form>
    <div>
      <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
  </div>
</section>

<?php
require 'foot.php';
?>