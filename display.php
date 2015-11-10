
<script src="form.js"></script>


<div class = 'middle_layout'>
  <form action="" method="get">
          Building:
          <select id="Building" name="Building" class='BigSelect' value="<?php echo $_GET["Building"];?>">
            <option value="HRBB">HRBB</option>
            <option value="Evans">Evans</option>
            <option value="Annex">Annex</option>
          </select>
          Lot Number:
          <input list="Lots" id="Lots" name="Lots" class='BigInput' value="<?php echo $_GET["Lots"];?>">
            <datalist>
              <option value="47">
              <option value="50">
              <option value="51">
            </datalist>
          Degree:
          <input type="text" id="Degree" name="Degree" class='BigInput' value="<?php echo $_GET["Degree"];?>">
          <br>
          <input id="submit" type="button" class='BigButton' value="Submit" onclick="MakeRequest('reasoning.php')">
  </form>
  <br>
  <div id="showserver">This will change becuase of ajax</div>
  <button type="button" onclick="MoveMap()" class='BigButton'>Click</button>
  <br><br>
  <div id="map"></div>
</div>

<div class='bottom_layout'>
  <div style="bottom:0;position:fixed;">Copyright Foo web designs</div>
  <img src="resources/tamu_logo.png" alt="Failed to load image" 
    width='40px' class="imgCenter">
  
</div>
  
