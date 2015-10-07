

<script src="form.js"></script>
<form action="" method="get">
        Name:<br>
        <input type="text" id="Name" name="Name" value="<?php echo $_GET["Name"];?>">
        <br>
        Lot Number:<br>
        <input list="Lots" id="Lots" name="Lots" value="<?php echo $_GET["Lots"];?>">
          <datalist>
            <option value="47">
            <option value="50">
            <option value="51">
          </datalist>
        <br>
        <input id="submit" type="button" value="Submit" onclick="MakeRequest('reasoning.php')">
</form>
<div id="showserver">This will change becuase of ajax</div>