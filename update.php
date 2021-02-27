<?php 
require 'connect.php';

$magv = $_GET['magv'];
$query ="SELECT * FROM `user` WHERE magv ='$magv'";
$result = mysqli_query($conn, $query);
$row=mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sửa thành viên</title>
    <link rel="stylesheet" href="style.css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./scss/style-update.css">
</head>

<body>
    
    <div class="container">
        <h2>Sửa thành viên</h2>
        <a href="javascript:history.back()" class="btn btn-primary">Trở lại</a>
        <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="xl_update.php?magv=<?php echo "$row[magv]" ?>">
            <br>
            <label for="id">Mã giảng viên:</label>
            <input type="text" readonly name="id" value="<?php echo $row['magv']; ?>">


            <label for="name">Tên cán bộ:</label>
            <input type="text" value="<?php echo $row['name']; ?>"name='name'><br />

            <label>Email: </label>
            <input type="text" value="<?php echo $row['email']; ?>" name="email"><br />

            <label>Địa chỉ: </label>
            <input type="text" value="<?php echo $row['addr']; ?>" name="addr"><br />

            <label for="sex">Giới tính: </label>
            <select name="sex">
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select><br />

            <label>Phone: </label>
            <input type="text" value="<?php echo $row['phone']; ?>" name="sdt"><br />

            <label>Username: </label>
            <input type="text" value="<?php echo $row['username']; ?>" name="username"><br />

            <label>Password: </label>
            <input type="text" value="<?php echo $row['password']; ?>" name="password"><br />

			<input type="submit" name="update_user" class="btn btn-success" value="Lưu" >

			
        </form>
    </div>
</body>

</html>