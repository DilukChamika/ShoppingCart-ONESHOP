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
        echo "wrong user details!";
    }

}


?>

<html>
    <body>
    <form action="#" method="POST">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">Password:</label><br>
  <input type="password" id="pword" name="password" ><br>
  <input type="checkbox" onclick="showPass()">Show Password <br><br><br>
  <input type="submit" value="Submit">
</form> 
<a href="createuser.php">Create New Account </a>
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