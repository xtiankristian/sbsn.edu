<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Saint Benedict School of Novaliches</title>
	<link rel="stylesheet" href="css/style2.css" type="text/css">
</head>
<body>
<?php
session_start();
if($_SESSION['username']) {
}
else{ header("location:index.php"); }
?>
<?php 
$number = $_GET['number']; 
$fname = $_GET['fname']; 
$lname = $_GET['lname']; 
$mname = $_GET['mname']; 
?>
	<div class="header">
		<div>
			<a href="index.php" id="logo"><img src="images/benedict_header.jpg" alt="logo" height="100px" width="900px"></a>
			<!--<p id="schoolname" >
			Maria Montessori School of Quezon City
			</p>--><br/>
			<ul>
				<li>
					<a href="adminportalindex.php"><span>P</span>rofile Summary</a>
				</li>
				<li class="selected">
					<a href="adminportalstudent.php"><span>S</span>tudents</a>
				</li>
				<li>
					<a href="adminportalcommunity.php"><span>C</span>ommunity</a>
				</li>
				<li>
					<a href="Logout.php"><span>L</span>og out</a>
				</li>

			</ul>
			<div>
			</div>
		</div>
	</div>
	<div class="body">
		<div>
			<div>
				<div>
					<div>
						<div class="section">
							<?php
							Print "<h2>$lname, $fname $mname</h2>";
						?>
							<p>
								Files shared by student
							</p>
							<ul>
																<?php
								$subject = $_SESSION['subject'];
								mysql_connect("localhost", "root", "") or die(mysql_error()); 
								mysql_select_db("$subject") or die(mysql_error());
								$student = $number;
								$usertable = "$student"."_files";
								if(isset($_GET['id']))
									{
										$id=intval($_GET['id']);
										$query = "SELECT title, type, size, content FROM $usertable WHERE id=$id";
										$result = mysql_query($query) or die('Error, query failed');
										list($title, $type, $size, $content) = mysql_fetch_array($result);
										header("Content-Disposition: attachment; filename=$title");
										header("Content-length: $size");
										header("Content-type: $type");
										echo $content;

										exit;

									}
									$query  = "SELECT id, title, message, post_date FROM $usertable";
									$result = mysql_query($query) or die('Error, query failed from query');
									if(mysql_num_rows($result) == 0)
									{
										//echo "Database is empty <br>";
									}else{
										while(list($id, $title, $message, $post_date) = mysql_fetch_array($result))
										{
										Print "<li><p>";
?>										
											<a href="download.php?id=<?php echo $id ?>"><?php echo $title ?></a>

<?php
										Print "<br/>Uploaded: $post_date <br/> $message <br/>";
										}
									}
?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div>
			<div>
				<h3>NEWSLETTER</h3>
				<p>
					Not a part of the committee but want to recieve updates? Subscribe now for free!
				</p>
				<form action="index.php">
					<input type="text" value="Email Address" onblur="this.value=!this.value?'Email Address':this.value;" onfocus="this.select()" onclick="this.value='';">
					<input type="submit" value="Get">
				</form>
			</div>
			<div>
				<h4>LATEST News</h4>
				<ul>
					<li>
						<p>
							<a href="#">Kid becomes topnotcher in the CPA exams</a>
						</p><br/>
						<span>11/07/2013</span>
					</li>
					<li>
						<p>
							<a href="#">Alumni Juan dela Cruz got promoted to CEO</a>
						</p><br/>
						<span>11/03/2013</span>
					</li>
					<li>
						<p>
							<a href="#">Students not taking earthquake drill seriously</a>
						</p><br/>
						<span>11/27/2013</span>
					</li>
				</ul>
			</div>
			<div class="connect">
				<h4>FOLLOW US:</h4>
				<a href="http://www.facebook.com" class="facebook">Facebook</a> <a href="http://www.twitter.com" class="twitter">Twitter</a> <a href="http://www.google.com" class="google">Google+</a>
			</div>
		</div>
		<div>
			<p>
				T.E.A.M.L.E.T.S &#169; 2013 | All Rights Reserved
			</p>
		</div>
	</div>
</body>
</html>