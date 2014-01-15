<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>Saint Benedict School of Novaliches</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div class="header">
		<div>
			<a href="index.html" id="logo"><img src="images/benedict_header.jpg" alt="logo" height="100px" width="900px"></a>
			<!--<p id="schoolname" >
			Maria Montessori School of Quezon City
			</p>--><br/>
		
		</div>
	</div>
	<div class="body">
		<div class="register">
			<div>
				<div>
					<div class="register">
						<h2>Complete your registration</h2>
						<form action="facultyregister.php" method="POST"/>
							<div>
								<table>
								<?php
									//include('config.php);
								$sql = mysql_connect("127.0.0.1","root","") or die ("Couldn't connect to database");
								mysql_select_db("sbsn_faculty") or die ("cannot find database");
		
								if($_SERVER['REQUEST_METHOD'] == 'POST') { //if the register was clicked
									$username = mysql_real_escape_string($_POST['username']);
									$password = mysql_real_escape_string($_POST['password']);
									$cpassword = mysql_real_escape_string($_POST['cpassword']);
									$fname = mysql_real_escape_string($_POST['fname']);
									$lname = mysql_real_escape_string($_POST['lname']);
									$mname = mysql_real_escape_string($_POST['mname']);
									$email = mysql_real_escape_string($_POST['email']);
									$pnumber = mysql_real_escape_string($_POST['pnumber']);
									$cnumber = mysql_real_escape_string($_POST['cnumber']);
									$address = mysql_real_escape_string($_POST['address']);
									$zip = mysql_real_escape_string($_POST['zip']);
									$section = mysql_real_escape_string($_POST['section']);
									$subject = mysql_real_escape_string($_POST['subject']);
									$subjectdesc = mysql_real_escape_string($_POST['subjectdesc']);
									$complete = "$fname "."$mname "."$lname";
									//secured sql injection and encrypted password
									//no empty field check below
								if(empty($username)) {
									echo "Fill in a username!"; 
								} else {
									if(empty($password) ) {
										echo("You have to fill in a password!");
									}
									else if(empty($cpassword)){
										echo("Fill in a confirmation password!");
									}
									else if($password != $cpassword){
										echo("Your passwords do no match!");
									}
									else {
										//Check if username exists
										$query = mysql_query("SELECT * FROM faculty WHERE username = '$username'");
										$rows = mysql_num_rows($query);
										//mysql_query calls sql commands, sql_num_rows returns field with the values which you have given which was username
										if($rows > 0){
											die("Username Taken!<a href='facultyregister.php'>Click here to go back</a>");
										} else {
										
										mysql_select_db("sbsn_admin") or die ("cannot find admin database");
										$q = mysql_query("INSERT INTO `subject_list` VALUES ('$subject', '$subjectdesc', '$complete')");
											if(!empty($q)){
											mysql_select_db("sbsn_faculty") or die ("cannot find faculty database");
											$user = (string)$username;
											$user2 = "$user"."_sbsn";
											mysql_query("CREATE TABLE $user2 (`section` VARCHAR(30) NOT NULL, `address` VARCHAR(75) NOT NULL, `zip_code` INT(5) NOT NULL, `phone_number` INT(15) NOT NULL,`cell_number` INT(25) NOT NULL,`fname` VARCHAR(70) NOT NULL, `mname` VARCHAR(30) NOT NULL, `lname` VARCHAR(50) NOT NULL, `email` VARCHAR(35) NOT NULL, `subject` VARCHAR(35) NOT NULL, `subject_desc` VARCHAR(35) NOT NULL)")or die(mysql_error());
											$user_input = mysql_query("INSERT INTO faculty (username , password , fname , mname , lname , subject , subjectdesc) VALUES ('$username', '$password', '$fname', '$mname', '$lname', '$subject', '$subjectdesc')");
											$user_input = mysql_query("INSERT INTO $user2 (section, address, zip_code, phone_number, cell_number, fname, mname, lname, email, subject, subject_desc) VALUES ('$section', '$address', '$zip', '$pnumber', '$cnumber', '$fname', '$mname', '$lname', '$email', '$subject', '$subjectdesc')");
											$user_input = mysql_query("CREATE DATABASE $subject");
											mysql_select_db("$subject") or die ("cannot find subject database");
											$user_input = mysql_query("CREATE TABLE dbname ( `dbname` VARCHAR(40) NOT NULL)");
											$user_input = mysql_query("INSERT INTO dbname (dbname) VALUES ('$subject')");
											$user_input = mysql_query("CREATE TABLE student_list ( `fname` VARCHAR(50) NOT NULL,`mname` VARCHAR(50) NOT NULL,`lname` VARCHAR(50) NOT NULL,`username` VARCHAR(15) NOT NULL)");
											//$user_input = mysql_query("CREATE TABLE student_grades ( `desc` TEXT NOT NULL,`score` INT NOT NULL,`overall` INT NOT NULL,`date` DATE NOT NULL)");
											$user_input = mysql_query("CREATE TABLE quiz_show ( `quiz` VARCHAR(80) NOT NULL)");
											$user_input = mysql_query("CREATE TABLE quiz_all ( `quiz` VARCHAR(80) NOT NULL)");
											$user_input = mysql_query("CREATE TABLE announcement ( `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT, `main` TEXT NOT NULL, `post_date` DATE NOT NULL)");
											$user_input = mysql_query("CREATE TABLE shared_files ( `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT, `name` VARCHAR(50) NOT NULL, `size` INT NOT NULL, `type` VARCHAR(50) NOT NULL, `message` TEXT NOT NULL, `post_date` DATE NOT NULL, `content` blob)");
											echo("Succesfully registered!");
											}
											else{
												echo "no data from insert";
											}
										}
									}
								}
							}
