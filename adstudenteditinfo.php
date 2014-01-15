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
if($_SESSION['admin']) {
}
else{ header("location:index.php"); }
$student = $_GET['number'];
?>
	<div class="header">
		<div>
			<a href="index.php" id="logo"><img src="images/benedict_header.jpg" alt="logo" height="100px" width="900px"></a>
			<!--<p id="schoolname" >
			Maria Montessori School of Quezon City
			</p>--><br/>
			<ul>
				<li class="selected">
					<a href="adportalindex.php"><span>S</span>tudents</a>	
				</li>
				<li>
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
		<div class="register">
			<div>
				<div>
					<div class="register">
						<h2>Edit Information</h2>
						<form action="editinfo.php" method="POST"/>
							<div>
								<table>
								<?php
									//include('config.php);
								$sql = mysql_connect("127.0.0.1","root","") or die ("Couldn't connect to database");
								mysql_select_db("sbsn_student") or die ("cannot find database");
		
								if($_SERVER['REQUEST_METHOD'] == 'POST') { //if the register was clicked
									$password = mysql_real_escape_string($_POST['password']);
									$npassword = mysql_real_escape_string($_POST['npassword']);
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
									//secured sql injection and encrypted password
									//no empty field check below
									$user2 = "$student"."_sbsn";
									if(empty($password)){
									$user_input = mysql_query("UPDATE $user2 SET section='$section', address='$address', zip_code='$zip', phone_number='$pnumber', cell_number='$cnumber', fname='$fname', mname='$mname', lname='$lname', email='$email' WHERE username='$student'");
									echo("<p>Succesfully Edited!</p>");
									}
									else{
									$query = mysql_query("Select password from students WHERE username='$student'");
									while($row = mysql_fetch_assoc($query)){
										$pass = $row['password'];
									}
										if($pass != $password){
											echo("Your old password doesn't match your input");
										}
										else if(empty($npassword)){
											echo("You have to fill in your new password!");
										}
										else if(empty($cpassword)){
											echo("Fill in your confirmation password!");
										}
										else if($npassword != $cpassword){
											echo("Your passwords do no match!");
										}
										else {
											mysql_query("UPDATE students SET password='$npassword' WHERE username='$student'");
											echo("<p>Succesfully Edited!</p>");
									}
									}							
								}
?>
									<?php
									mysql_connect("localhost", "root", "") or die(mysql_error()); 
									mysql_select_db("sbsn_student") or die(mysql_error());
									$usertable = "$student" . "_sbsn";
									$query = mysql_query("Select * from $usertable");
									while($row = mysql_fetch_assoc($query)){
										$section = $row['section'];
										$address = $row['address'];
										$zip = $row['zip_code'];
										$pnum = $row['phone_number'];
										$cnum = $row['cell_number'];
										$fname = $row['fname'];
										$mname = $row['mname'];
										$lname = $row['lname'];
										$email = $row['email'];
									}
									?>
									<tr>
										<td><a href="adportalindex.php"><label for="name"><span>C</span>ancel Edit</label></td>
									</tr>		
									<tr>
										<td><label for="name"><span>U</span>sername:</label></td>
										<td><label for="name"><span><?php Print"$student"?></label></td>
									</tr>
									<tr>
										<td><strong>Change Password</strong></td>
									</tr>
									<tr>
										<td><label for="name"><span>O</span>ld Password:</label></td>
										<td><input type="password" name="password" value="<?php Print""?>"/></td>
									</tr>
									<tr>
										<td><label for="name"><span>N</span>ew Password:</label></td>
										<td><input type="password" name="npassword"/></td>
									</tr>
									<tr>
										<td><label for="name"><span>C</span>onfirm New Password:</label></td>
										<td><input type="password" name="cpassword" value=""></td>
									</tr>
									<tr>
										<td><label for="name"><span>F</span>irst Name:</label></td>
										<td><input type="text" name="fname" value="<?php Print "$fname"?>"/></td>
									</tr>
									<tr>
										<td><label for="name"><span>M</span>iddle Name:</label></td>
										<td><input type="text" name="mname" value="<?php Print "$mname"?>"/></td>
									</tr>
									<tr>
										<td><label for="name"><span>L</span>ast Name:</label></td>
										<td><input type="text" name="lname" value="<?php Print "$lname"?>"/></td>
									</tr>
									<tr>
										<td><label for="name"><span>Z</span>ip code:</label></td>
										<td><input type="text" name="zip" value="<?php Print "$zip"?>"/></td>
									</tr>
									<tr>
										<td><label for="name"><span>S</span>ection:</label></td>
										<td><input type="text" name="section" value="<?php Print "$section"?>"/></td>
									</tr>
									<tr>
										<td><label for="email"><span>E</span>mail <span>A</span>ddress:</label></td>
										<td><input type="text" name="email" value="<?php Print "$email"?>"/></td>
									</tr>
									<tr>
										<td><label for="tel-number"><span>P</span>hone <span>N</span>umber:</label></td>
										<td><input type="text" name="pnumber" value="<?php Print "$pnum"?>"/></td>
									</tr>
									<tr>
										<td><label for="tel-number"><span>C</span>ellphone <span>N</span>umber:</label></td>
										<td><input type="text" name="cnumber" value="<?php Print "$cnum"?>"/></td>
									</tr>
									<tr>
										<td><label for="address"><span>A</span>ddress:</label></td>
										<td><textarea name="address" cols="40" rows="5" value="<?php Print "$address"?>"></textarea></td>
									</tr>
								</table>
								<input type="submit" value="Update Information"/>
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