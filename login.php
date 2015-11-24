<?php
require 'head.php';
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