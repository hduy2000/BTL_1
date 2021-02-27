<?php 
	include_once 'connect.php';
	$id = $_GET['id'];
	$query = "SELECT * FROM `qlgt` WHERE magv='$id'";
	$result = mysqli_query($conn, $query);
	if(!empty($_POST['search'])){

        // Lay du lieu tren form search
        $searchValue = $_POST['search'];
        $query = "SELECT * FROM `quan_ly_de_tai` WHERE name LIKE '%$searchValue%'";
        	
    }else{

	$query = "SELECT * FROM `quan_ly_de_tai` WHERE magv = '$id'";
	
    }
    $result = mysqli_query($conn,$query);	

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Quản lý giáo trình</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./scss/fontawesome-free-5.15.1-web/css/all.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="./scss/style-update.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
	<link rel="stylesheet" type="text/css" href="./scss/style-search.css">
	<style type="text/css">
		*{
			margin: 0;
		}
		
	</style>
</head>
<body>
	<div class="container">
		<h2 style="color: #fff">quản lý giáo trình</h2>
		<a class="btn btn-primary" href="./themgiaotrinh_user.php?id=<?php echo $id ?>">Thêm giáo trình</a>	
		<a href="javascript:history.back()" class="btn btn-primary">Trở lại</a>
		<form action="" method="POST" class="form-inline" style="margin-top:20px ">
            
            <input name="search" class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
                aria-label="Search">
        </form>		<div class="container-table">
			<table class="table table-striped">
				<thead class="thead-table">
					<tr>
						<th>Tên</th>
						<th>Chắc năng</th>
					</tr>
				</thead>
				<?php 
					if(mysqli_num_rows($result)>0){
						while ($row = mysqli_fetch_assoc($result)) {
				?>
							<tr>
								
								<td><?php echo "$row[name]" ?></td>
								<td class='flex-tb'> 
									<a id="edit" onclick" title='view' href='view_giaotrinh.php?id=<?php echo "$row[id]"?>'>
										<i class='fas fa-eye'></i>
									</a> |
									<a title='delete' id="delete" onclick="myFunctionDelete('<?php echo "$row[id]" ?>')">
										<i class='fas fa-trash-alt'></i>
									</a>
								</td>
								
							</tr>
				
				<?php

						}
					}
				?>
			</table>
		</div>
	</div>

	<script>
		// JS-jquery xu ly style table

		var containerTable = document.querySelector('.container-table');

		$(function() {
			var containerTableHeight = $(containerTable).css('height');
			if (containerTableHeight > '35rem') {
				containerTable.style.overflow = 'auto';
				containerTable.style.height = '35rem';
			}
		});
	</script>
	<script>
    // Note Edit ------------------------------
    // function myFunctionEdit(a) {
    //     window.location.href = './update.php?magv=' + a;
    // }

    // Note Delete ----------------------------
    function myFunctionDelete(a) {
        var note = confirm('Bạn có chắc chắn muốn xóa học phần này ?');

        if (note) {
            window.location.href = './delete_giaotrinh.php?id=' + a;
        }
    }
    </script>
</body>
</html>