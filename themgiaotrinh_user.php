<?php 
	include_once'connect.php';
	$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./upload.css">
</head>
<body>
	<div class="container">
		<div class="form">
			<form action="xl_themgiaotrinh_user.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<h1>Upload giáo trình</h1>
					<label for="name">Nhập tên giáo trình:</label>
					<input  class="form-control" type="text" name="name_gt">
				</div>			
				<div class="form-group">
					<label for="fileupload[]">Lựa chọn file upload</label>
					<input  type="file" name="fileupload[]" multiple="multiple">
				</div>
				<div class="form-group"></div>			
				<input class="btn btn-primary" type="submit" name="submit" value="Upload">
			</form>
		</div>
	</div>
	
</body>
</html>