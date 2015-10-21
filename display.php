
<script src="form.js"></script>

<div class="top_layout">Texas A&M University Parking Suggestions</div>

<div class = 'middle_layout'>
  <form action="" method="get">
          Building:
          <select id="Building" name="Building" class='BigSelect' value="<?php echo $_GET["Building"];?>">
            <option value="HRBB">HRBB</option>
            <option value="Evans">Evans</option>
            <option value="Annex">Annex</option>
          </select>
          Lot Number:
          <select id="Lots" name="Lots" class='BigSelect' value="<?php echo $_GET["Lots"];?>">
              <option value="50">50</option>
              <option value="51">51</option>
              <option value="100">100</option>
          </select>
          Degree:
          <input type="text" id="Degree" name="Degree" class='BigInput' value="<?php echo $_GET["Degree"];?>">
          <br>
          <input id="submit" type="button" class='BigButton' value="Submit" onclick="MakeRequest('reasoning.php')">
  </form>
  <br>
  <div id="showserver">This will change becuase of ajax</div>
  <button type="button" onclick="ResetMap()" class='BigButton'>Reset</button>
  <button type="button" onclick="GetMyPosition()" class='BigButton'>GetMyPosition</button>
  <br><br>
  <div id="map"></div>
</div>

<div class='bottom_layout'>
  <div style="bottom:0;position:fixed;">Copyright Foo web designs</div>
  <img src="resources/tamu_logo.png" alt="Failed to load image" 
    width='40px' class="imgCenter">
  
</div>
