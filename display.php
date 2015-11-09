<script src="form.js">
</script>
<div id="wrapper">
  <header>
    Texas A&M University Parking Suggestions
  </header>
  <nav>
    <a href="#" class="btn">Manage Account</a>
    <a href="#" class="btn">Sign Up</a>
    <a href="#" class="btn">Log In</a>
  </nav>
  <aside>
    <div id="form">
      <form action="" method="get">
        <select id="Lots" name="Lots" value="<?php echo $_GET["Lots"];?>">
          <option value="50">Parking Permit Lot 50</option>
          <option value="51">Parking Permit Lot 51</option>
          <option value="100">Parking Permit Lot 100</option>
        </select>
        <input type="text" id="date">
        <select id="Building" name="Building" value="<?php echo $_GET["Building"];?>">
          <option value="HRBB">HRBB</option>
          <option value="Evans">Evans</option>
          <option value="Annex">Annex</option>
        </select>
        <div id="building_recommendation">
          <a href="#">HRBB</a>
          <a href="#">ETB</a>
          <a href="#">FERM</a>
        </div>
        <input id="submit" type="button" class='btn' value="Submit" onclick="SubmitForm('reasoning.php')">
      </form>
    </div>
    <!--
    <div id="showserver">
      This will change becuase of ajax
    </div>
    <button type="button" onclick="ResetMap()" class='btn'>
      Reset
    </button>
    <div id="RoutePanel">
    </div>
    -->
  </aside>
  <section>
    <div id="map">
    </div>
  </section>
</div>