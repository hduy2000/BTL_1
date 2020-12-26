<?php
	include_once('connect.php');
	
	$id=$_GET['id'];
	$sql = "DELETE FROM quan_ly_de_tai WHERE magv='$id'";
	$result = mysqli_query($conn,$sql);



	if($result){
		header ("location: detai.php?id=$id");
	}else {
	echo "Error updating record: " . $conn->error;
	}
 
	$conn->close();

?>