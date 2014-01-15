<?php
session_start();
$subject = $_SESSION['subject'];
$title = $_SESSION['quiztitle'];
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("$subject") or die(mysql_error());
$q_id = $_SESSION['quizctr'];
$question = mysql_real_escape_string($_POST['message']);
$quiz_question = "$title"."_questions";
$quiz_answer = "$title"."_answers";
$query = mysql_query("Select * FROM $quiz_question where question_id = '$q_id'");
if(!empty($query)){
	while($row = mysql_fetch_assoc($query)){
		$type = $row['type'];
	}
	if($type != "phrase"){
			$query = mysql_query("DELETE FROM $quiz_question WHERE question_id = '$q_id'");
			$query = mysql_query("DELETE FROM $quiz_answer WHERE question_id = '$q_id'");
	}
	header("location:CreateExamQuestions.php");
}
mysql_query("INSERT INTO $quiz_answer (question_id, answer, correct) VALUES ('$q_id', '$ans[$b]', 1)");
$type = "paragraph";
	mysql_query("INSERT INTO $quiz_question (question_id, question, type) VALUES ('$q_id', '$question', '$type')");
$_SESSION['quizctr'] = $_SESSION['quizctr'] + 1;
header("location:CreateExamQuestions.php");
?>