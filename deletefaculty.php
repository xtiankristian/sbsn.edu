<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Saint Benedict School of Novaliches</title>
	<link rel="stylesheet" href="css/style6.css" type="text/css">
	<script type="text/javascript">
	function notice(){
		alert("Are you sure you want to delete?");
	}
	</script>
</head>
<body>
<?php
session_start();
if($_SESSION['admin']) {
}
else{ header("location:index.php"); }
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
							Print '<h2>Delete Faculty</h2>';
						?>
							<ul>
							Sort by:
							<form action="adminportalstudent.php" method="POST">
								<select name="sort">
											<option name="fname">First Name</option>
											<option name="lname">Last Name</option>
								</select>
								<br/>
								<input type="submit" value="Submit"/>
							</form>
							<?php
							mysql_connect("localhost", "root", "") or die(mysql_error()); 
							mysql_select_db("sbsn_faculty") or die(mysql_error());
							if($_SERVER['REQUEST_METHOD'] == "POST"){
								$sel = mysql_real_escape_string($_POST['sort']);
									if($sel == "Last Name"){
										$query = mysql_query("Select * FROM student_list ORDER BY lname ASC");
										while($result = mysql_fetch_array($query))
										{
									Print '<li><p>'. $result['lname'] .", ". $result['fname']." " . $result['mname'] . " <br/>(". $result['subject'].": ".$result['subjectdesc'].")".'</p></li>';
									Print '<a href="confirmdeletefaculty.php?username='.$result['username'].'&lname='.$result['lname'].'&fname='.$result['fname'].'&mname='.$result['mname'].'&subject='.$subject.'" onClick="succ()">Delete Entire Record</a>';
										}
									}
									else if($sel == "First Name"){
										$query = mysql_query("Select * FROM student_list ORDER BY fname ASC");
										while($result = mysql_fetch_array($query))
										{
									Print '<li><p>'. $result['lname'] .", ". $result['fname']." " . $result['mname'] . " <br/>(". $result['subject'].": ".$result['subjectdesc'].")".'</p></li>';
									Print '<a href="confirmdeletefaculty.php?username='.$result['username'].'&lname='.$result['lname'].'&fname='.$result['fname'].'&mname='.$result['mname'].'&subject='.$subject.'" onClick="succ()">Delete Entire Record</a>';
										}
									}
							}
							else{
								$query = mysql_query("Select * FROM faculty ORDER BY lname ASC");
								while($result = mysql_fetch_array($query))
								{ 
									Print '<li><p>'. $result['lname'] .", ". $result['fname']." " . $result['mname'] . " <br/>(". $result['subject'].": ".$result['subjectdesc'].")".'</p></li>';
									Print '<a href="confirmdeletefaculty.php?username='.$result['username'].'&lname='.$result['lname'].'&fname='.$result['fname'].'&mname='.$result['mname'].'&subject='.$result['subject'].'" onClick="succ()">Delete Entire Record</a>';
								}
							}
							?>
							</ul>
						</div>
						<div>
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