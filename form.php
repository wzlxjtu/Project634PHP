

<script src="form.js"></script>
<form action="" method="get">
        Building:<br>
        <select id="Building" name="Building" value="<?php echo $_GET["Building"];?>">
          <option value="HRBB">HRBB</option>
          <option value="Evans">Evans</option>
          <option value="Annex">Annex</option>
        </select>
        <br>
        Lot Number:<br>
        <input list="Lots" id="Lots" name="Lots" value="<?php echo $_GET["Lots"];?>">
          <datalist>
            <option value="47">
            <option value="50">
            <option value="51">
          </datalist>
        <br>
        Degree:<br>
        <input type="text" id="Degree" name="Degree" value="<?php echo $_GET["Degree"];?>">
        <br>
        <input id="submit" type="button" value="Submit" onclick="MakeRequest('reasoning.php')">
</form>
<div id="showserver">This will change becuase of ajax</div>