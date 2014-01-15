<?php
session_start();
if($_SESSION['studentname']){
$subject = $_SESSION['subject'];
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("$subject") or die(mysql_error());
	$message = mysql_real_escape_string($_POST['message']);
	$student = $_SESSION['studentname'];
	$usertable = "$student"."_chat";
	$today = mktime(0,0,0,date("m"),date("d"),date("Y"));
	$today2 = date("Y/m/d", $today);
	mysql_select_db("sbsn_student") or die(mysql_error());
	$query = mysql_query("SELECT * from students where username='$student'");
	while($result = mysql_fetch_assoc($query)){
		$fname = $result['fname'];
		$lname = $result['lname'];
		$complete = "$fname "."$lname";
	}
	mysql_select_db("$subject") or die(mysql_error());
	mysql_query("INSERT INTO $usertable (main , post_date, post_by) VALUES ('$message', '$today2', '$complete')");
	header("location: subjectthread.php");
}
else{
	header("location: index.php");
}

?>