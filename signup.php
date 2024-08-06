<?php
include 'design.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
	$uname=$_POST['uname'];
	$pass=$_POST['pass'];
$cpass=$_POST['cpass'];
if(empty($uname) || empty($pass)|| empty($cpass)){
	echo'<script>alert("please fill all field")</script>';
}
else{
	if(!preg_match("/^[a-zA-Z0-9]*$/", $uname)){
	echo'<script>alert("username can contain only alphanumeric characters")</script>';	
	}
	elseif(strlen($pass)<8 || strlen($pass)>8 ){
		echo'<script>alert("password must be 8 characters")</script>';
	}
	else{
$conn=mysqli_connect("localhost","root","","studentmanagementsystem");
if($pass==$cpass){
	$sql="INSERT INTO users values(' ','$uname','$pass')";
	$query=mysqli_query($conn,$sql);
	if($query){
		echo'<script>alert("data inserted")</script>';
		header('location:login.php');
	}
}
else{
	echo'<script>alert("password not much")</script>';
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
</head>
<body>
	<center>
<table>
	<form method="POST">
		<tr><td colspan="2"><h3>FILL THE FORM TO SIGNUP</h3></td></tr>
		<tr><td>username</td><td><input type="text" name="uname"></td></tr>
			<tr><td>password</td><td><input type="password" name="pass"></td></tr>
			<tr><td> confirm password</td><td><input type="password" name="cpass"></td></tr>
			<tr><td colspan="2" style="text-align: center;"><input type="submit" name="submit" value="SIGNUP" style="width:100%;background: green;height: 40px;"></td></tr>
				<tr><td colspan="2" style="text-align: center; "><button style=" background: green;height:40px;width: 100%;"><a href="login.php" style="text-decoration: none; color: black;background: ;">LOGIN</a></button></td></tr>
	</form>
</table>
</center>
</body>
</html>