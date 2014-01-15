<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Saint Benedict School of Novaliches</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
 <script type="text/javascript">
		function cancel(){
			document.location.href="onlineexamlist.php";
		}
	</script>
</head>

<body>
<?php
session_start();
if($_SESSION['username']) {
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
					<div class="about">
						<div>
						<?php
						$subject = $_SESSION['subject'];
						?>
						<form action="CreateExamQuestionscheck.php" method="POST">
						<input type="Submit" value="Submit"/>
						<input type="Button" onclick="cancel()" value="Cancel"/>
						<p>Exam Title: <input type="text" name="title"/>
						<p>Time Limit: (Place no time if you wish to have no time limit)</p>
						<p>Hours: <input type="number" name="hours" value="00"/><br/>
						Minutes: <input type="number" name="mins" value="00"/><br/>
						Seconds: <input type="number" name="secs" value="00"/>						
						<p/>Backtracking 
						<select name="backtrack">
							<option name="yes">yes</option>
							<option name="no">no</option>
						</select>
						<p>Guidelines: <br/><textarea name="message" id="message" cols="40" rows="10"></textarea>
						</form>
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