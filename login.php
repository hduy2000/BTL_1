<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="./scss/style.css">
    
    <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
    <script language="javascript">
    
    function load_ajax() {
        // URL
        var url = "result.php";
        // Data
        var data = {
            username: $('#username').val(),
            password: $('#password').val()
        };
        // Success Function
        var success = function(result) {
            const data = JSON.parse(result);
            const type = data['type'];
            if (type === 'admin') {
                window.location = "./admin.php";
            } else if (type === 'user') {
                const user = data['data'];
                const id = user['magv'];
                window.location = "./user.php?id=" + id;
            } else {
                const type = data['text'];
                $('#result').html(type);
            }
        }
        // Result Type o
        var dataType = 'text';
        // Send Ajax
        $.post(url, data, success, dataType);
    }
    </script>
</head>
<body>
    <form class="login-form">
        <h1>Login</h1>
        <div class="txtb">
            <input placeholder="Username" id="username" type="text">
            <!--  <span data-placeholder="Username"></span> -->
        </div>
        <div class="txtb">
            <input placeholder="Password" id="password" type="password" name="">
            <!-- <span data-placeholder="Password"></span> -->
        </div>
        <div style="color: red;height: 30px" id="result" class="alert">
        </div>
        <input class="logbtn" type="button" name="clickme" id="clickme" onclick="load_ajax()" value="Đăng nhập" />
        <div class="bottom-text">
            Don't have account? <a href="#">Sign up</a>
        </div>
    </form>
    <script type="text/javascript">
    var input = document.getElementsByTagName("input");
    var input_button = document.getElementById("clickme");
    for (var i = 0; i < input.length; i++) {
        input[i].addEventListener("keyup", myFunction);
        function myFunction(event) {
            if (event.keyCode == '13') {
                input_button.click();
            }
        }
    }
    </script>
</body>
</html>