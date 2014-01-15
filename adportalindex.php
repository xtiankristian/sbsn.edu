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
if($_SESSION['admin']) {
}
else{ 
header("location:index.php"); 
}
?>
	<div class="header">
		<div>
			<a href="index.php" id="logo"><img src="images/benedict_header.jpg" alt="logo" height="100px" width="900px"></a>
			<!--<p id="schoolname" >
			Maria Montessori School of Quezon City
			</p>--><br/>
			<ul>
				<li class="selected">
					<a href="adportalindex.php"><span>S</span>tudents</a>	
				</li>
				<li>
					<a href="adsubjects.php"><span>S</span>ubjects</a>
				</li>
				<li>
					<a href="adportalcommunity.php"><span>C</span>ommunity</a>
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
							mysql_connect("localhost", "root", "") or die(mysql_error()); 
							mysql_select_db("sbsn_student") or die(mysql_error());
							Print "<h2>Master Student List</h2>";
							Print "<p>Profile Summary</p><br/>";
							
						?>
							
							<form action="adportalindex.php" name="lol" method="POST">
								<Input type="text" name="search"/> 
								<Input type="submit" value="Search"/>
							</form>
						<?php
							Print "<ul>";
							Print "<li>";
							Print '<a href="register.php">Register a student</a><br/>';
							Print "</li>";
							mysql_connect("localhost", "root", "") or die(mysql_error()); 
							mysql_select_db("sbsn_student") or die(mysql_error());
							if($_SERVER['REQUEST_METHOD'] == 'POST'){
								$message = mysql_real_escape_string($_POST['search']);
								$query = mysql_query("SELECT * FROM students WHERE username like '%$message%' OR lname like '%$message%' OR fname like '%$message%' OR mname like '%$message%'");
								Print '<a href="adportalindex.php">Back to List</a>';
								Print '<p>Search Results:</p>';
								while($result = mysql_fetch_assoc($query)) 
								{
									Print '<li>' .'<p><a href="adportalstudent.php?number='.$result['username'].'&fname='.$result['fname'].'&mname='.$result['mname'].'&lname='.$result['lname'].'">' .$result['username'] ."</a></p>"."". ' ('.$result['lname'] .', '.$result['fname'].' '.$result['mname']. ')' .'</li>';	
								}
							}
							else
							{
							$query = mysql_query("Select * FROM students ORDER BY lname ASC");
							while($result = mysql_fetch_array($query)) 
									{
										Print '<li>' .'<p><a href="adportalstudent.php?number='.$result['username'].'&fname='.$result['fname'].'&mname='.$result['mname'].'&lname='.$result['lname'].'">' .$result['username'] ."</a></p>"."". ' ('.$result['lname'] .', '.$result['fname'].' '.$result['mname']. ')' .'</li>';
										//Print '<a href="addstudentprocess.php?username='.$result['username'].'&lname='.$result['lname'].'&fname='.$result['fname'].'&mname='.$result['mname'].'" onClick="succ()">Add to list</a>';	
									}
							}
							?>
							</ul>
							</div>
						<div>						
						<ul>
						<ul>
								<li>
								<div>
										<a href="annual.php" align="center"><span>Delete Annual Student Records</span></a>
								</div>
								</li>
								<li>
									<div>
										<!--<form action="adminportalindex.php"name="ann" method="POST">
										<br/>
											<span>Post Announcement to the Entire School</span><br/>
											<textarea name="message" id="message" cols="33" rows="15"></textarea> 
											<br/> <input type="submit" value="Post"/>
										</form>-->
										<?php
										/*mysql_connect("localhost", "root", "") or die(mysql_error()); 
										if($_SERVER['REQUEST_METHOD'] == 'POST'){
											//if($_POST['community']){
												mysql_select_db("announcements") or die(mysql_error());
												$message = mysql_real_escape_string($_POST['message']);
												$today = mktime(0,0,0,date("m"),date("d"),date("Y"));
												$today2 = date("Y/m/d", $today);
												$query = mysql_query("INSERT INTO announcement (post_date , main) VALUES ('$today2', '$message')");
												header("location: adminportalcommunity.php");
											//}
										}*/
										?>
									</div>
								</li>
						</ul>
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
				<form action="portalindex.php">
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