
<form action="index.php" method="get">
        Name:<br>
        <input type="text" name="Name" value="<?php echo $_GET["Name"];?>">
        <br>
        Lot Number:<br>
        <input list="Lots" name="Lots" value="<?php echo $_GET["Lots"];?>">
          <datalist id="Lots">
            <option value="47">
            <option value="50">
            <option value="51">
          </datalist>
        <br>
        <input type="submit" value="Submit">
</form>

