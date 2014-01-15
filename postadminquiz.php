<?php
session_start();
$subject = $_SESSION['subject'];
$title = $_SESSION['quiztitle'];
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("$subject") or die(mysql_error());
header("location: onlineexamlist.php");
?>