<?php 
    	require'connect.php';
  		$id=$_GET['id'];
		$query = mysqli_query($conn,"SELECT  * FROM  user WHERE magv ='$id'");
	    $row = mysqli_fetch_array($query);
?>


<!-- Xu ly doi mat khau -->
<?php

    include_once "connect.php";
    $id = $_GET['id'];
    if (isset($_POST['submit'])) {
    $result = mysqli_query($conn, "SELECT *from user WHERE magv='$id'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["password"]) {

        mysqli_query($conn, "UPDATE user set password='" . $_POST["newPassword"] . "' WHERE magv='$id'");
        $message = "Mật khẩu đã được thay đổi thành công!";
    } else
        $message = "Mật khẩu hiện tại chưa chính xác";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./scss/style-update.css">
    <title>Sửa thông tin</title>
</head>
<style>
	.modal {
	  display: none; /* Hidden by default */
	  position: fixed; /* Stay in place */
	  z-index: 1; /* Sit on top */
	  padding-top: 100px; /* Location of the box */
	  left: 0;
	  top: 0;
	  width: 100%; /* Full width */
	  height: 100%; /* Full height */
	  overflow: auto; /* Enable scroll if needed */
	  background-color: rgb(0,0,0); /* Fallback color */
	  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}
	/* Modal Content */
	.modal-content {
	  background-color: #fefefe;
	  margin: auto;
	  padding: 20px;
	  border: 1px solid #888;
	  width: 80%;
	}
	/* The Close Button */
	.close {
	  color: #aaaaaa;
	  float: right;
	  font-size: 28px;
	  font-weight: bold;
	}
	.close:hover,
	.close:focus {
	  color: #000;
	  text-decoration: none;
	  cursor: pointer;
	}
</style>




<body>
	<div class="container">
		<h2>Thông tin cá nhân</h2>
		
		<form class="form-horizontal"  action="xl_suathongtin.php?id=<?php echo $id ?>" method="POST">
            <label for="name">Tên cán bộ:</label>
            <input type="text" value="<?php echo $row['name']; ?>"name='name'><br />

            <label>Email: </label>
            <input type="text" value="<?php echo $row['email']; ?>" name="email"><br />

            <label>Địa chỉ: </label>
            <input type="text" value="<?php echo $row['addr']; ?>" name="addr"><br />

            <label>Số điện thoại: </label>
            <input type="text" value="<?php echo $row['phone']; ?>" name="phone"><br />
			<br>
			<input class="btn btn-success" type="submit" name="submit-edittt" value="Cập nhật">
			<!-- <a class="btn btn-primary" href="changepass.php?id=">Đổi mật khẩu</a> -->
			<a class="btn btn-primary" id="openForm" onclick="openForm">Đổi mật khẩu</a>
		</form>
	</div>
	

	<div id="myForm" class="modal">
		<div class="modal-content">
			
		<span class="close">&times;</span>
		<form name="frmChange" method="POST" action="" id="changePassword" >
		        <div style="width:500px;">
		            
		            <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
		                <tr class="tableheader">
		                    <h2>Thay đổi mật khẩu</h2>
		                </tr>
		                <tr>
		                    <td width="40%"><label>Mật khẩu hiện tại:</label></td>
		                    <td width="60%"><input type="password" name="currentPassword" class="txtField" /><span id="currentPassword" class="required"></span></td>
		                </tr>
		                <tr>
		                    <td><label>Mật khẩu mới:</label></td>
		                    <td><input type="password" name="newPassword" class="txtField" /><span id="newPassword" class="required"></span></td>
		                </tr>
		                <td><label>Xác nhận mật khẩu mới:</label></td>
		                <td><input type="password" name="confirmPassword" class="txtField" /><span id="confirmPassword" class="required"></span></td>
		                </tr>
		                <div class="message">
		                <?php if(isset($message)) { echo $message; } ?>
		            	</div>
		                <tr>
		                    <td colspan="2"><input class="btn btn-primary" type="submit" name="submit" value="Lưu" class="btnSubmit"></td>
		                </tr>
		            </table>
		        </div>
    	</form>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">

	



	var modal = document.getElementById("myForm");

	
	const status = localStorage.getItem('click');
	console.log(status);

	if (status){
		modal.style.display = 'block';
		localStorage.removeItem('click');
	}


	//Nut mo form
	var btn = document.getElementById("openForm");

	//Nut thoat
	var span = document.getElementsByClassName("close")[0];

	
	const changePasswordForm = document.querySelector('#changePassword');
	console.log(changePasswordForm);
	changePasswordForm.onsubmit = event => {
		if (!validatePassword()){
			event.preventDefault();
			return;
		}

		localStorage.setItem('click',true);
		
	}


	btn.onclick = function(){
		modal.style.display = "block";
	}

	//Click thoat
	span.onclick = function(){
		modal.style.display = "none";
	}

	//Click ra ngoai
	window.onclick = function(event){
		if(event.target== modal){
			modal.style.display = "none";
		}
	}


</script>



<!-- Xu lys doi mat khau -->

<script>
        function validatePassword() {
            var currentPassword, newPassword, confirmPassword, output = true;

            currentPassword = document.frmChange.currentPassword;
            newPassword = document.frmChange.newPassword;
            confirmPassword = document.frmChange.confirmPassword;

            if (!currentPassword.value) {
                currentPassword.focus();
                document.getElementById("currentPassword").innerHTML = "required";
                output = false;
            } else if (!newPassword.value) {
                newPassword.focus();
                document.getElementById("newPassword").innerHTML = "required";
                output = false;
            } else if (!confirmPassword.value) {
                confirmPassword.focus();
                document.getElementById("confirmPassword").innerHTML = "required";
                output = false;
            }
            if (newPassword.value != confirmPassword.value) {
                newPassword.value = "";
                confirmPassword.value = "";
                newPassword.focus();
                document.getElementById("confirmPassword").innerHTML = "not same";
                output = false;
            }
            return output;
        }
 </script>
</body>
</html>


