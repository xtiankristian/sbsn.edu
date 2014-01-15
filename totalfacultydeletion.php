<?php
session_start();
mysql_connect("localhost", "root", "") or die(mysql_error());
if($_SESSION['admin']) {
mysql_select_db("sbsn_faculty") or die(mysql_error());
	$username = $_GET['username']; 
	$fname = $_GET['fname']; 
	$mname = $_GET['mname']; 
	$lname = $_GET['lname']; 
	$subject = $_GET['subject']; 
	$_SESSION['subj'] = $subject;
	$query = mysql_query("DELETE FROM faculty WHERE username='$username'");
	$use = "$username"."_sbsn";
	mysql_query("DROP TABLE $use");
	mysql_select_db("sbsn_admin") or die(mysql_error());
	//$user = "$username"."_subjects";
	//$query = mysql_query("SELECT * from $user");
	$query = mysql_query("DELETE FROM subject_list WHERE code='$subject'");
	/*while($row = mysql_fetch_assoc($query)){
		$s = $row['subjects'];
		mysql_select_db("$s");
		$user1 = "$username"."_grades";
		mysql_query("DROP TABLE $user1");
		$user1 = "$username"."_files";
		mysql_query("DROP TABLE $user1");
		$user1 = "$username"."_chat";
		mysql_query("DELETE FROM student_list WHERE username='$username'");
		
	}*/
	mysql_select_db("sbsn_student") or die(mysql_error());
	$quer = mysql_query("Select * from students");
	$u = "";
	$ut = "";
	while($a = mysql_fetch_assoc($quer)){
		$u = $a['username'];
		$ut = "$u"."_subjects";
		mysql_query("DELETE FROM $ut WHERE subject_name='$subject'");
	}
	
	mysql_select_db("$subject") or die(mysql_error());
	mysql_query("DROP DATABASE $subject");
	header("location:adsubjects.php");
}
else
{
header("location:index.php");
}

?>