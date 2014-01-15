<?php
session_start();
if($_SESSION['username']) {
$subject = $_SESSION['subject'];
$desc = $_GET['desc']; 
$score = $_GET['score']; 
$overall = $_GET['overall']; 
$date = $_GET['date']; 
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("$subject") or die(mysql_error());
								$number = $_SESSION['number'];
								$usertable = "$number" . "_grades";
								$query = mysql_query("SELECT * FROM $usertable");
								Print '<TABLE BORDER="5"    WIDTH="100%"   CELLPADDING="4" CELLSPACING="3">';
								while($result = mysql_fetch_array($query))
								{	
									Print '<TR ALIGN="Center">';	
									$tmp = $result['desc'];
									if($desc == $tmp){									
										Print "<TD>".$result['desc']."</TD>"; 
										Print "<TD>".$result['score']."</TD>"; 
										Print "<TD>".$result['overall']."</TD>"; 
										Print "<TD>".$result['date']."</TD>"; 
									}
									Print "</TR>";
								}
								Print '</TABLE>';
/*$subject = $_SESSION['subject'];
$number = $_SESSION['number'];
$usertable = "$number" . "_grades";
$desc = $_GET['desc']; 
$score = $_GET['score']; 
$overall = $_GET['overall']; 
$date = $_GET['date']; 

Print "Subject: $subject <br/> number: $number <br/> usertable: $usertable <br/> desc: $desc <br/> Score: $score <br/> Overall: $overall";
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("$subject") or die(mysql_error());
	for($a = 0; $a < 3; $a++){
		if($a == 1){
			mysql_query("DELETE FROM $usertable WHERE desc='$desc'");
			mysql_query("DELETE * FROM $usertable WHERE desc='$desc'");
		}else{
			mysql_query("DELETE FROM '$usertable' WHERE desc='$desc'");
			mysql_query("DELETE * FROM '$usertable' WHERE desc='$desc'");
		}
	}
header("location: adminportalstudentgrades.php");
*/
}
else{
header("location: index.php");
}
?>