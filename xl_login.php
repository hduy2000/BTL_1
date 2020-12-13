 <?php 
        require('connect.php');

        // lấy dữ liệu người dùng
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM `user`";
        $result = mysqli_query($conn,$query);
        
        if(mysqli_num_rows($result)>0){
        	while ($row = mysqli_fetch_assoc($result)) {
        		# code...
        		if ($username = $row['username'] && $password==$row["password"] ) {
        			# code...
        			header("location: test.php");
        		}
        		else {
        			header("location: index.php");
        		}
        	}
        }

     ?>