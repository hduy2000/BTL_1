<?php 
	require 'connect.php';

	$sql_qlgt = "SELECT * FROM qlgt";

	$query_qlgt = mysqli_query($conn, $sql_qlgt);
?>

<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="./scss/fontawesome-free-5.15.1-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="./scss/qlgt.css">
	<link rel="stylesheet" type="text/css" href="./scss/style-search.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
	<title>Quản lý giáo trình</title>
	<meta charset="utf-8">
	<style type="text/css">


	*{
		margin: 0;
	}
	h2 {
    text-align: center;
    text-transform: uppercase;
	font-weight: 700;
	color: #dbdbb5;

	}
	</style>
</head>
<body>
	<div class="container">
		<h2>Quản lý giáo trình</h2>
		<a href="javascript:history.back()" class="btn btn-success">Trở lại</a>
		<div class="container-table">
			<table class="table table-striped " >
				<thead class="thead-table">
					<tr>
						<th scope="col">Tên giảng viên</th>
						<th scope="col">Tên học phần</th>
						<th scope="col">Hành động</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while ($row = mysqli_fetch_assoc($query_qlgt)) {
								$sql = "SELECT * FROM user WHERE magv = '$row[magv]'";
								$query_user = mysqli_query($conn, $sql);
								$row_user = mysqli_fetch_assoc($query_user);
						
			
					?>
						<tr>
							<td><?php echo "$row_user[name]" ?></td>
							<td><?php echo"$row[name]" ?></td>
							<td class='flex-tb'> 
								<a title='view' href='view_giaotrinh.php?id=<?php echo  "$row[id]"?>'>
									<i class='fas fa-eye'></i>
								</a> | 
								<a title='delete' id="delete" onclick="myFunctionDelete('<?php echo "$row[id]" ?>')">
									<i class='fas fa-trash-alt'></i>
								</a>
							</td>
						</tr>
						<?php
						}
						?>
				</tbody>
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