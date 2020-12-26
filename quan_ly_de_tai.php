<?php 
	require 'connect.php';

	$sql_detai = "SELECT * FROM quan_ly_de_tai";

	$query_detai = mysqli_query($conn, $sql_detai);
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
	<title>Quản lý đề tài</title>
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
		<h2>Quản lý đề tài</h2>
		<div class="container-table">
			<table class="table table-striped " >
				<thead class="thead-table">
					<tr>
						<th scope="col">Tên giảng viên</th>
						<th scope="col">Tên đề tài</th>
						<th scope="col">Tóm tắt</th>
						<th scope="col">Hành động</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while ($row = mysqli_fetch_assoc($query_detai)) {
								$sql = "SELECT * FROM user WHERE magv = '$row[magv]'";
								$query_user = mysqli_query($conn, $sql);
								$row_user = mysqli_fetch_assoc($query_user);
						
			
					?>
						<tr>
							<td><?php echo "$row_user[name]" ?></td>
							<td><?php echo"$row[name]" ?></td>
							<td><?php echo"$row[Tom_tat]" ?></td>
							<td class='flex-tb'>
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
        var note = confirm('Bạn có chắc chắn muốn xóa đề tài này ?');

        if (note) {
            window.location.href = './delete_detai.php?id=' + a;
        }
    }
    </script>
</body>
</html>