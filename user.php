<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="./scss/style-update.css">
<style>
    
    h2 {
        text-align: center;
        text-transform: uppercase;
        font-weight: 700;
    }
    label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
    }
</style>
</head>
<?php
    session_start();
    if(isset($_SESSION['username'])){
        require'connect.php';
        $id=$_GET['id'];
        $query = mysqli_query($conn,"SELECT  * FROM  user WHERE magv='$id'");
        $row = mysqli_fetch_array($query);
    }
    else{
        header('location:login.php');
    }
// rest code
?>

<body>
    <div class="container">
        <h2>THÔNG TIN NGƯỜI DÙNG</h2>
        <form action="" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Họ và tên:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly value="<?php echo $row['name'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="addr">Địa chỉ:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly value="<?php echo $row['addr'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="phone">Số điện thoại:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly value="<?php echo $row['phone'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly value="<?php echo $row['email'] ?>">
                </div>
            </div>
            <a style="margin: 0 0 0 15px;" href="giaotrinh.php?id=<?php echo $id ?>" type="button" class="btn btn-info">Quản lý giáo trình</a>
            <a  href="detai.php?id=<?php echo $id ?>" type="button" class="btn btn-info">Quản lý đề tài</a>
            <a href="suathongtin.php?id=<?php  echo $id ?>" type="button" class="btn btn-info">Sửa thông tin</a>
            <a href="themdetai.php?id=<?php echo $id ?>" type="button" class="btn btn-info">Thêm đề tài</a>
            <a href="xl_logout.php" type="button" class="btn btn-info">Đăng xuất</a>
        </form>
    </div>
</body>

</html>