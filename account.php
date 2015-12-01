<?php
require 'head.php';

require 'preferences.php';
require 'functions.php';

# User is not logged in
if (! isset($_SESSION["user"])) {
  # Redirect to index
  header('Location: index.php');
}

# Select user collection
$collection = $db->selectCollection("user");
  
# Update user information from the database
$result = $collection->find($_SESSION["user"]);
  
if ($result->hasNext()) {
    
  # Save current user
  $user = $result->getNext();
  
  # Update user session
  $_SESSION["user"] = $user;

} else {
    
  # Unset user session
  unset($_SESSION["user"]);
    
  # Redirect to index
  header('Location: index.php');
}

# Update user information
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  # Get attributes
  $first_name = secure($_POST["first_name"]);
  $last_name = secure($_POST["last_name"]);
  $email = secure($_POST["email"]);
  $password = secure($_POST["password"]);
  $password_confirmation = secure($_POST["password_confirmation"]);
  $well_lit = isset($_POST["well_lit"]) && secure($_POST["well_lit"])  ? true : false;
  $easy_exit = isset($_POST["easy_exit"]) && secure($_POST["easy_exit"])  ? true : false;
  $easy_parking = isset($_POST["easy_parking"]) && secure($_POST["easy_parking"])  ? true : false;
  $like_walking = isset($_POST["like_walking"]) && secure($_POST["like_walking"])  ? true : false;
  
  # Check if password matches password confirmation
  if ($password == $password_confirmation) {
    
    # Password is not entered
    if ($password != "") {
      # Compute MD5 hash
      $password_md5 = md5($password);
      
      # Initialize changes including password
      $user_new_values = ['first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'password'=> $password_md5, 'active' => true, 'well_lit' => $well_lit, 'easy_exit' => $easy_exit, 'easy_parking' => $easy_parking, 'like_walking' => $like_walking];
    
    # Password is entered
    } else {
      # Initialize changes without password
      $user_new_values = ['first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'active' => true, 'well_lit' => $well_lit, 'easy_exit' => $easy_exit, 'easy_parking' => $easy_parking, 'like_walking' => $like_walking];
    }
    
    # Select user collection
    $collection = $db->selectCollection("user");
    
    try {
      # Save user to the database
      $result = $collection->update($user, array('$set'=>$user_new_values));
    } catch(MongoCursorException $e) {
      # There was a mistake while saving data to the database
      $_SESSION['message'] = "Error while creating your account.";
    }
    
    # Find the given user
    $new_user = $collection->find($user_new_values);
  
    if ($new_user->hasNext()) {
    
      # Set user session
      $_SESSION["user"] = $new_user->getNext();
      
      # User was saved succesfully
      $_SESSION['message'] = "Your user account was successfully updated.";
      
      # Redirect to index after succesfull login
      header('Location: index.php');
    
    } else {
      # Unset user session
      unset($_SESSION["user"]);
    
      # Set error message
      $_SESSION['message'] = "Error while updating your account.";
    }
  
  } else {
    # Password and password confirmation does not match
    $_SESSION['message'] = "Your password and password confirmation do not match.";
  }
}

?>

<section class="form_section">
  <div class="icon">
    <i class="fa fa-cog fa-5x"></i>
  </div>
  <div class="page_title">
    Manage Account
    <?php
      if (isset($_SESSION['message'])) {
        echo "<br/><br/>";
        echo "<p>" . $_SESSION['message'] . "</p>";
      }
      
      unset($_SESSION['message']);
    ?>
  </div>
  <div class="preferences">
    <form action="account.php" method="post">
      <h1>Personal Information</h1>
      
      <?php
      # Prefill the fields
      echo "<label><p>First name</p></label>";
      echo "<input type='text' id='first_name' name='first_name' placeholder='First name' value='" . $user['first_name'] . "' />";
      echo "<label><p>Last name</p></label>";
      echo "<input type='text' id='last_name' name='last_name' placeholder='Last name' value='" . $user['last_name'] . "' />";
      echo "<label><p>E-mail</p></label>";
      echo "<input type='text' id='email' name='email' placeholder='E-mail' value='" . $user['email'] . "' />";
      echo "<label><p>Password</p></label>";
      echo "<input type='password' id='password' name='password' placeholder='Password' />";
      echo "<label><p>Confirmation</p></label>";
      echo "<input type='password' id='password_confirmation' name='password_confirmation' placeholder='Password confirmation' />";
      ?>
      
      <h1>Preferences</h1>
        
      <div class='toggle_option'>
        <div class='toggle_label'>
          <div class="toggle_label_icon"><i class="fa fa-lightbulb-o fa-lg"></i></div>
          <div class="toggle_label_text"><p>Well lit parking lots</p></div>
        </div>
        <div class="toggle_button">
          <input type="checkbox" id="well_lit_checkbox" name="well_lit" value="1" class="cmn-toggle cmn-toggle-round" <?php if ($user['well_lit']) {echo "checked='checked'";} ?> />
          <label for="well_lit_checkbox"></label>
        </div>
      </div>
      
      <div class='toggle_option'>
        <div class='toggle_label'>
          <div class="toggle_label_icon"><i class="fa fa-reply"></i></div>
          <div class="toggle_label_text"><p>Easy exit from parking lots</p></div>
        </div>
        <div class="toggle_button">
          <input type="checkbox" id="easy_exit_checkbox" name="easy_exit" value="1" class="cmn-toggle cmn-toggle-round" <?php if ($user['easy_exit']) {echo "checked='checked'";} ?> />
          <label for="easy_exit_checkbox"></label>
        </div>
      </div>
      
      <div class='toggle_option'>
        <div class='toggle_label'>
          <div class="toggle_label_icon"><i class="fa fa-smile-o"></i></div>
          <div class="toggle_label_text"><p>Easy parking</p></div>
        </div>
        <div class="toggle_button">
          <input type="checkbox" id="easy_parking_checkbox" name="easy_parking" value="1" class="cmn-toggle cmn-toggle-round" <?php if ($user['easy_parking']) {echo "checked='checked'";} ?> />
          <label for="easy_parking_checkbox"></label>
        </div>
      </div>
      
      <div class='toggle_option'>
        <div class='toggle_label'>
          <div class="toggle_label_icon"><i class="fa fa-street-view fa-lg"></i></div>
          <div class="toggle_label_text"><p>Like walking</p></div>
        </div>
        <div class="toggle_button">
          <input type="checkbox" id="like_walking_checkbox" name="like_walking" value="1" class="cmn-toggle cmn-toggle-round" <?php if ($user['like_walking']) {echo "checked='checked'";} ?> />
          <label for="like_walking_checkbox"></label>
        </div>
      </div>
      
      <div class="manage_account_buttons">
        <input id="submit" type="submit" class='btn' value="Save" >
      </div>
    </form>
    <!--<div>-->
    <!--  <p>Already have an account? <a href="login.php">Log in</a></p>-->
    <!--</div>-->
  </div>
</section>

<?php
require 'foot.php';
?>