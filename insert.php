<?php
session_start();
if(!isset($_SESSION['uname'])){
	header("location:index.php");
	exit();
}
include 'design.php';
$conn=mysqli_connect("localhost","root","","studentmanagementsystem");
	if($_SERVER['REQUEST_METHOD']=="POST"){
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$sql="insert into studentinfo(firstname,lastname,email) values('$fname','$lname','$email')";
	$query=mysqli_query($conn,$sql);
if ($query) {
	header('location:select.php');
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
	<table >
		<form method="post">
			<tr><td colspan="2"><h3>ADD NEW STUDENT INFORMATION </h3></td></tr>
			<tr><td>firstname</td><td><input type="text" name="fname"></td></tr>
			<tr><td>lastname</td><td><input type="text" name="lname"></td></tr>
			<tr><td>email</td><td><input type="text" name="email" ></td></tr>
			<tr><td colspan="2" style="text-align: center;"><button name="insert">insert</button></td></tr>
</form>
</table>
</center>
</body>
</html>