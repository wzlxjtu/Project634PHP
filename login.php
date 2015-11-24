<?php
require 'head.php';

require 'preferences.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  # Get attributes
  $email = $_POST["email"];
  $password = $_POST["password"];
  
  # Compute MD5 hash
  $password_md5 = md5($password);
  
  # Initialize new user
  $user = array('email' => $email, 'password' => $password_md5);
  
  # Select user collection
  $collection = $db->selectCollection("user");
  
  # Find the give user
  $result = $collection->find($user);
  
  if ($result->hasNext()) {
    $_SESSION["user"] = $result->getNext();
  } else {
    $_SESSION["user"] = null;
  }
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
    <form action="login.php" method="post">
      <input type='text' id='email' name='email' placeholder="E-mail" />
      <input type='password' id='password' name='password' placeholder="Password" />
      <input id="submit" type="submit" class='btn' value="Log in" >
    </form>
    <div>
      <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
  </div>
</section>

<?php
require 'foot.php';
?>