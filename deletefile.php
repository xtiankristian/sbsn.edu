<?php
session_start();
$subject = $_SESSION['subject'];
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("$subject") or die(mysql_error());

$id = $_GET['id'];
$name = $_GET['name'];

mysql_query("DELETE FROM shared_files WHERE id='$id' AND name='$name'");
header("location: adminportalfiles.php");

?>