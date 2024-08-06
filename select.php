<?php
include 'design.php';
session_start();
if(!isset($_SESSION['uname'])){
	header("location:index.php");
}
echo'<script>alert("welcome'.$_SESSION['uname'].')</script>';
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
	<table border="1" cellspacing="0">
		<h3>STUDENT INFORMATION </h3>
			<tr>
				<th>student_id</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>email</th>
				<th>time_created</th>
				<th>time_updated</th>
				<th>Action</th>
			</tr>
			<?php
			$conn=mysqli_connect("localhost","root","","studentmanagementsystem");
			$select="SELECT*FROM studentinfo";
			$query=mysqli_query($conn,$select);
			if(mysqli_num_rows($query)>0){
				while($get=mysqli_fetch_array($query)){
				echo"<tr><td>".$get['id']."</td>";
				
				echo"<td>".$get['firstname']."</td>";
				echo "<td>".$get['lastname']."</td>";
				echo "<td>".$get['email']."</td>";
				echo"<td>".$get['time_created']."</td>";
				echo "<td>".$get['time_updated']."</td>";

				echo"<form method='POST'><td><button><a href='update.php?id=".$get['id']."'>Update</a></button><button><a href='delete.php?id=".$get['id']."'>delete</a></button></td></form></tr>";

}

			}

			?>
	</table>
click <a href='insert.php'>here</a>if you want to add new student information"
</center>
</body>
</html>