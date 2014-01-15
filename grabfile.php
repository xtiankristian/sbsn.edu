<?php
session_start();
$subject = $_SESSION['subject'];
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("$subject") or die(mysql_error());

if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];
$message = mysql_real_escape_string($_POST['message']);
$today = mktime(0,0,0,date("m"),date("d"),date("Y"));
$today2 = date("Y/m/d", $today);
$fp = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}


$query = "INSERT INTO shared_files (name, size, type, content, message, post_date ) ".
"VALUES ('$fileName', '$fileSize', '$fileType', '$content', '$message','$today2')";
mysql_query($query);
echo "Success?";
header("location:adminportalfiles.php");
}

?>