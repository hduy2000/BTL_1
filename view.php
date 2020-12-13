<?php 
	include_once "connect.php";
	$id= $_GET['id'];
	$query = "SELECT * FROM `chitietgiaotrinh` where ma_mon = '$id' ";
	$result = mysqli_query($conn, $query);


 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./scss/fontawesome-free-5.15.1-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="./scss/qlgt.css">
	<title>Quản lý giáo trình</title>
	<meta charset="utf-8">
	<style type="text/css">


	*{
		margin: 0;
	}
	.img{
		height: 50px;
		width: 50px;
	}
	</style>
</head>
<body>
			<table class="table " border="1" style="border-spacing: 0">
			<tr>
		        <th scope="col">Tên chương</th>
		       
		        <th scope="col">Hành động</th>
		    </tr>
		    <?php 
		    	if(mysqli_num_rows($result)>0){
				while ($row = mysqli_fetch_assoc($result)) {
					echo "
					<tr>
				        <td>$row[ten_chuong]</td>
				        <td class='flex-tb'> <a title='down' href='$row[Link]'><i class='fas fa-download'></i></i></a> </td>
			   		</tr>
				";
				}
			}
		    ?>
		</table>
	
</body>
</html>