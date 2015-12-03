  <aside>
    <div id="form">
      <form action="" method="get">
        <select id="Lots" name="Lots" value="<?php echo $_GET["Lots"];?>">
          <option value="39">Parking Permit Lot 39</option>
          <option value="47">Parking Permit Lot 47</option>
          <option value="48">Parking Permit Lot 48</option>
          <option value="50">Parking Permit Lot 50</option>
          <option value="51">Parking Permit Lot 51</option>
          <option value="54">Parking Permit Lot 54</option>
          <option value="55">Parking Permit Lot 55</option>
          <option value="62">Parking Permit Lot 62</option>
          <option value="69">Parking Permit Lot 69</option>
          <option value="100">Parking Permit Lot 100</option>
        </select>
          <?php
          
          date_default_timezone_set('America/Chicago');
          
          $current_date = date('m/d/Y', time());
          
          echo "<input type='text' id='datepicker' value='$current_date' />";
          
          echo "<select id='Hours' name='Hours'>";
          for ($i = 1; $i <= 12; $i++) {
            if (date ('g', time()) == $i) {
              $selected = " selected";
            } else {
              $selected = "";
            }
            
            echo "<option value='$i'$selected>$i</option>";
          }
          
          echo "</select>";
          
          echo "<select id='Meridiems' name='Meridiems'>";
          
          $meridiems = array("AM", "PM");
          
          for ($i = 0; $i < 2; $i++) {
            $meridiem = $meridiems[$i];
            if (date('A', time()) == $meridiem) {
              $selected = " selected";
            } else {
              $selected = "";
            }
            
            echo "<option value='$meridiems[$i]'$selected>$meridiems[$i]</option>";
          }
          
          echo "</select>";
          ?>
        <select id="Building" name="Building" value="<?php echo $_GET["Building"];?>">
          <option value="HRBB">HRBB</option>
          <option value="ETB">ETB</option>
          <option value="Evans">Evans</option>
          <option value="Annex">Annex</option>
          <option value="Kyle">Kyle</option>
          <option value="Zachry">Zachry</option>
          <option value="MSC">MSC</option>
        </select>
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
    
    <div class="parking_option" id = 'SWT'>
      <h1><i class="fa fa-clock-o fa-lg"></i> Shortest Walking Time</h1>
      <div class="parking_lot">
        <div class="title" id = 'SWT_text'>
          <h2>
            <a href="#">No Destination</a>
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
          <p><i class="fa fa-car"></i> <span id = 'SWT_drive'>? h ? min (? miles)</span></p>
        </div>
        <div class="to_building">
          <p><i class="fa fa-child"></i> <span id = 'SWT_walk'>? min (? mile)</span></p>
        </div>
      </div>
    </div>
    <div class="parking_option" id = 'MOU'>
      <h1><i class="fa fa-history fa-lg"></i> Most Often Used</h1>
      <div class="parking_lot">
        <div class="title" id = 'MOU_text'>
          <h2>
            <a href="#">No Destination</a>
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
          <p><i class="fa fa-car"></i> <span id = 'MOU_drive'>? h ? min (? miles)</span></p>
        </div>
        <div class="to_building">
          <p><i class="fa fa-child"></i> <span id = 'MOU_walk'>? min (? mile)</span></p>
        </div>
      </div>
    </div>
        <div class="parking_option" id = 'PP'>
      <h1><i class="fa fa-heart fa-lg"></i> Preference Parking</h1>
      <div class="parking_lot">
        <div class="title" id = 'PP_text'>
          <h2>
            <a href="#">No Destination</a>
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
          <p><i class="fa fa-car"></i> <span id = 'PP_drive'>? h ? min (? miles)</span></p>
        </div>
        <div class="to_building">
          <p><i class="fa fa-child"></i> <span id = 'PP_walk'>? min (? mile)</span></p>
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