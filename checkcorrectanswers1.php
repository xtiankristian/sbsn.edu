<?php
session_start();
$subject = $_SESSION['subject'];
$qtitle = $_SESSION['quiztitle'];
$q_id = $_SESSION['questionid'];
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("$subject") or die(mysql_error());
$questions = "$qtitle"."_questions";
$answers = "$qtitle"."_answers";
$query = mysql_query("Select * FROM $answers where question_id = $q_id");
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
$total = $_SESSION['totalpoints'];
$ses = "q$q_id"."_ch$ans";
$_SESSION["$ses"] = 1;
while($result = mysql_fetch_array($query))
{
	$correct = $result['correct'];
	if($correct == 1){
		$corr_ans[$ctr] = $result['answer'];
		if($corr_ans[$ctr] == $ans){
			$_SESSION['totalpoints']  = $_SESSION['totalpoints'] + 1;
		}
	}
	$ctr++;
}
$_SESSION['questionid'] = $_SESSION['questionid'] + 1;
$temp = $_SESSION['questionid'];
if($temp > $ctr1){
	header("location:summaryresult.php");
}
else{
	header("location: exam.php");
}
?>