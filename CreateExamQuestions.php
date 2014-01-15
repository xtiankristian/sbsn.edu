<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Saint Benedict School of Novaliches</title>
	<link rel="stylesheet" href="css/style5.css" type="text/css">
	<script src="appear.js"></script>
	<script src="jquery-1.10.2.js"></script>
 <script type="text/javascript">
		var a = document.GetElementById("preview");
		function cancel(){
			document.location.href="adminportalstudent.php";
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
$_SESSION['time'] = null;
$_SESSION['questionid'] = 1;
$_SESSION['totalpoints'] = 0;
$_SESSION['essaypoints'] = 0;
$efg = "";
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
						<?php $qtitle = $_SESSION['quiztitle'];?>
						<form action="postadminquiz.php" method="POST">
							<input type="Submit" value="Submit"/>
						</form>
							<form action="previewexam.php" method="POST">
								<input type="submit" value="Preview Exam"/>
							</form>
							<form action="cancelquiz.php" method="POST">
								<input type="Submit" value="Cancel/Delete Quiz"/>
							</form>
							<form action="onlineexamlist.php" method="POST">
								<input type="Submit" value="Back to Exam List"/>
							</form>
						<HR/>
						<?php
						Print "<p>$qtitle</p>";
						$question = $_SESSION['quizctr'];
						Print "<p>Question $question</p>";
						$qtitle = $_SESSION['quiztitle'];
						$subject = $_SESSION['subject'];
						mysql_connect("localhost", "root", "") or die(mysql_error()); 
						mysql_select_db("$subject") or die(mysql_error());
						$questions = "$qtitle"."_questions";
						
						$query1 = mysql_query("Select * FROM $questions");
						$hehe = 1;						
						while($result1 = mysql_fetch_assoc($query1))
						{
							Print '| <a href="examquestionid.php?number='.$hehe.'">'.$hehe.'</a> |';
							$hehe++;
						}						
						?>
						<p>Answer type: </p>
						<form name="f1">
							<select name="question_type" class="question_type" id="question_type" onChange="input()">
								<option>Multiple Choice - 1 answer only</option>
								<option>Multiple Choice - Multiple Answers</option>
								<option>Paragraph/Essay</option>
								<option>Single Word/Phrase</option>
							</select>
						</form>
						<form action="MultipleChoice.php" method="POST">
							<div id="appear1"><p>Question:</p> <textarea cols="40" rows="5" name="message">
							<?php
							$ques = "$qtitle"."_questions";
							$query = mysql_query("Select * FROM $ques where question_id = '$question'");
							$mchoi = false;
							if(!empty($query)){
								while($result = mysql_fetch_array($query))
								{
									$abc = $result['question'];
									$efg = $result['type'];
								}
								if($efg == "multi_choice"){
									Print "$abc";
									$mchoi = true;
								}
							}
														
							Print '</textarea>';

							$ann = "$qtitle"."_answers";
							$query = mysql_query("Select * FROM $ann where question_id = '$question'");
							$query1 = mysql_query("Select * FROM $ann where question_id = '$question'");
							$inc2 = 1;
							$ansforthis = 0;
							Print "<p>Correct Answer:";
							Print '<select id="opts" name="opts">';
							if($mchoi == true){
								if(!empty($query)){
									while($result = mysql_fetch_array($query))
									{
										$rsolt = $result['correct'];
										Print '<option>'.$inc2.'</option>';
										if($rsolt == $inc2){
											$ansforthis = $inc2;
										}
										$inc2++;
									}
								}
							}
							Print '</select>';
							Print "<p>The correct answer is $ansforthis</p>";
							$inc2 = 1;
							if($mchoi == true){
								if(!empty($query1)){
									while($result = mysql_fetch_array($query1))
									{
										$abc = $result['answer'];
										$efg = $result['correct'];
										//
										Print '<p>Answer'.$inc2.'<input type="text" value="'.$abc.'" name="ans'.$inc2.'"/>';
										$inc2++;
									}
									if($efg == 1){
										Print "$abc";
									}
								}
							}
							else
							{
							Print '
								<p id="choi"></p> 
							</br><input type="button" id="lol" onclick="add()" value="Add 1 Choice"/>
							<br/><br/></br>';
							}
							?>
							<br/><input type="Submit" value="Submit Question"/>
							</div>
						</form>
						<form action="MultipleAnswersChoice.php" method="POST">
							<div id="appear4"><p>Question:</p> <textarea cols="40" rows="5" name="message">
							<?php
							$ques = "$qtitle"."_questions";
							$mchoi = false;
							$query = mysql_query("Select * FROM $ques where question_id = '$question'");
							if(!empty($query)){
								while($result = mysql_fetch_array($query))
								{
									$abc = $result['question'];
									$efg = $result['type'];
								}
								if($efg == "multi_answers"){
									Print "$abc";
									$mchoi = true;
								}
							}
							
							Print "</textarea>";
							$ann = "$qtitle"."_answers";
							$query = mysql_query("Select * FROM $ann where question_id = '$question'");
							$inc1 = 1;
							if($mchoi == true){
								if(!empty($query)){
									while($result = mysql_fetch_array($query))
									{
										$abc = $result['answer'];
										$efg = $result['correct'];
										Print '<p>Answer'.$inc1.'<input type="text" value="'.$inc1.'"/> Correct Answer? <input type="checkbox" name="check[]" value="'.$inc1.'"';
										if($efg == 1){
											Print	'checked="checked"/>';
										}
										else{
											Print'/>';
										}
										$inc1++;
									}
								}
							}
							else
							{
							Print '
							
								<p id="choi1"></p>
								<p id="choi2"></p>
							</br><input type="button" id="lol1" onclick="multipleadd()" value="Add a Choice"/>
							<br/><br/>
							';}?></br>
							<input type="Submit" value="Submit Question"/>
							</div>
						</form>
						<form action="Paragraph.php" method="POST">
							<div id="appear2">
								<p>Question:</p> <textarea cols="40" rows="5" name="message">
							<?php
							$ques = "$qtitle"."_questions";
							$query = mysql_query("Select * FROM $ques where question_id = '$question'");
							$mchoi = false;
							if(!empty($query)){
								while($result = mysql_fetch_array($query))
								{
									$abc = $result['question'];
									$efg = $result['type'];
								}
								if($efg == "paragraph"){
									Print "$abc";
									$mchoi = true;
								}
							}
								
							Print "</textarea>";
							?>
								<input type="submit" value="Submit Question"/>
							</div>
						</form>
						<form action="Phrase.php" method="POST">
							<div id="appear3">
								<p>Question: </p><textarea cols="40" rows="5" name="message">
							<?php
							$ques = "$qtitle"."_questions";
							$query = mysql_query("Select * FROM $ques where question_id = '$question'");
							$mchoi = false;
							if(!empty($query)){
								while($result = mysql_fetch_array($query))
								{
									$abc = $result['question'];
									$efg = $result['type'];
								}
								if($efg == "phrase"){
									Print "$abc";
								}
							}
								
							Print "</textarea>";
							
							$ann = "$qtitle"."_answers";
							$query = mysql_query("Select * FROM $ann where question_id = '$question'");
							$inc2 = 1;
							if($mchoi == true){
								if(!empty($query)){
									while($result = mysql_fetch_array($query))
									{
										$abc = $result['answer'];
										$efg = $result['correct'];
										Print '<p>Answer'.$inc1.'</p><input type="text" value="'.$abc.'"/>';
										$inc2++;
									}
									if($efg == 1){
										Print "$abc";
									}
								}
							}
							?>
								<p>Answer:<p/><input type="text" name="answer"/> <br/>
								<input type="submit" value="Submit Question"/>
							</div>
						</form>
							<br/><br/>
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