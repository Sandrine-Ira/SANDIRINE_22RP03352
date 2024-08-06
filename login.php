<?php
session_start();
include 'design.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
	$uname=$_POST['uname'];
	$pass=$_POST['pass'];
	if(empty($uname)||empty($pass)){
		echo'<script>alert("please fill all field")</script>';
	}
	else{
	$conn=mysqli_connect("localhost","root","","studentmanagementsystem");
	$sql="SELECT * FROM users where username='$uname' and password='$pass'";
	$query=mysqli_query($conn,$sql);
	if($query){
		$get=mysqli_fetch_array($query);
$uuname=$get['username'];
$upass=$get['password'];
if($uname==$uuname && $pass==$upass){
	$_SESSION['uname']=$uname;
	header('location:select.php');
}
else{
	header('location:signup.php');
}
	}

}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		

	</style>
</head>
<body>
	<center>
<table cellpadding="10">
	<form method="POST">
		<tr><td colspan="2"><h3>FILL THE FORM TO LOGIN</h3></td></tr>
		<tr><td>username</td><td><input type="text" name="uname" style="height: 30PX;"></td></tr>
			<tr><td>password</td><td><input type="password" name="pass"style="height: 30PX;"></td></tr>
			
			<tr><td colspan="2" style="text-align: center;"><input type="submit" name="submit" value="LOGIN" style="width:100%;background: green;height: 40px;"></td></tr>
				<tr><td colspan="2" style="text-align: center; "><button style=" background: green;height:40px;width: 100%;"><a href="signup.php" style="text-decoration: none; color: black;background: ;">SIGNUP</a></button></td></tr>
	</form>
</table>
</center>
</body>
</html>