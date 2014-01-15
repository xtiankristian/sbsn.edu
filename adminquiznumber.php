<?php
session_start();
	$q_q = $_GET['number'];
	$time = $_GET['time'];
	$_SESSION['time'] = $time;
	$subject = $_SESSION['subject'];
	mysql_connect("localhost", "root", "") or die(mysql_error()); 
	mysql_select_db("$subject") or die(mysql_error());
	$_SESSION['questionid'] = $q_q;
	header("location: previewexam.php");
?>