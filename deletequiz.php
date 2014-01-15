<?php
session_start();
$subject = $_SESSION['subject']; 
$qtitle = $_GET['quiz']; 	
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("$subject") or die(mysql_error());
$username = $_SESSION['username'];
$quiz_questions = "$qtitle"."_questions";
$quiz_answers = "$qtitle"."_answers";
$quiz_essay = "$qtitle"."_essay";
mysql_query("DROP TABLE $qtitle")or die(mysql_error());
mysql_query("DROP TABLE $quiz_questions")or die(mysql_error());
mysql_query("DROP TABLE $quiz_answers")or die(mysql_error());
mysql_query("DROP TABLE $quiz_essay")or die(mysql_error());
mysql_query("DELETE FROM quiz_show WHERE quiz='$qtitle'");
mysql_query("DELETE FROM quiz_all WHERE quiz='$qtitle'");
header("location:onlineexamlist.php");

?>