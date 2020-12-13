<?php
	include_once('connect.php');
	
	$id=$_GET['id'];
	$magv = $_GET['magv'];
	$sql = "DELETE FROM chitietgiaotrinh WHERE magt='$id'";
	$result = mysqli_query($conn,$sql);

	$sql_qlgt = "DELETE FROM qlgt WHERE id='$id'";
	$result_qlgt = mysqli_query($conn,$sql_qlgt);

	if($result){
		header ("location: giaotrinh.php?id=$magv");
	}else {
	echo "Error updating record: " . $conn->error;
	}
 
	$conn->close();

?>