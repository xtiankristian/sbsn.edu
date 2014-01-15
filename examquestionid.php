<?php
session_start();
$q_q = $_GET['number'];
$subject = $_SESSION['subject'];
$_SESSION['quizctr'] = $q_q;
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("$subject") or die(mysql_error());

header("location:CreateExamQuestions.php");
?>