<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm đề tài</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="./scss/style-add.css">

	
</head>
<body>
	<div class="container">
		<h2>Thêm đề tài</h2>

		<!-- Form thêm đề tài -->
		<form action="" method="post" name="form-add" class="form-horizontal">
			<div class="form-group">
				<label class="control-label col-sm-2" for="magv">Tên đề tài:</label> 
				<div class="col-sm-10">
					<input class="form-control" type="text" value="" name="name" id="name"required>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-2" for="magv">Tóm tắt:</label> 
				<div class="col-sm-10">
					
					<textarea class="form-control" name="tom_tat" id="tom_tat"></textarea>
				</div>
			</div>
			<div class="form-group">        
				<div class="col-sm-offset-2 col-sm-10">
					<input type="submit" name="add_detai" class="btn btn-success" value="Thêm" required>
				</div>
			</div>
		</form>

	</div>
	
</body>
</html>
<?php 

	$id = $_GET['id'];
	echo $id;
	include_once 'connect.php';
	if(isset($_POST["add_detai"])){
		$name = $_POST['name'];
		$tom_tat = $_POST['tom_tat'];
		$sql= "INSERT INTO quan_ly_de_tai(magv, id, name, Tom_tat) VALUES ('$id',NULL,'$name','$tom_tat')";
		$query = mysqli_query($conn,$sql);
		header("location:detai.php?id=$id");
	}

 ?>