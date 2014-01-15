<?php
session_start();
mysql_connect("localhost", "root", "") or die(mysql_error()); 
if($_SESSION['admin']) {
	$username = $_GET['username']; 
	$fname = $_GET['fname']; 
	$mname = $_GET['mname']; 
	$lname = $_GET['lname']; 
	$subject = $_GET['subject']; 
	$_SESSION['subj'] = $subject;
	mysql_select_db("$subject") or die(mysql_error());
	$query = mysql_query("DELETE FROM student_list WHERE fname='$fname' AND username='$username'");
	$user = "$username"."_subjects";
		mysql_select_db("sbsn_faculty") or die(mysql_error());
		$username1 = $_SESSION['username'];
		$usertable = "$username1" . "_sbsn";
		$first = "";
		$last = "";
		$middle = "";
		$subj_desc = "";
		$query = mysql_query("SELECT fname, mname, lname, subject_desc FROM $usertable");
							while($result = mysql_fetch_array($query)) 
							{ 
								$first = $result['fname']; 
								$last = $result['lname'];
								$middle = $result['mname']; 
								$subj_desc = $result['subject_desc']; 
							}
		mysql_select_db("sbsn_student") or die(mysql_error());
		$combi = "$first"." " ."$middle". " "."$last";
		$combi2 = "$subject".": "."$subj_desc";
		$query = mysql_query("DELETE FROM $user WHERE subjects='$combi2' AND teacher='$combi'");
		mysql_select_db("$subject") or die(mysql_error());
		$user2 = "$username"."_grades";
		mysql_query("DROP TABLE $user2")or die(mysql_error());
		$user3 = "$username"."_files";
		mysql_query("DROP TABLE $user3")or die(mysql_error());
		$user3 = "$username"."_chat";
		mysql_query("DROP TABLE $user3")or die(mysql_error());
		Print '<script type="text/javascript">alert("Records Succesfully Deleted!");</script>';
		header("location:adsubjects2.php");
	
	}
else{
	header("location:index.php");
}
?>