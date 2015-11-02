
<script src="form.js"></script>
<div id="wrapper">
  <div id="header">
<div class="top_layout" id="header-content">
  Texas A&M University Parking Suggestions
  <div id="nav"><a href="#" class="btn">Manage Account</a> <a href="#" class="btn">Sign Up</a> <a href="#" class="btn">Log In</a></div>
  </div>
</div>
<div id="content">
<div class = 'middle_layout' id="sidebar">
  <form action="" method="get">
          <select id="Lots" name="Lots" class='BigSelect' value="<?php echo $_GET["Lots"];?>">
              <option value="Parking Permit Lot 50">Parking Permit Lot 50</option>
              <option value="Parking Permit Lot 51">Parking Permit Lot 51</option>
              <option value="Parking Permit Lot 100">Parking Permit Lot 100</option>
          </select>
          <select id="Building" name="Building" class='BigSelect' value="<?php echo $_GET["Building"];?>">
            <option value="HRBB">HRBB</option>
            <option value="Evans">Evans</option>
            <option value="Annex">Annex</option>
          </select>
          
          <input id="submit" type="button" class='btn' value="Submit" onclick="SubmitForm('reasoning.php')">
  </form>
  <br>
  <div id="showserver">This will change becuase of ajax</div>
  <button type="button" onclick="ResetMap()" class='btn'>Reset</button>
  <div id="RoutePanel"></div>
  <br><br>
</div>
        <div id="main">
            <div id="map"></div>
        </div>

<!--<div class='bottom_layout'>-->
<!--  <div style="bottom:0;position:fixed;">Copyright Foo web designs</div>-->
<!--  <img src="resources/tamu_logo.png" alt="Failed to load image" -->
<!--    width='40px' class="imgCenter">-->
<!--  </div>-->
</div>
</div>