<html>
<head>
<title> Log-in </title>
<style>
div.ex
{
width:1000px;
padding:10px;
border:5px solid gray;
margin:0px;
margin-left: auto ;
margin-right: auto ;
}

body{
background: red;
}
</style>
 <script type="text/javascript">
		function register(){
			document.location.href="register.php";
		}
		
		function back(){
			document.location.href="index.php";
		}
		function href(){
			document.location.href="portalindex.php";
		}
		
		function faculty(){
			document.location.href="facultylogin.php";
		}
		
		function forgot(){
			document.location.href="forgot.php";
		}
	</script>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<div class="center" style="text-align:center">
<font face="Tahoma" size="30">SBSN Student Portal</font>
	<div class="ex" style="text-align:left">
	<img src="images/benedict_header.jpg"/>
		<form action="checklogin.php" method="POST" style="text-align:center">
					<p align="center" id="uname">Username: <input type="text" name="username"></p>
					<p align="center" id="pass">Password: <input type="password" name="password"></p>
					<input type="submit" name="submit" value="Login">
		 </form>
		<div style="text-align:center">
		<button type="button" onclick="back()">Back to Main site</button>
		<button type="button" onclick="faculty()">Log-in as Faculty</button>
		</div>
	</div>
</div>
</body>
</html>