<?php 
session_start();
$subject = $_SESSION['subject'];
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("$subject") or die(mysql_error());
$today = mktime(0,0,0,date("m"),date("d"),date("Y"));
$today2 = date("Y/m/d", $today);
$message = mysql_real_escape_string($_POST['myname']);

$query = mysql_query("INSERT INTO announcement (main, post_date) VALUES ('$message', '$today2')");
header("location: subjectannouncement.php");

?>