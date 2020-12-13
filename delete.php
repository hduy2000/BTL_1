<?php
	
	include_once "connect.php";

	$magv = $_GET['magv'];

	$sql = "DELETE FROM user WHERE magv ='$magv'";
	$query = mysqli_query($conn, $sql);

	if($query) {
		header("location: ./admin.php");
	} else {
		echo "Xóa Thất Bại";
	}	
?>