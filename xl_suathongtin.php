<?php 
	include_once "connect.php";
	
	if ($_POST['submit-edittt']) {
		$magv = $_GET['id'];
		$name = $_POST['name'];
		$addr = $_POST['addr'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];

		$sql = "UPDATE user SET name = '$name',  addr = '$addr', phone = '$phone', email = '$email' WHERE magv='$magv'";
		$query = mysqli_query($conn, $sql);
		if($query) {
			header("location:user.php?id=$magv");
		}
	}
		
	
?>