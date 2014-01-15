<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Saint Benedict School of Novaliches</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<script type="text/javascript">
		function proceed(){
			document.location.href="previewexam.php";
		}
		
	</script>
</head>
<?php
session_start();
if($_SESSION['username']) {
}
else{ header("location:index.php"); }
?>
<?php 
$quiz = $_GET['quiz']; 
$_SESSION['quizctr'] = 1;
?>
<body>
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
							<?Php
							$subject = $_SESSION['subject']; 							
							mysql_connect("localhost", "root", "") or die(mysql_error()); 
							mysql_select_db("$subject") or die(mysql_error());
							$questions = "$quiz"."_questions";
							$query = mysql_query("Select message FROM $quiz");
							$query1 = mysql_query("Select * FROM $questions");
							$count = 0;
							$message = "";
							while($result1 = mysql_fetch_array($query1))
							{ $count++; }
							while($result1 = mysql_fetch_array($query))
							{ $message = $result1['message']; }
							Print "<h2>$subject</h2>"; 
							Print "<p>Exam name: $quiz<br/>";
							Print "Exam Summary: $count items</p>";
							Print "<p>$message</p>";
							$_SESSION['quiztitle'] = $quiz;
							$_SESSION['questionid'] = 1;
							?>
							<br/><input type="button" onclick="proceed()" value="Preview Exam" />
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