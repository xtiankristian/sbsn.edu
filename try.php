<?php
session_start();
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("science1") or die(mysql_error());
$number = $_SESSION['number'];
$usertable = "$number" . "_grades";
$desc = mysql_real_escape_string($_POST['desc']);
	$score = mysql_real_escape_string($_POST['score']);
	$overall = mysql_real_escape_string($_POST['overall']);
	$today = mktime(0,0,0,date("m"),date("d"),date("Y"));
	$today2 = date("Y/m/d", $today);
	$query = mysql_query("INSERT INTO $usertable (desc, score, overall, date) VALUES ('$desc', '$score', '$overall', '$today2')");	
?>

<html>
<tr>
<form action="try.php" name="lol" method="POST">
	<TD><input type="text" name="desc"></TD>
	<TD><input type="number" name="score" style="width:50px;"></TD>
	<TD><input type="number" name="overall" style="width:50px;"></TD>
	<TD><input type="submit" value="Submit"/></TD>
</form>
</tr>
</html>