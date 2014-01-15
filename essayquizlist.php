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
		function createexam(){
			document.location.href="createexam.php";
		}
		function add()
		{
			var hi= confirm("Do you really want me to Continue?");
			if (hi== true){
				document.location.href="index.php";
			}else{
				alert("Going back");
			}
		}
 </SCRIPT>
	</script>
</head>
<body>
<?php
session_start();
if($_SESSION['username']) {
}
else{ header("location:index.php"); }
$number = $_GET['number'];
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
							mysql_connect("localhost", "root", "") or die(mysql_error()); 
							mysql_select_db("sbsn_faculty") or die(mysql_error());
							$username = $_SESSION['username'];
							$usertable = "$username" . "_sbsn";
							$query1 = mysql_query("Select subject, subject_desc FROM $usertable");
							while($result1 = mysql_fetch_array($query1))
							{
							Print "<h2>".$result1['subject'] .": ".$result1['subject_desc']."</h2>";
							}
							?>
							<h3>List of all quizess</h3>
							<ul>
							<?php
							$subject = $_SESSION['subject'];
							mysql_select_db("$subject") or die(mysql_error());
							$usertable = "$number"."_essay";
							$query1 = mysql_query("Select * FROM quiz_all");
							while($result1 = mysql_fetch_array($query1))
							{
								$quiz = $result1['quiz'];
								Print '<li><p><a href="essayanswers.php?quiz='.$quiz.'">'.$quiz.'</a></p>';
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
										<a href="annual.html" align="center"><span>Update Annual Student Records</span></a>
								</div>
								</li>
								<li>
								<div>
										<a href="addstudent.php" align="center"><span>Add Students on Subject</span></a>
								</div>
								</li>
								<li>
								<div>
										<a href="onlineexamlist.php" align="center"><span>Online Exams</span></a>
								</div>
								</li>
								<li>
								<div>
										<a href="adminportalfiles.php" align="center"><span>Share/View Subject Files</span></a>
								</div>
								</li>
								<li>
								<div>
										<a href="subjectannouncement.php" align="center"><span>View Subject Announcements</span></a>
								</div>
								</li>
								<li>
									<div>
										<span>Post an announcement for this subject</span>
										<form action="subjectpost.php" method="POST">
											<textarea cols="33" rows="5" name="myname"></textarea>
											<br/>
											<input type="Submit" value="Submit" />
										</form>
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