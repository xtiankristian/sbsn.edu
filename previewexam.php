<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Saint Benedict School of Novaliches</title>
	<link rel="stylesheet" href="css/style4.css" type="text/css">
 <script type="text/javascript" async>
 var counter = 9999999;
var t;
var isTimerOn = false;
var hours = 0;
var mins = 0;
var secs = 0;
var tot = hours + mins + secs;
function startTimer(){
hours = document.getElementById('hours').value;
mins = document.getElementById('mins').value;
secs = document.getElementById('secs').value;
curr = document.getElementById('currtime').value;

if(hours <=0 && mins <= 0 && secs <=0){
	noTime();
}
else{
	secs = 60;
}
tot = hours + mins + secs;
hours = tot/3600;
mins = hours / 60;

	if(!isTimerOn)
	{
		isTimerOn = true;
		countdown();
	}
}

function Redirect()
{
	window.location.assign("result.php")
}

function noTime(){
	document.getElementById('test').innerHTML="No time limit";
}

function countdown()
{
	if(curr == ""){
		document.getElementById('test').innerHTML=tot + " seconds remaining";
		document.getElementById('singleans').value=tot;
		tot--;
		if(tot == 0){
			Redirect();
		}
	}
	else
	{
		document.getElementById('test').innerHTML=curr + " seconds remaining";
		document.getElementById('singleans').value=curr;
		curr--;
			if(curr == 0){
				Redirect();
			}
	}
	t = setTimeout("countdown()",1000);

}

	</script>
</head>

