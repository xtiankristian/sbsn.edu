<?php
session_start();
$subject = $_SESSION['subject'];
$title = mysql_real_escape_string($_POST['title']);
$hours = mysql_real_escape_string($_POST['hours']);
$mins = mysql_real_escape_string($_POST['mins']);
$secs = mysql_real_escape_string($_POST['secs']);
$message = mysql_real_escape_string($_POST['message']);
$backtrack = mysql_real_escape_string($_POST['backtrack']);
$username = $_SESSION['username'];
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("$subject") or die(mysql_error());
$quiz_questions = "$title"."_questions";
$quiz_answers = "$title"."_answers";
$quiz_essay = "$title"."_essay";
$_SESSION['quizctr'] = 1;
$_SESSION['quiztitle'] = $title;
mysql_query("CREATE TABLE $title (title TEXT NOT NULL, hours INT NOT NULL, mins INT NOT NULL, secs INT NOT NULL, message TEXT NOT NULL, backtrack VARCHAR(35) NOT NULL)")or die(mysql_error());
$user_input = mysql_query("INSERT INTO $title (title , hours, mins, secs, message, backtrack) VALUES ('$title', '$hours', '$mins', '$secs', '$message', '$backtrack')");
mysql_query("CREATE TABLE $quiz_questions (`id` INT AUTO_INCREMENT primary key NOT NULL, `question_id` int, `question` VARCHAR(200) NOT NULL, `type` VARCHAR(35) NOT NULL)")or die(mysql_error());
mysql_query("CREATE TABLE $quiz_answers (`id` INT AUTO_INCREMENT primary key NOT NULL, `question_id` int, `answer` TEXT NOT NULL, `correct` INT NOT NULL)")or die(mysql_error());
mysql_query("CREATE TABLE $quiz_essay (`id` INT AUTO_INCREMENT primary key NOT NULL, `user` VARCHAR(50) NOT NULL,`question` TEXT NOT NULL, `answer` TEXT NOT NULL, `correct` INT NOT NULL)")or die(mysql_error());
mysql_query("INSERT INTO quiz_all (quiz) VALUES ('$title')");
header("location:CreateExamQuestions.php");
?>