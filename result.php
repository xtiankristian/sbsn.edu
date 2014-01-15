<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Saint Benedict School of Novaliches</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
 <script type="text/javascript">
		function next(){
			document.location.href="CreateExamQuestions.php";
		}
	</script>
</head>

<body>
<?php
session_start();
if($_SESSION['username']) {
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
					<a href="adminportalindex.php"><span>P</span>rofile Summary</a>
				</li>
				<li class="selected">
					<a href="adminportalstudent.html"><span>S</span>ubjects</a>
				</li>
				<li>
					<a href="adminportalcommunity.html"><span>C</span>ommunity</a>
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
					<div class="about">
						<div>
						<?php
						$_SESSION['time'] = null;
						$subject = $_SESSION['subject']; 
						$quiz = $_SESSION['quiztitle'];
						mysql_connect("localhost", "root", "") or die(mysql_error()); 
						mysql_select_db("$subject") or die(mysql_error());
						$questions = "$quiz"."_questions";
						$query1 = mysql_query("Select * FROM $questions");
						$count = 0;
						$pag = "paragraph";
						while($result1 = mysql_fetch_array($query1))
							{ 
							$count++;
							}
						$score = $_SESSION['totalpoints'];
						Print "<br/><H3>$subject</H3>";
						Print "<p>Total Score: $score" ."/"."$count</p>";
						?>
						<input type="Button" onclick="next()" value="OK"/>
						<HR/>
							</div>
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