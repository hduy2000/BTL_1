<?php
	include_once('connect.php');
	
	$id=$_GET['id'];
	$sql = "DELETE FROM quan_ly_de_tai WHERE id='$id'";
	$result = mysqli_query($conn,$sql);



	if($result){
		header ('location: quan_ly_de_tai.php');
	}else {
	echo "Error updating record: " . $conn->error;
	}
 
	$conn->close();

?>