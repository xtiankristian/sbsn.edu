<?php
session_start();
mysql_connect("localhost", "root", "") or die(mysql_error());
if($_SESSION['admin']) {
mysql_select_db("sbsn_student") or die(mysql_error());
	$username = $_GET['username']; 
	$fname = $_GET['fname']; 
	$mname = $_GET['mname']; 
	$lname = $_GET['lname']; 
	$subject = $_GET['subject']; 
	$_SESSION['subj'] = $subject;
	$query = mysql_query("DELETE FROM students WHERE username='$username'");
	$user = "$username"."_subjects";
	$query = mysql_query("SELECT * from $user");
	while($row = mysql_fetch_assoc($query)){
		$s = $row['subjects'];
		mysql_select_db("$s");
		$user1 = "$username"."_grades";
		mysql_query("DROP TABLE $user1");
		$user1 = "$username"."_files";
		mysql_query("DROP TABLE $user1");
		$user1 = "$username"."_chat";
		mysql_query("DELETE FROM student_list WHERE username='$username'");
		
	}
	mysql_select_db("sbsn_student") or die(mysql_error());
	$user = "$username"."_notes";
	mysql_query("DROP TABLE $user");
	$user = "$username"."_sbsn";
	mysql_query("DROP TABLE $user");
	$user = "$username"."_subjects";
	mysql_query("DROP TABLE $user");
	header("location: annual.php");
}
else
{
header("location:index.php");
}

?>