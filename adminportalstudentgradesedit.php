<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Saint Benedict School of Novaliches</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<script>
		function displayResult()
		{
			document.location.href = "index.php";
		}
	</script>
</head>
<body>
<?php
session_start();
if($_SESSION['username']) {
}
else{ header("location:index.php"); }
$desc = $_GET['desc']; 
$score = $_GET['score']; 
$overall = $_GET['overall']; 
$date = $_GET['date']; 
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
							$subject = "";
							$query1 = mysql_query("Select subject, subject_desc FROM $usertable");
							while($result1 = mysql_fetch_array($query1))
							{
								$subject = $result1['subject'];
								Print "<h2>".$result1['subject'] .": ".$result1['subject_desc']."</h2>";
							}
						?>
							<p>
								<a href="adminportalstudent2.html">Back to Student Page</a>
							<TABLE BORDER="5"    WIDTH="100%"   CELLPADDING="4" CELLSPACING="3">
								<TR>
									<TH>Description</TH>
									<TH>Score</TH>
									<TH>Overall</TH>
									<TH>Date</TH>
									<TH>Cancel</TH>
								</TR>
								<?php
								mysql_select_db("$subject") or die(mysql_error());
								$number = $_SESSION['number'];
								$usertable = "$number" . "_grades";
								$query = mysql_query("Select * from $usertable");
								$total_score = 0;
								$total_overall = 0;
								while($result = mysql_fetch_array($query))
								{	
									Print '<TR ALIGN="Center">';	
									$tmp = $result['desc'];
									if($desc == $tmp){										
										Print "<TD>".$result['desc']."</TD>"; 
										Print "<TD>".$result['score']."</TD>"; 
										Print "<TD>".$result['overall']."</TD>"; 
										Print "<TD>".$result['date']."</TD>"; 
										Print '<TD></TD>'; 
									}
									Print "</TR>";
									$total_score = $total_score + $result['score'];
									$total_overall = $total_overall + $result['overall'];
								}
								
								if($_SERVER['REQUEST_METHOD'] == 'POST') {
									mysql_connect("localhost", "root", "") or die(mysql_error()); 
									mysql_select_db("$subject") or die(mysql_error());
									$desc1 = mysql_real_escape_string($_POST['desc']);
									$score1 = mysql_real_escape_string($_POST['score']);
									$overall1 = mysql_real_escape_string($_POST['overall']);
									$today = mktime(0,0,0,date("m"),date("d"),date("Y"));
									$today2 = date("Y/m/d", $today);
									mysql_query("UPDATE $usertable SET desc='$desc1', score='$score1', overall='$overall1' WHERE desc='$desc'");
									
									for($a = 0; $a < 3; $a++){
										if($a == 1){
											mysql_query("UPDATE '$usertable' SET desc='$desc1', score='$score1', overall='$overall1'");	
										}
										else{
											mysql_query("UPDATE $usertable SET desc='$desc1', score='$score1', overall='$overall1' ");	
										}									
									}
									header("location:adminportalstudentgrades.php");
								}
									?>
									<TR ALIGN="CENTER">
									<form action="adminportalstudentgradesedit.php" method="POST">
										<TD><input type="text" name="desc"></TD>
										<TD><input type="number" name="score" style="width:50px;"></TD>
										<TD><input type="number" name="overall" style="width:50px;"></TD>
										<TD><input type="submit" value="Submit"></TD>
									</form>
										<TD><a href="adminportalstudentgrades.php?">Cancel Edit</a></TD>
								</TR>
							</TABLE><br/><br/>
						</div>
						<div>
							<h3>Teacher's Announcements</h3>
							<ul>
								<li>
									<div>
										<span>11/10/2012</span>
										<p>
											Pass to me your assignment on verbs
										</p>
									</div>
								</li>
								<li>
									<div>
										<span>11/19/2012</span>
										<p>
											Research about linking verbs. This will be presented tomorrow by your group
										</p>
									</div>
								</li>
								<li class="last">
									<div>
										<span>11/19/2012</span>
										<p>
											We will not be meeting tomorrow, November 20, due to St. Benedict day. I am expecting you to study for my quiz.
										</p>
									</div>
								</li>
							</ul>
							<a href="index.php">View All</a>
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
				<form>
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