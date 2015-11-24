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
  
  # Find the given user
  $result = $collection->find($user);
  
  if ($result->hasNext()) {
    
    # Set user session
    $_SESSION["user"] = $result->getNext();
    
    # Redirect to index after succesfull login
    header('Location: index.php');
  } else {
    
    # Unset user session
    unset($_SESSION["user"]);
    
    # Set error message
    $_SESSION['message'] = "Incorrect login credentials.";
  }
}
?>

<section class="form_section">
  <div class="icon">
    <i class="fa fa-user fa-5x"></i>
  </div>
  <div class="page_title">
    Log In
    <?php
      if (isset($_SESSION['message'])) {
        echo "<br/><br/>";
        echo "<p>" . $_SESSION['message'] . "</p>";
      }
      
      unset($_SESSION['message']);
    ?>
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