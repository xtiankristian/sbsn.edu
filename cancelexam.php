<?php
session_start();
$subject = $_SESSION['subject'];
$title = $_SESSION['quiztitle'];
$username = $_SESSION['username'];
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("$subject") or die(mysql_error());
$quiz_questions = "$title"."_questions";
$quiz_answers = "$title"."_answers";
$_SESSION['quizctr'] = 1;
$_SESSION['quiztitle'] = $title;
Print "$title";
mysql_query("DROP TABLE $title")or die(mysql_error());
mysql_query("DROP TABLE $quiz_questions")or die(mysql_error());
mysql_query("DROP TABLE $quiz_answers")or die(mysql_error());
mysql_query("DELETE FROM quiz_all WHERE quiz=$title");
//header("location:adminportalstudent.php");
?>