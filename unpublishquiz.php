<?php
session_start();
$subject = $_SESSION['subject']; 
$qtitle = $_GET['quiz']; 	
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("$subject") or die(mysql_error());
$query = mysql_query("select * FROM quiz_show");
while($result = mysql_fetch_array($query)){
	$q = $result['quiz'];
	if($q == $qtitle){
		header("location:onlineexamlist.php");
	}
}
mysql_query("DELETE FROM quiz_show WHERE quiz='$qtitle'");
header("location:onlineexamlist.php");

?>