?>
									<tr>
										<td><a href="adsubjects.php"><label for="name"><span>B</span>ack to Subjects</label></td>
									</tr>
									<tr>
										<td><label for="name"><span>U</span>sername:</label></td>
										<td><input type="text" name="username"/></td>
									</tr>
									<tr>
										<td><label for="name"><span>P</span>assword:</label></td>
										<td><input type="password" name="password"/></td>
									</tr>
									<tr>
										<td><label for="name"><span>C</span>onfirm Password:</label></td>
										<td><input type="password" name="cpassword"></td>
									</tr>
									<tr>
										<td><label for="name"><span>F</span>irst Name:</label></td>
										<td><input type="text" name="fname"/></td>
									</tr>
									<tr>
										<td><label for="name"><span>M</span>iddle Name:</label></td>
										<td><input type="text" name="mname"/></td>
									</tr>
									<tr>
										<td><label for="name"><span>L</span>ast Name:</label></td>
										<td><input type="text" name="lname"/></td>
									</tr>
									<tr>
										<td><label for="name"><span>Z</span>ip code:</label></td>
										<td><input type="text" name="zip"/></td>
									</tr>
									<tr>
										<td><label for="name"><span>A</span>dvisory Section:</label></td>
										<td><input type="text" name="section"/></td>
									</tr>
									<tr>
										<td><label for="name"><span>S</span>ubject Code(small letters and no space):</label></td>
										<td><input type="text" name="subject"/></td>
									</tr>
									<tr>
										<td><label for="name"><span>S</span>ubject's Complete name:</label></td>
										<td><input type="text" name="subjectdesc"/></td>
									</tr>
									<tr>
										<td><label for="email"><span>E</span>mail <span>A</span>ddress:</label></td>
										<td><input type="text" name="email"/></td>
									</tr>
									<tr>
										<td><label for="tel-number"><span>P</span>hone <span>N</span>umber:</label></td>
										<td><input type="text" name="pnumber"/></td>
									</tr>
									<tr>
										<td><label for="tel-number"><span>C</span>ellphone <span>N</span>umber:</label></td>
										<td><input type="text" name="cnumber"/></td>
									</tr>
									<tr>
										<td><label for="address"><span>A</span>ddress:</label></td>
										<td><textarea name="address" cols="30" rows="10"></textarea></td>
									</tr>
								</table>
								<input type="submit" value="Register"/>
							</div>
						</form>
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
					Nulla porttitor vulputate elit, trist ique malesuada sem.
				</p>
				<form action="index.html">
					<input type="text" value="Email Address" onblur="this.value=!this.value?'Email Address':this.value;" onfocus="this.select()" onclick="this.value='';">
					<input type="submit" value="Get">
				</form>
			</div>
			<div>
				<h4>LATEST BLOG</h4>
				<ul>
					<li>
						<p>
							<a href="blog.html">Phasellus parea ut di tincidunt blandit nisi ut pellentesque.</a>
						</p>
						<span>11/07/2011</span>
					</li>
					<li>
						<p>
							<a href="blog.html">Donec dictum semper augue, ut consectetur magna posuere eget.</a>
						</p>
						<span>11/03/2011</span>
					</li>
					<li>
						<p>
							<a href="blog.html">Cum sociis natoque penatibus et magnis dis parturient.</a>
						</p>
						<span>11/27/2011</span>
					</li>
				</ul>
			</div>
			<div class="connect">
				<h4>FOLLOW US:</h4>
				<a href="http://freewebsitetemplates.com/go/facebook/" class="facebook">Facebook</a> <a href="http://freewebsitetemplates.com/go/twitter/" class="twitter">Twitter</a> <a href="http://freewebsitetemplates.com/go/googleplus/" class="google">Google+</a>
			</div>
		</div>
		<div>
			<p>
				Summer Camp &#169; 2011 | All Rights Reserved
			</p>
		</div>
	</div>
</body>
</html>