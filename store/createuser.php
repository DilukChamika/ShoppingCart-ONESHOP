<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONE SHOP</title>
    <link rel="shortcut icon" href=".\Assets\icon.png" />
    <link rel="stylesheet" href="Styles/style.css">
  </head>

<body class="home">
	<?php
	if($_POST){

		include ("config.php");

		$username = $_POST['username'];
		$password = $_POST['password'];
		$img_name = $_FILES['avatar']['name'];
		$tmp_name = $_FILES['avatar']['tmp_name'];
		$img_error = $_FILES['avatar']['error'];

		if($img_error === 0){
			$img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ext_lc = strtolower($img_ext);

			$allowed_exts = array("jpg", "jpeg", "png", "webp");

			if(in_array($img_ext_lc, $allowed_exts)){
				$new_img_name = uniqid("ProPic-", true).'.'.$img_ext_lc;
				$img_upload_path = 'Assets/profilePic/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				$sql = "INSERT INTO `users` (username, password, role, avatarSrc) VALUES ('$username', '$password', 'user', '$new_img_name') ";
				if ($conn->query($sql) === TRUE) {
			      echo "<script> alert ('New user created successfully'); ";
			    } else {
			      echo "Error: " . $sql . "<br>" . $conn->error;
			    }



			}else{
				$err_msg = "Invalid File Type!";
				header("Location: createuser.php?error=$err_msg");
			}
		}else{
			echo "Error!";
		}

	}




	?>




<center>
  	<div id="box">  
  		<br><img src=".\Assets\icon.png"/><br><br><br>
	
		<form action="#" method="POST" enctype="multipart/form-data">
			<label for="username">Username:</label><br>
	    	<input type="text" id="username" name="username" required><br><br>
	    	<label for="avatar">Profile Picture:</label><br>
	    	<input type="file" name="avatar"><br><br>
	    	<label for="password">Password:</label><br>
	    	<input type="password" id="pword" name="password" required><br>
	    	<input type="checkbox" onclick="showPass()">Show Password <br><br>
	    	<input type="submit" value="Submit" id="subBtn"><br><br>
			<a href="login.php"><input type="button" value="log In" id="logBtn"></a>
		</form>
	</div>
</center>
</body>

<script>
function showPass() {
  var x = document.getElementById("pword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</html>
