<?php 
	include_once'connect.php';
	$id = $_GET['id'];
	


	if (($_SERVER['REQUEST_METHOD'] === 'POST') && (isset($_FILES['fileupload']))) {
		$files = $_FILES['fileupload'];
		$names_chuong      = $files['name'];
        $types      = $files['type'];
        $tmp_names  = $files['tmp_name'];
        $errors     = $files['error'];
        $sizes      = $files['size'];
        $name_gt= $_POST['name_gt'];

        $numitems = count($names_chuong);
        $numfiles = 0;




        //Xu ly qlgt
        $sql_gt = "INSERT INTO qlgt(id,magv,name) VALUES(NULL,'$id','$name_gt')";
        $result_gt = mysqli_query($conn,$sql_gt);
        $row =mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM qlgt WHERE name='$name_gt'"));
        


        //Xu ly chitietgiaotrinh
        for ($i = 0; $i < $numitems; $i ++) {
            //Kiểm tra file thứ $i trong mảng file, up thành công không
            
            
                $numfiles++;
                // echo "Bạn upload file thứ $numfiles:<br>";
                // echo "Tên file: $names_chuong[$i] <br>";
                // echo "Lưu tại: $tmp_names[$i] <br>";
                // echo "Cỡ file: $sizes[$i] <br><hr>";

               

                //Code xử lý di chuyển file đến thư mục cần thiết ở đây (bạn tự thực hiện)
                //Ví dụ move_uploaded_file($tmp_names[$i], /upload/'.$names[$i]);

                move_uploaded_file($tmp_names[$i],'file/'.$names_chuong[$i]);

                $link = "./file/".$names_chuong[$i];
                //Thêm đường dẫn vào database
                $sql = "INSERT INTO chitietgiaotrinh(id,magt,name,link) VALUES(NULL,'$row[id]','$names_chuong[$i]','$link')";
                $query = mysqli_query($conn,$sql);
                //Thêm tên giáo trình vào bảng qlgt
                //lấy ra tên giảng viên và thêm vào database

               
        }
        header("location:giaotrinh.php?id=$id");
	}
		# code...
		


	
 ?>