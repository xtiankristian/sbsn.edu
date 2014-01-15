<?php
session_start();
$subject = $_SESSION['subject']; 
$_SESSION['exam'] = 0;
$quiz = $_SESSION['quiztitle'];
$user = $_SESSION['studentname'];
$score = $_SESSION['totalpoints'];
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("$subject") or die(mysql_error());
$questions = "$quiz"."_questions";
$query1 = mysql_query("Select * FROM $questions");
$count = 0;
while($result1 = mysql_fetch_array($query1))
	{ $count++; }
$usertable = "$user"."_grades";
$today = mktime(0,0,0,date("m"),date("d"),date("Y"));
$today2 = date("Y/m/d", $today);
for($a = 0; $a < 3; $a++){
	if($a == 1){
		mysql_query("INSERT INTO $usertable VALUES ('$quiz', '$score', '$count', '$today2')");	
	}
	else{
		mysql_query("INSERT INTO '$usertable' VALUES ('$quiz', '$score', '$count', '$today2')");	
	}									
}
header("location:grades.php");
?>