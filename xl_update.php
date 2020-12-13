<?php 
include_once "connect.php";

if (isset($_POST['update_user'])){
		
		$magv = $_GET["magv"];		
		$name= $_POST['name'];
		$email= $_POST['email'];
		$sdt= $_POST['sdt'];
		$sex = $_POST['sex'];
		$addr = $_POST['addr'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "UPDATE user SET username='$username',password='$password',name='$name',sex='$sex',addr='$addr',phone='$sdt',email='$email' WHERE magv='$magv'";
		$edit = mysqli_query($conn, $sql);
		
		if ($edit=== TRUE) {
		header ('location: admin.php');
		} else {
		echo "Error updating record: " . $conn->error;
		}
	 
		$conn->close();
		}
	
?>