<body onload="startTimer()">
<?php
session_start();
if($_SESSION['username']) {
}
else{ header("location:index.php"); }
?>
<?php 
$qtitle = $_SESSION['quiztitle'];
$q_id = $_SESSION['questionid'];
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
					<a href="adminportalstudent.html"><span>S</span>tudents</a>
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
						<form action="backtoedit.php" method="POST">
							<input type="Submit" value="Back to Edit"/>
						</form>
						<form action="postadminquiz.php" method="POST">
							<input type="Submit" value="Submit the Quiz"/><br/>
						</form>
						<?php
						$subject = $_SESSION['subject'];
							mysql_connect("localhost", "root", "") or die(mysql_error()); 
							mysql_select_db("$subject") or die(mysql_error());
							
							$kwery = mysql_query("SELECT * FROM $qtitle");
							while($res = mysql_fetch_array($kwery))
							{
								$hours = $res['hours'];
								$mins = $res['mins'];
								$secs = $res['secs'];
							}
							Print '<input id="hours" type="text" style="visibility: hidden" value="'.$hours.'">
								   <input id="mins" type="text" style="visibility: hidden"  value="'.$mins.'">
								   <input id="secs" type="text" style="visibility: hidden"  value="'.$secs.'">';
						?>
						<br/>
						<?php Print '<H3 id="eyts">'.$qtitle.'</H3>';
						$taym = null;
							Print '<input id="currtime" type="text" style="visibility: hidden"  value="';
							if(!empty($_SESSION['time'])){
									$taym = $_SESSION['time'];
								Print "$taym".'">';
							}
							else{
								Print '">';
							}							
						?>
							
							<br/><p>Time Limit:<span id="test" name="time"></span></p>

						<?php
							
							$questions = "$qtitle"."_questions";
							$answers = "$qtitle"."_answers";
							$query5 = mysql_query("Select * FROM $qtitle");
							while($result = mysql_fetch_array($query5))
							{
								$bt = $result['backtrack'];
							}
							if($bt == "yes"){
								$utab = "$qtitle"."_questions";
								$query6 = mysql_query("Select * FROM $utab");
								$e = 1;
								Print "<p>Click on the numbers to go back on a number</p>";
								Print '<div id="btrack1">';
								while($result = mysql_fetch_array($query6))
								{
									Print '<a href="adminquiznumber.php?number='.$e.'&time='.$taym.'">'.$e.'</a> | ';
									$e++;
								}
								Print"</div><br/><br/><br/><br/><br/>";
							}
							else{
								
							}
							
							Print "<p>Question number $q_id</p>";
							$query = mysql_query("Select * FROM $questions where question_id = $q_id");
							$two = "paragraph";
							$three = "phrase";
							$four = "multi_answers";
							$two_ctr = false;
							$three_ctr = false;
							$four_ctr = false;
							
							while($result = mysql_fetch_array($query))
							{ 
								$tmp = $result['type'];
								if($tmp == $two){
									$two_ctr = true;
								}
								else if($tmp == $three){
									$three_ctr = true;
								}
								else if($tmp == $four){
									$four_ctr = true;
								}
								$lol = $result['question'];
								Print '<p>'.$result['question'].'</p>';
								$_SESSION['q'] = $lol;
							}
							?>
							
						<?php
						if($two_ctr == true){
							Print '<form action="checkparagraph.php" method="POST">';
							Print '<input type="text" style="visibility: hidden" name="time" id="singleans" value=""><br/>';
							$ses = "q$q_id"."_ch$q_id";
							if(empty($_SESSION["$ses"])){
									$_SESSION["$ses"] = "";
							}
							Print '<textarea cols="65" rows="15" name="message">';
							if(!empty($_SESSION["$ses"])){
								$mess = $_SESSION["$ses"];
								Print "$mess</textarea><br/>";
							}
							else{
								Print '</textarea><br/>';
							}
							Print	'<input type="submit" value="Submit Answer"/>';
							Print '</form>';
						}
						else if($three_ctr == true){
							Print '<form action="checkphrase.php" method="POST">';
							Print '<input type="text" style="visibility: hidden" name="time" id="singleans" value=""><br/>';
							$ses = "q$q_id"."_ch$q_id";
							if(empty($_SESSION["$ses"])){
									$_SESSION["$ses"] = "";
							}
							Print '<input type="text" name="answer"';
							if(!empty($_SESSION["$ses"])){
								$tree = $_SESSION["$ses"];
								Print 'value="'.$tree.'"/><br/><br/>';
							}
							else{
								Print '/><br/><br/>';
							}
							Print	'<input type="submit" value="Submit Answer"/>';
							Print '</form>';
						}
						else if($four_ctr == true){
							Print '<form action="checkmultianswer.php" method="POST">';
							Print '<input type="text" style="visibility: hidden" name="time" id="singleans" value="">';
							$query = mysql_query("Select * FROM $answers where question_id = $q_id");
							$a = 1;
							while($result = mysql_fetch_array($query))
							{ 
								Print '<p><input type="checkbox" name="check[]" value="answer'.$a.'"';
								$ses = "q$q_id"."_ch$a";
								if(empty($_SESSION["$ses"])){
									$_SESSION["$ses"] = 0;
								}
								$try = $_SESSION["$ses"];
								if($try == 1){
									Print 'checked="checked"'.'">'.$result['answer'].'</p>';
									$a++;
								}
								else{
									Print '">'.$result['answer'].'</p>';
									$a++;
								}
							}
							Print	'<input type="submit" value="Submit Answer"/>';
							Print '</form>';
						}
						else{
							Print '<form action="checkcorrectanswers.php" method="POST">';
							Print '<input type="text" style="visibility: hidden" name="time" id="singleans" value="">';
							$query = mysql_query("Select * FROM $answers where question_id = $q_id");
							$ay = "";
							while($result = mysql_fetch_array($query))
							{ 
								$ay = $result['answer'];
								Print '<p><input type="radio" name="ans" value="'.$ay.'"';
								$ses = "q$q_id"."_ch$ay";
								if(empty($_SESSION["$ses"])){
									$_SESSION["$ses"] = 0;
								}
								$try = $_SESSION["$ses"];
								if($try == 1){
								Print 'checked="checked">'.$ay.'</p>';
								}
								else{
									Print '/>'.$ay.'</p>';
								}
							}
							Print	'<input type="submit" value="Submit Answer"/>';
							Print '</form>';
						}
						?>
						<br/>
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