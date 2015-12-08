<?php 

if(isset($_GET['state'])){
  echo $_GET['state'];
}

?>

<html>
<body>
<form method="GET">
  <select name="state"> 
    <option value='0' <?php if($state == '1'){echo "selected";}?>>Option 1</option> 
	<option value='1' <?php if($state == '2'){echo "selected";}?>>Option 2</option> 
    </select>
  <input type="submit" value="Submit">
</form>
</body>
</html>

