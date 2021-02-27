<?php 
	require('connect.php');

	$query = "SELECT * FROM `user`";
	$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="./scss/style-add.css">
    <title>Thêm thành viên</title>
</head>
<body>
	
		<div class="container">
				<h2>Thêm giảng viên</h2>

				<form name="form-add"  action="" method="POST" class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-sm-2" for="magv">Mã giảng viên:</label> 
						<div class="col-sm-10">
							<input class="form-control" type="text" value="" name="magv" id="magv"required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="name">Tên giảng viên:</label> 
						<div class="col-sm-10">
							<input class="form-control"  type="text" value="" name="name"required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="addr">Địa chỉ: </label> 
						<div class="col-sm-10">
							<input class="form-control"  type="text" value="" name="addr"required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="sex">Giới tính: </label>
						<div class="col-sm-10">
							<select name="sex">
								<option value="Nam">Nam</option>
								<option value="Nữ">Nữ</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="phone">Phone: </label> 
						<div class="col-sm-10">
							<input class="form-control"  type="text" value="" name="phone"required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Email: </label> 
						<div class="col-sm-10">
							<input class="form-control"  type="text" value="" name="email"required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="username">username:</label>
						<div class="col-sm-10">						
							<input class="form-control" type="text" value="" name="username"required>
						</div>
					</div>
						<div class="form-group">
						<label class="control-label col-sm-2" for="password">password:</label>
						<div class="col-sm-10">						
							<input class="form-control" type="text" value="" name="password"required>
						</div>
					</div>
					<div class="form-group">        
						<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" name="update_user" class="btn btn-success" value="Lưu" required>
							<a href="javascript:history.back()" class="btn btn-success">Trở lại</a>
						</div>
					</div>
				</form>
			
		</div>
          
	
</body>
</html>
<?php 
	
	include_once 'connect.php';
	session_start();
	if (isset($_SESSION['username'])) {
		# code...
		if (isset($_POST["update_user"])){
		$magv= $_POST['magv'];
		$username = $_POST['username'];
		$query = "SELECT * FROM `user` WHERE magv = '$magv' or username='$username'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		if ($row) {
			echo "
	 	<script type='text/javascript'>
	 		
	 		alert('Mã giảng viên hoặc tên đăng nhập đã tồn tại mời nhập lại');
	 	</script>";

		# code...
		}
		else{
			$magv= $_POST['magv'];
			$name = $_POST['name'];
			$addr = $_POST['addr'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$sex = $_POST['sex'];
			$username = $_POST['username'];
			$password = $_POST['password'];

			$sql = "INSERT INTO user(magv,name,sex,addr,phone,email,username,password) VALUES ('$magv','$name','$sex','$addr','$phone','$email','$username','$password')";
			$query = mysqli_query($conn,$sql);
			if ($query) {
        		header ('location: ./admin.php');
    		} else {
        		echo "Error: " . $sql . "<br>" . $conn->error;
    		}
		}
		}
	}
	else{
		header('location:login.php');
	}
	
	
 ?>
