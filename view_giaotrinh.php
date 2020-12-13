<?php 
	include_once "connect.php";
	$id= $_GET['id'];
	$query = "SELECT * FROM `chitietgiaotrinh` where magt = '$id' ";
	$result = mysqli_query($conn, $query);


 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-latest.js"></script>

	<link rel="stylesheet" type="text/css" href="./scss/fontawesome-free-5.15.1-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="./scss/qlgt.css">
	<link rel="stylesheet" type="text/css" href="./scss/style-search.css">
	<title>Quản lý giáo trình</title>
	<meta charset="utf-8">
	<style type="text/css">
		* {
			margin: 0;
		}
		h2 {    
			text-align: center;
			text-transform: uppercase;
			font-weight: 700;
		}	
		.td-flex{
			display: flex;
			justify-content: space-around;
		}
		.btn-custom{
			width:45%;
		}
		.td-name{
			font-size: 14px;
    		vertical-align: baseline;
		}
    </style>
</head>
<body>
	<div class="container">
		<h2>Chi Tiết giáo trình</h2>
		<div class="container-table">
			<table class="table table-striped">
				<thead class="thead-table">
					<tr>
						<th scope="col">Tên chương</th>
					   
						<th scope="col">Hành động</th>
					</tr>
				</thead>
				<tbody>

					<?php 
						if(mysqli_num_rows($result)>0){
						while ($row = mysqli_fetch_assoc($result)) {
					?>
						<tr>
							<td style="vertical-align:baseline"><?php echo "$row[name]" ?></td>
							<td class='flex-tb'> 
								<a style="padding: 8px" title='down' href="<?php echo "$row[link]"?>">
									<i class="fas fa-download"></i>
								</a> 
							</td>
						</tr>
					<?php

						}
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
</body>
</html>