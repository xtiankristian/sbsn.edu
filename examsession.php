<?php
session_start();
$subject = $_SESSION['subject']; 
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("$subject") or die(mysql_error());
$_SESSION['exam'] = 1;
header("location:exam.php");
?>