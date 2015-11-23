<?php
require 'head.php';
?>

<section class="form_section">
  <div class="icon">
    <i class="fa fa-users fa-5x"></i>
  </div>
  <div class="title">
    Sign Up
  </div>
  <div>
    <form action="" method="get">
      <input type='text' id='first_name' placeholder="First name" />
      <input type='text' id='last_name' placeholder="Last name" />
      <input type='text' id='email' placeholder="E-mail" />
      <input type='password' id='password' placeholder="Password" />
      <input type='password' id='password_confirmation' placeholder="Password confirmation" />
      <input id="submit" type="button" class='btn' value="Create account" onclick="SubmitForm('signup.php')">
    </form>
    <div>
      <p>Already have an account? <a href="login.php">Log in</a></p>
    </div>
  </div>
</section>

<?php
require 'foot.php';
?>