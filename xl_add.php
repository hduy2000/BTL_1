<?php 
	
	require 'connect.php';

	$magv= $_POST['magv'];
	$username = $_POST['username'];

	$query = "SELECT * FROM `user` WHERE magv = '$magv'";

	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	if ($row) {
		echo "
 	<script type='text/javascript'>
 		alert('Mã giảng viên hoặc tên đăng nhập đã tồn tại mời nhập lại');
 		document.form-add.magv.focus();
 	</script>";
	}
	else{
		if (!isset($_POST['update_user'])) {
			# code...
			$magv= $_POST['magv'];
			$name = $_POST['name'];
			$addr = $_POST['addr'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$sex = $_POST['sex'];
			$username = $_POST['username'];
			$password = $_POST['password'];

			$sql = "INSERT INTO user(magv,name,sex,addr,phone,email,username,password) VALUES ('$magv','$name','$sex','$addr','$phone','$email','$username','$password')";
			if ($conn->query($sql) === TRUE) {
        		header ('location: admin.php');
    		} else {
        		echo "Error: " . $sql . "<br>" . $conn->error;
    		}
		}
	}

	
	



	

//Đóng database
$conn->close();
 ?>
