<?php
session_start();
$subject = $_SESSION['subject'];
$title = $_SESSION['quiztitle'];
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("$subject") or die(mysql_error());
$q_id = $_SESSION['questionid'];
$a = 1;
$b = 0;	
$c = 0;
$questions = "$title"."_questions";
$answers = "$title"."_answers";
$lol = $_POST['check'];
$query = mysql_query("Select * FROM $answers where question_id = '$q_id'");
$query1 = mysql_query("Select * FROM $questions");
$ctr1 = 0;
while($result1 = mysql_fetch_array($query1))
{
	$ctr1++;
	
}

$time = $_POST['time'];
$_SESSION['time'] = $time;

while($row = mysql_fetch_array($query)){
	$count = $row['correct'];
	if($count == 1){
		$b++;
	}
		foreach($lol as $l){
		
			//$_SESSION[""];
			$last = substr($l, -1);
			if($last == $a)
			{
			$ses = "q$q_id"."_ch$a";
			$_SESSION["$ses"] = 1;
				if($count == 1){
					$c++;
				}
				else{
					$c--;
				}
			}
		}
	$a++;
}

if($b == $c){
	$_SESSION['totalpoints']  = $_SESSION['totalpoints'] + 1;
	$_SESSION['questionid'] = $_SESSION['questionid'] + 1;
	$temp = $_SESSION['questionid'];
	Print "$temp | $ctr1";
	if($temp > $ctr1){
		header("location:summaryresult.php");
	}
	else{
		header("location: exam.php");
	}
}
else{
$_SESSION['questionid'] = $_SESSION['questionid'] + 1;
	$temp = $_SESSION['questionid'];
	if($temp > $ctr1){
		header("location:summaryresult.php");
	}
	else{
		header("location: exam.php");
	}
}
?>