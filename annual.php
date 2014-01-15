<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Saint Benedict School of Novaliches</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<script type="text=javascript">
		function succ(){
		alert("Record Succesfully Added!");
		}
	</script>
</head>
<body>
<?php
session_start();
if($_SESSION['admin']) {
}
else{ header("location:index.php"); }
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
							$query = mysql_query("SELECT * FROM faculty where subject = '$subject'");
							$username = "";
							while($res = mysql_fetch_assoc($query)){
								$username = $res['username'];
							}
							$usertable = "$username" . "_sbsn";
							$subject = "";
							$query1 = mysql_query("Select subject, subject_desc FROM $usertable");
							while($result1 = mysql_fetch_array($query1))
							{
								$subject = $result1['subject'];
								Print "<h2>".$result1['subject'] .": ".$result1['subject_desc']."</h2>";
							}
							?>
							<ul>
							Search Student:
							<form action="addstudent.php" name="student"method="POST">
								<Input type="text" name="search"/> 
								<Input type="submit" value="Search"/>
							</form>
							<?php
							mysql_connect("localhost", "root", "") or die(mysql_error()); 
							mysql_select_db("sbsn_faculty") or die(mysql_error());
							$username = "";
							while($res = mysql_fetch_assoc($query)){
								$username = $res['username'];
							}
							$usertable = "$username" . "_sbsn";
							$query1 = mysql_query("Select subject FROM $usertable");
							mysql_select_db("sbsn_student") or die(mysql_error());
							if($_SERVER['REQUEST_METHOD'] == 'POST'){
							$message = mysql_real_escape_string($_POST['search']);
										$query = mysql_query("SELECT * FROM students WHERE username like '%$message%' OR lname like '%$message%' OR fname like '%$message%' OR mname like '%$message%'");
										while($result = mysql_fetch_array($query)) 
									{
										Print '<form action="addstudentprocess.php" name="student" method="POST">';
										Print '<li>' .'<p>' .$result['username'] ."</p>"."". ' ('.$result['lname'] .', '.$result['fname'].' '.$result['mname']. ')' .'</li>';
										Print '<a href="confirmstudentdelete.php?username='.$result['username'].'&lname='.$result['lname'].'&fname='.$result['fname'].'&mname='.$result['mname'].'&subject='.$subject.'" onClick="succ()">Delete Entire Student Record</a>';
										Print '</form>';
										
									}
								}
							else{
							$query = mysql_query("SELECT * FROM students");
							while($result = mysql_fetch_array($query)) 
									{
										Print '<form action="addstudentprocess.php" name="student" method="POST">';
										Print '<li>' .'<p>' .$result['username'] ."</p>"."". ' ('.$result['lname'] .', '.$result['fname'].' '.$result['mname']. ')' .'</li>';
										Print '<a href="confirmstudentdelete.php?username='.$result['username'].'&lname='.$result['lname'].'&fname='.$result['fname'].'&mname='.$result['mname'].'&subject='.$subject.'" onClick="succ()">Delete Entire Record</a>';
										Print '</form>';
										
									}
							}
								?>
									<?php
										set_error_handler('exceptions_error_handler');

										function exceptions_error_handler($severity, $message, $filename, $lineno) {
											if (error_reporting() == 0) {
												return;
											}
											if (error_reporting() & $severity) {
												throw new ErrorException($message, 0, $severity, $filename, $lineno);
											}
										}
									?>
							</ul>
						</div>
						<div>
							<ul>
								<li>
								<div>
										<a href="annual.php" align="center"><span>Delete Annual Student Records</span></a>
								</div>
								</li>
								<li>
								<div>
										<a href="addstudent.php" align="center"><span>Add Students on Subject</span></a>
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