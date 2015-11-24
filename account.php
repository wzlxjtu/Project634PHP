<?php
require 'head.php';
?>

<section class="form_section">
  <div class="icon">
    <i class="fa fa-cog fa-5x"></i>
  </div>
  <div class="page_title">
    Manage Account
  </div>
  <div class="preferences">
    <form action="" method="get">
      <h1>Personal Information</h1>
      <label><p>First name</p></label>
      <input type='text' id='first_name' placeholder="First name" />
      <label><p>Last name</p></label>
      <input type='text' id='last_name' placeholder="Last name" />
      <label><p>E-mail</p></label>
      <input type='text' id='email' placeholder="E-mail" />
      <label><p>Password</p></label>
      <input type='password' id='password' placeholder="Password" />
      <label><p>Confirmation</p></label>
      <input type='password' id='password_confirmation' placeholder="Password confirmation" />
      
      <h1>Preferences</h1>
        
      <div class='toggle_option'>
        <div class='toggle_label'>
          <div class="toggle_label_icon"><i class="fa fa-lightbulb-o fa-lg"></i></div>
          <div class="toggle_label_text"><p>Well lit parking lots</p></div>
        </div>
        <div class="toggle_button">
          <input type="checkbox" id="well_lit_checkbox" class="cmn-toggle cmn-toggle-round" />
          <label for="well_lit_checkbox"></label>
        </div>
      </div>
      
      <div class='toggle_option'>
        <div class='toggle_label'>
          <div class="toggle_label_icon"><i class="fa fa-reply"></i></div>
          <div class="toggle_label_text"><p>Easy exit from parking lots</p></div>
        </div>
        <div class="toggle_button">
          <input type="checkbox" id="easy_exit_checkbox" class="cmn-toggle cmn-toggle-round" />
          <label for="easy_exit_checkbox"></label>
        </div>
      </div>
      
      <div class='toggle_option'>
        <div class='toggle_label'>
          <div class="toggle_label_icon"><i class="fa fa-smile-o"></i></div>
          <div class="toggle_label_text"><p>Easy parking</p></div>
        </div>
        <div class="toggle_button">
          <input type="checkbox" id="easy_parking_checkbox" class="cmn-toggle cmn-toggle-round" />
          <label for="easy_parking_checkbox"></label>
        </div>
      </div>
      
      <div class='toggle_option'>
        <div class='toggle_label'>
          <div class="toggle_label_icon"><i class="fa fa-street-view fa-lg"></i></div>
          <div class="toggle_label_text"><p>Like walking</p></div>
        </div>
        <div class="toggle_button">
          <input type="checkbox" id="walking_checkbox" class="cmn-toggle cmn-toggle-round" />
          <label for="walking_checkbox"></label>
        </div>
      </div>
      
      <div class="manage_account_buttons">
        <input id="submit" type="button" class='btn' value="Save" onclick="SubmitForm('account.php')">
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