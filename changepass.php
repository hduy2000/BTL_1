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

<html>

<head>
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>
    <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
        <div style="width:500px;">
            <div class="message">
                <?php if(isset($message)) { echo $message; } ?>
            </div>
            <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
                <tr class="tableheader">
                    <td colspan="2">Thay đổi mật khẩu</td>
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
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
                </tr>
            </table>
        </div>
    </form>
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