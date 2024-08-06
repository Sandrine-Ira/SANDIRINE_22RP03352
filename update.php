<?php
session_start();
if(!isset($_SESSION['uname'])){
	header("location:index.php");
}
include 'design.php';
$conn=mysqli_connect("localhost","root","","studentmanagementsystem");
$id=$_GET['id'];
//echo "$id";
$sql="SELECT*FROM studentinfo where id='$id'";
$query=mysqli_query($conn,$sql);
while($get=mysqli_fetch_array($query)){
				
				$fname=$get['firstname'];
				$lname=$get['lastname'];
				$email=$get['email'];
				//$timec=$get['time_created'];
				//$timev=$get['time_updated'];
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
			<tr><td colspan="2"><h3>FILL THE FORM TO UPDATE</h3></td></tr>
			<tr><td>firstname</td><td><input type="text" name="fname" value="<?php echo $fname;?>"></td></tr>
			<tr><td>lastname</td><td><input type="text" name="lname" value="<?php echo $lname;?>"></td></tr>
			<tr><td>email</td><td><input type="text" name="email" value="<?php echo $email;?>"></td></tr>
			<tr><td colspan="2" style="text-align: center;"><button name="update">update</button></td></tr>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$update="UPDATE studentinfo set firstname='$fname',lastname='$lname', email='$email' where id='$id'";
	$query=mysqli_query($conn,$update);
	if ($query) {
		header('location:select.php');
	}
}
?>
</form>
	</table>
</center>
</body>
</html>
