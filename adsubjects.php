<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Saint Benedict School of Novaliches</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<script type="text/javascript">
	function notice(){
		document.location.href="facultyregister.php";
	}
	function notice2(){
		document.location.href="deletefaculty.php";
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
					<div class="about">
						<div>
							<h2>Subjects</h2>
							<div>
							<?php 
							mysql_connect("localhost", "root", "") or die(mysql_error()); 
							mysql_select_db("sbsn_admin") or die(mysql_error());
							Print '<input type="button" value="Add a subject" onclick="notice()">';
							Print '<input type="button" value="Delete a subject" onclick="notice2()" ><br/><br/><br/>';
							$query1 = mysql_query("Select * FROM subject_list");
							$dbname= "";
							while($result1 = mysql_fetch_array($query1))
							{
							$dbname = $result1['code'];
							Print '<a href="adsubjects2.php?dbname='.$result1['code'].'"><h3>'.$dbname.': '.$result1['desc'] ."</h3></a></h3><br/>";
							Print "<font style='underlined'>" .$result1['teacher']."</font><br/><br/><br/>";
							}
							?>
									<!--<a href="portalsubjects2.html"><h3>ENGLISH1: High School English </h3></a></h3><br/>
								<font style="underlined">
									Mr. Micheal Naga
								</font><br/><br/><br/>

								<a href="portalsubjects2.html"><h3>SCIENCE1: High School Science </h3></a></h3><br/>
								<font style="underlined">
									Ms. Kaba Miranda
								</font><br/><br/><br/>
									<a href="portalsubjects2.html"><h3>PE1: Physical Education 1st Yr.</h3></a></h3><br/>
								<font style="underlined">
									Mr. Rolando Mendes
								</font><br/><br/><br/>

									<a href="portalsubjects2.html"><h3>C.L.E1: Life and works of Jesus </h3></a></h3><br/>
								<font style="underlined">
									Mr. Rudy don Gallo
								</font><br/><br/><br/>-->
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
