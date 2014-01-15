<?php session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if($username && $password)
{

		$connect = mysql_connect("127.0.0.1","root","") or die ("Couldn't connect to database");
		mysql_select_db("sbsn_admin") or die ("cannot find database"); //login is the name of the database
		$query = mysql_query("SELECT * FROM admin WHERE username='$username'");
		$numrows = mysql_num_rows($query);
		if($numrows != 0)
		{
		
			while ($row = mysql_fetch_assoc($query))
				{
		
				$dbusername = $row['username'];
				$dbpassword = $row['password'];
				
				}
				
				if ($username == $dbusername && $password == $dbpassword)
				{
				$_SESSION['admin'] = $dbusername;
					header("location:adportalindex.php");
					echo "cooorrect";
					
				}
				else
					echo "Incorrect password";
		}
				
		else
				die ("Username doesn't exist");		
		
}
else
	die ("Please enter a username and password");

?>