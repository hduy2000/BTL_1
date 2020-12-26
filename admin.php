<?php 
    
    session_start();
    if(isset($_SESSION['username'])){
    include_once "connect.php";
    if(!empty($_POST['search'])){

        // Lay du lieu tren form search
        $searchValue = $_POST['search'];
        $sql = "SELECT * FROM user WHERE name LIKE '%$searchValue%'";
    } else {

        // Lay du lieu user ra khi chua nhap input
    $sql = "SELECT * FROM user";
    }

    $result = mysqli_query($conn, $sql);
    }
    else{
        header('location:login.php');
    }

    

?>

<!DOCTYPE html>
<html>

<head>
    <title>Quản lý cán bộ</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./scss/style-search.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-latest.js"></script>

    <style type="text/css">
    * {
        margin: 0;
    }
    h2 {
    color: #dbdbb5;
    }

    
    .td-flex{
        display: flex;
        justify-content: space-around;
    }
    .btn-custom{
        width:45%;
    }
    </style>

</head>

<body>
   
    <br>

    <div class="container">
        <a href="./add.php" class="btn btn-info">Thêm giảng viên</a>
        <a href="qlgt.php" class="btn btn-info">Quản lý giáo trình</a>
        <a href="quan_ly_de_tai.php" class="btn btn-info">Quản lý đề tài</a>
        <a href="logout.php" class="btn btn-info">Đăng xuất</a>
        <h2>Search User</h2>

        <!-- Search form -->
        <form action="" method="POST" class="form-inline">
            <i class="fas fa-search" aria-hidden="true"></i>
            <input name="search" class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
                aria-label="Search">
        </form>
        <div class="container-table">
            <table class="table table-striped">
                <thead class="thead-table">
                    <tr>
                        <th>Firstname</th>
                        <th>Sex</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) {
         if($row['position'] == 0) {
        ?>
                    <tr>
                        <td><?php echo "$row[name]"; ?></td>
                        <td><?php echo "$row[sex]"; ?></td>
                        <td><?php echo "$row[addr]"; ?></td>
                        <td><?php echo "$row[phone]"; ?></td>
                        <td><?php echo "$row[email]"; ?></td>
                        <td class="td-flex">
                            <button id="edit" onclick="myFunctionEdit('<?php echo "$row[magv]" ?>')"  class="btn-custom btn btn-primary">Edit</button>
                            <button id="delete" onclick="myFunctionDelete('<?php echo "$row[magv]" ?>')"class="btn-custom btn btn-primary">Delete</button>
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

    <script>
    // Note Edit ------------------------------
    function myFunctionEdit(a) {
        window.location.href = './update.php?magv=' + a;
    }

    // Note Delete ----------------------------
    function myFunctionDelete(a) {
        var note = confirm('Bạn có chắc chắn muốn xóa người dùng này ?');

        if (note) {
            window.location.href = './delete.php?magv=' + a;
        }
    }
    </script>
</body>

</html>