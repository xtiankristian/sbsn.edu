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
$subject = $_SESSION['subj'];
?>
	<div class="header">
		<div>
			<a href="index.php" id="logo"><img src="images/benedict_header.jpg" alt="logo" height="100px" width="900px"></a>
			<!--<p id="schoolname" >
			Maria Montessori School of Quezon City
			</p>--><br/>
			<ul>
				<li>
					<a href="adportalindex.php"><span>S</span>tudents</a>	
				</li>
				<li class="selected">
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
							mysql_select_db("sbsn_faculty") or die(mysql_error());
							$query = mysql_query("SELECT * from faculty WHERE subject = '$subject'");
							while($res = mysql_fetch_assoc($query)){
								$username = $res['username'];
							}
							$usertable = "$username" . "_sbsn";
							$query1 = mysql_query("Select fname, lname, mname FROM $usertable");
							while($result1 = mysql_fetch_array($query1))
							{
							Print "<h2>".$result1['lname'] .", ".$result1['fname'] ." " .$result1['mname']."</h2>";
							}
							Print "<p>Profile Summary</p>";
							Print "<ul>";
							
							$query = mysql_query("SELECT * from $usertable") ;
							while($result = mysql_fetch_array($query)) 
							{ 
								Print "<li><p>Advisory Class: " .$result['section'] . "</p></li>"; 
								Print "<li><p>Address: ".$result['address'] . "</p></li>"; 
								Print "<li><p>Zip Code: " .$result['zip_code'] . "</p></li>"; 
								Print "<li><p>Phone Number: ".$result['phone_number'] . "</p></li>";
								Print "<li><p>Cell Number: " .$result['cell_number'] . "</p></li>"; 
								Print "<li><p>First Name: " .$result['fname'] . "</p></li>"; 
								Print "<li><p>Last Name: ".$result['lname'] . "</p></li>";
								Print "<li><p>Middle Name: " .$result['mname'] . "</p></li>"; 
								Print "<li><p>Email: " .$result['email'] ."</p></li>";
								$_SESSION['subject'] = $result['subject'];
							}
							?>
							<li><p><a href="adfacultyeditinfo.php">Edit personal information</a></p></li>
							</ul>
							</div>
						<div>						
						<ul>
								<li>
									<div>
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