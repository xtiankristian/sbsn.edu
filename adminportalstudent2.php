<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Saint Benedict School of Novaliches</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
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
$_SESSION['number'] = $number;
$student = $_SESSION['number'];
?>
	<div class="header">
		<div>
			<a href="index.php" id="logo"><img src="images/benedict_header.jpg" alt="logo" height="100px" width="900px"></a>
			<!--<p id="schoolname" >
			Maria Montessori School of Quezon City
			</p>--><br/>
			<ul>
				<li>
					<a href="adminportalindex.php"><span>S</span>tudents</a>
				</li>
				<li class="selected">
					<a href="adminportalstudent.php"><span>S</span>ubjects</a>
				</li>
				<li>
					<a href="adminportalcommunity.php"><span>C</span>ommunity</a>
				</li>
				<li>
					<a href="index.php"><span>L</span>og out</a>
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
							<ul>
							<p>Student Page</p>
								<li>
									<p><a href="studentsharedfiles.php?number=<?php echo"$number"?>&fname=<?php echo"$fname"?>&mname=<?php echo"$mname"?>&lname=<?php echo"$lname"?>">
										Files shared</a>
									</p>
									
								</li>
								<li><?php
										Print '<p><a href="adminportalstudentgrades.php?number='.$number.'">View/Input Grade</a>';
									?>
									</p>
								</li>
								<li><?php
										Print '<p><a href="adminsubjectthread.php?number='.$number.'">View Message Thread</a>';
									?>
									</p>
								</li>
								<li><?php
										Print '<p><a href="essayquizlist.php?number='.$number.'">View Exam Essay Answers</a>';
									?>
									</p>
								</li>
							</ul>
						</div>
						<div>
							<h3>Student Messages</h3>
							<ul>
							<?php
							$student = $_SESSION['number'];
							$usertable = "$student"."_chat";
							$subject = $_SESSION['subject'];
							mysql_connect("localhost", "root", "") or die(mysql_error()); 
							mysql_select_db("$subject") or die(mysql_error());
							$query = mysql_query("Select * FROM $usertable ORDER BY id DESC");
							$a = 0;
							while($result = mysql_fetch_array($query))
							{ 
								if($a == 3){
									break;
								}
								$date = $result['post_date']; 
								$comment = $result['main'];
								$user = $result['post_by'];
								Print "<li><div><span>$date</span>";
								Print "<p>" .$comment ."</p><p>Posted by: ".$user."</p></div></li>";
								$a++;
							}
							?>
							</ul>
								<a href="adminsubjectthread.php">View All</a>
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