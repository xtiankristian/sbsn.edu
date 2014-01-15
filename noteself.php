<?php
session_start();
mysql_connect("127.0.0.1","root","") or die ("Couldn't connect to database");
mysql_select_db("sbsn_student") or die ("cannot find database");
$student = $_SESSION['studentname'];
$usertable = "$student"."_notes";
$message = mysql_real_escape_string($_POST['message']);
$today = mktime(0,0,0,date("m"),date("d"),date("Y"));
$today2 = date("Y/m/d", $today);
$query = mysql_query("INSERT INTO $usertable (post_date, main) VALUES('$today2','$message')");
header("location: portalindex.php");
?>