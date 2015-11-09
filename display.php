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
    
      <!-- Useful icons
      <i class="fa fa-bolt fa-lg"></i>
      <i class="fa fa-history fa-lg"></i>
      <i class="fa fa-clock-o"></i>
      <i class="fa fa-road"></i>
      <i class="fa fa-university"></i>
      
      <i class="fa fa-street-view"></i>
      <i class="fa fa-arrow-circle-left"></i>
      <i class="fa fa-arrow-left"></i>
      <i class="fa fa-sign-out"></i>
      <i class="fa fa-level-up"></i>
      
      -->
    
    <div class="parking_option">
      <h1><i class="fa fa-clock-o fa-lg"></i> Shortest Walking Time</h1>
      <div class="parking_lot">
        <div class="title">
          <h2>
            <a href="#">Parking Lot 21</a>
          </h2>
        </div>
        <div class="icons">
          <i class="fa fa-lightbulb-o"></i>
          <i class="fa fa-reply"></i>
          <i class="fa fa-smile-o"></i>
        </div>
      </div>
      <div class="description">
        <p>Numbered parking permit required</p>
      </div>
      <div class="time">
        <div class="to_parking_lot">
          <p><i class="fa fa-car"></i> 1 h 7 min (43 miles)</p>
        </div>
        <div class="to_building">
          <p><i class="fa fa-child"></i> 8 min (0.4 mile)</p>
        </div>
      </div>
    </div>
    <div class="parking_option">
      <h1><i class="fa fa-history fa-lg"></i> Most Often Used</h1>
      <div class="parking_lot">
        <div class="title">
          <h2>
            <a href="#">Parking Lot 19</a>
          </h2>
        </div>
        <div class="icons">
          <i class="fa fa-lightbulb-o"></i>
          <i class="fa fa-reply"></i>
          <i class="fa fa-smile-o"></i>
        </div>
      </div>
      <div class="description">
        <p>Parking free after 5 PM</p>
      </div>
      <div class="time">
        <div class="to_parking_lot">
          <p><i class="fa fa-car"></i> 1 h 4 min (42 miles)</p>
        </div>
        <div class="to_building">
          <p><i class="fa fa-child"></i> 9 min (0.5 mile)</p>
        </div>
      </div>
    </div>
        <div class="parking_option">
      <h1><i class="fa fa-heart fa-lg"></i> Preference Parking</h1>
      <div class="parking_lot">
        <div class="title">
          <h2>
            <a href="#">Parking Lot 14</a>
          </h2>
        </div>
        <div class="icons">
          <i class="fa fa-lightbulb-o"></i>
          <i class="fa fa-reply"></i>
          <i class="fa fa-smile-o"></i>
        </div>
      </div>
      <div class="description">
        <p>Numbered parking permit required</p>
      </div>
      <div class="time">
        <div class="to_parking_lot">
          <p><i class="fa fa-car"></i> 1 h 5 min (43 miles)</p>
        </div>
        <div class="to_building">
          <p><i class="fa fa-child"></i> 9 min (0.5 mile)</p>
        </div>
      </div>
    </div>
    <div id="legend">
      <div id="time_icons">
        <p><i class="fa fa-car"></i> Time to parking lot&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-child"></i> Time to building</p>
      </div>
      <div id="properties_icons">
        <p><i class="fa fa-lightbulb-o"></i> Well lit&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-reply"></i> Easy exit&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-smile-o"></i> Easy parking</p>
      </div>
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