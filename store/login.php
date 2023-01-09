<?php
if($_POST){
    include ("config.php");

    $username=$_POST['username'];
    $password=$_POST['password'];


    $query="SELECT * FROM users WHERE username='$username' and password='$password'";

    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)==1){
        while($row = mysqli_fetch_assoc($result)) {
            if($row["role"] == "admin"){

                $userID = $row["userID"];
                $userName = $row["username"];
                $role = $row["role"];
                //$avatar = $row["avatarSrc"];
                session_start();
                $_SESSION['auth']='true';
                $_SESSION['userID']=$userID;
                $_SESSION['userName']=$userName;
                $_SESSION['role']=$role;
                //$_SESSION['avatar']=$avatar;
                header('location:index.php');
            }else{
                $userID = $row["userID"];
                $userName = $row["username"];
                $role = $row["role"];
                session_start();
                $_SESSION['auth']='true';
                $_SESSION['userID']=$userID;
                $_SESSION['userName']=$userName;
                $_SESSION['role']=$role;
                //$_SESSION['avatar']=$avatar;
                header('location:index.php');
            } 
        }
    }else{
        echo "<script> alert('Wrong username or password entered!'); </script>";
    }

}


?>

<html>
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

  <center>
    <div id="box">
      <br><img src=".\Assets\icon.png" /><br><br><br>
        <form action="#" method="POST">
          <label for="username" style="font-size:20px";>Username:</label><br>
          <input type="text" id="username" name="username" required><br><br>
          <label for="password" style="font-size:20px";>Password:</label><br>
          <input type="password" id="pword" name="password" required><br>
          <input type="checkbox" onclick="showPass()">Show Password <br><br><br>
          <input type="submit" value="Login" id="subBtn">
        </form>
        <a href="createuser.php"><input type="button" value="Create New Account" id="createBtn"></a>

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