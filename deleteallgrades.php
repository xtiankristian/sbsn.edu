<?php
session_start();
if($_SESSION['username']) {
$subject = $_SESSION['subject'];
$number = $_SESSION['number'];
$usertable = "$number" . "_grades"; 	
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("$subject") or die(mysql_error());
mysql_query("DELETE FROM $usertable");
header("location: adminportalstudentgrades.php");
}
else{
header("location: index.php");
}
?>