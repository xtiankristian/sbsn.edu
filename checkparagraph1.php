<?php
session_start();
$subject = $_SESSION['subject'];
$qtitle = $_SESSION['quiztitle'];
$q_id = $_SESSION['questionid'];
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("$subject") or die(mysql_error());
$questions = "$qtitle"."_questions";
$answers = "$qtitle"."_answers";
$table = "$qtitle"."_essay";
$answer = mysql_real_escape_string($_POST['message']);
$student = $_SESSION['studentname'];
$ques = $_SESSION['q'];
mysql_query("INSERT INTO $table (user, answer, question) VALUES ('$student', '$answer', '$ques')");
$query1 = mysql_query("Select * FROM $questions");
$ctr1 = 0;
while($result1 = mysql_fetch_array($query1))
{
	$ctr1++;
}
$time = $_POST['time'];
$_SESSION['time'] = $time;
$ctr = 0;
$ans = $_POST['ans'];
$cor_ans[0] = "";
$ses = "q$q_id"."_ch$q_id";
$_SESSION["$ses"] = $answer;
$_SESSION['essaypoints'] = $_SESSION['essaypoints'] + 1;
$_SESSION['questionid'] = $_SESSION['questionid'] + 1;
$temp = $_SESSION['questionid'];
if($temp > $ctr1){
	header("location:summaryresult.php");
}
else{
	header("location: exam.php");
}
?>