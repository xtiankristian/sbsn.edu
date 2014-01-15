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
if($_SESSION['studentname']) {
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
					<a href="portalindex.php"><span>P</span>rofile Summary</a>
				</li>
				<li class="selected">
					<a href="portalsubjects.php"><span>S</span>ubjects</a>
				</li>
				<li>
					<a href="portalcommunity.php"><span>C</span>ommunity</a>
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
							$dbdata = $_SESSION['subject'];
							mysql_connect("localhost", "root", "") or die(mysql_error()); 
							mysql_select_db("$dbdata") or die(mysql_error());
							$query = mysql_query("Select dbname FROM dbname");
							while($result = mysql_fetch_array($query))
							{ 
								$dbname = $result['dbname']; 
							}
							Print "<h2>" . $dbname ."</h2>"
						?><br/>
							<TABLE BORDER="5"    WIDTH="100%"   CELLPADDING="4" CELLSPACING="3">
								<TR>
									<TH>Description</TH>
									<TH>Score</TH>
									<TH>Overall</TH>
									<TH>Date Taken</TH>
								</TR>
								<?php
								mysql_select_db("$dbdata") or die(mysql_error());
								$username = $_SESSION['studentname'];
								$usertable = "$username" . "_grades";
								$query = mysql_query("Select * from $usertable");
								$total_score = 0;
								$total_overall = 0;
								while($result = mysql_fetch_array($query))
								{	
									Print '<TR ALIGN="Center">';
									Print "<TD>".$result['desc']."</TD>"; 
									Print "<TD>".$result['score']."</TD>"; 
									Print "<TD>".$result['overall']."</TD>"; 
									Print "<TD>".$result['date']."</TD>"; 
									Print "</TR>";
									$total_score = $total_score + $result['score'];
									$total_overall = $total_overall + $result['overall'];
								}
								?>
							</TABLE><br/><br/>
							<TABLE BORDER="5"    WIDTH="100%"   CELLPADDING="4" CELLSPACING="3">
								<TR>
									<TH>Total Score</TH>
									<TH>Total Overall</TH>
									<TH>Total Computed Grade</TH>
									<TH>Remark</TH>
								</TR>
								<TR ALIGN="CENTER">
									<?php
										Print "<TD>$total_score</TD>";
										Print "<TD>$total_overall</TD>";
										if($total_score == 0){
											$total = 0;
										}else{
										$total = ($total_score/$total_overall) * 100;
										}
										Print "<TD>$total/100</TD>";
										Print "<TD>Good</TD>";
									?>
								</TR>
							</TABLE>
						</div>
						<div>
							<h3>Teacher's Announcements</h3>
							<ul>
								<?php
							$subject = $_SESSION['subject'];
							mysql_connect("localhost", "root", "") or die(mysql_error()); 
							mysql_select_db("$subject") or die(mysql_error());
								$query = mysql_query("Select * FROM announcement ORDER BY id DESC");
								while($result = mysql_fetch_array($query))
								{ 
									Print "<li><div>";
									Print '<span>Posted:' .$result['post_date'].'</span>' ;
									Print '<p>' .$result['main'].'</p>' ;
									Print "</div></li>";
								}
							?>
							</ul>
							<a href="subjectannouncement.php">View All</a>
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