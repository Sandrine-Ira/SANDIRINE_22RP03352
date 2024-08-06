<?php
session_start();
if(isset($_SESSION['uname'])){
	header("location:login.php");
}
$conn=mysqli_connect("localhost","root","","studentmanagementsystem");
$id=$_GET['id'];
$sql="DELETE FROM studentinfo where id=$id";
$query=mysqli_query($conn,$sql);
if($query){
	header('location:select.php');
}
?>