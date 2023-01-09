<?php
session_start();
if(!$_SESSION['auth']){
    header('location:../../login.php');
}else{
    $userID = $_SESSION["userID"];
    $_SESSION['userID']=$userID;
    $userName = $_SESSION["userName"];
    $_SESSION['userName']=$userName;
    $role = $_SESSION["role"];
    $_SESSION['role']=$role;

    if($role== "admin"){
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Competible" content="ie=edge">
  <title>ONE SHOP</title>
  <link rel="shortcut icon" href="../../Assets/icon.png" />
  <link href="../../Styles/style.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

</head>
<body>

<div class="container-fluid">
    <div class="row" id="storeHead-admin">
        <div class="col-2 col-sm-2">
                  <img src="../../Assets/icon.png" alt="Company Logo" style="width: 52px; height: 52px;" class="companyLogo">
        </div>
        <div class="col-8 col-sm-8">
                  <h1 class="headerText"><span><b>Admin - Manage User</b></span></h1>
        </div>
        <div class="col-2 col-sm-2">
            <?php
            include("../../config.php");
            $q1 = "SELECT avatarSrc FROM users WHERE userID = $userID";
            $res = $conn->query($q1);

                if ($res->num_rows > 0) {
                  while($r = $res->fetch_assoc()) {
                    $avatar1 = "../../Assets/profilePic/".$r["avatarSrc"];
                }}
            mysqli_close($conn);

            ?>
                <img src="<?php echo $avatar1; ?>" alt="Avatar Logo" style="width: 28px; height: 28px;" class="myicon rounded-pill "> <br/><?php echo $userName; ?><br/><a href='../../logout.php'> <small><u style="color:yellow">LogOut</u></small></a> 
        </div>
    </div>
    
    <div class="row"> 
        <nav class="navbar navbar-expand-sm bg-primary-admin navbar-white">
            <div class="container-fluid">
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#abc" aria-controls="abc" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="abc">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link" href="addproduct.php"><b>Add Products</b></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="../../index.php"><b>Update/Delete Items</b></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link  active" href="manageusers.php"><b>Manage Users</b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
<div id="tbl">
  <table>
    <?php

    include ("../../config.php");

    if(isset($_POST['deletebtn'])){

        $uID = $_POST['uID'];

        $sql = "DELETE FROM `users` WHERE userID= '$uID' ";
                if ($conn->query($sql) === TRUE) {
                  echo "<script> alert ( 'User Account Deleted successfully'); </script> ";
                } else {
                    echo "<script> alert (" ."Error: " . $sql . "<br>" . $conn->error."); </script>";
                }

    }else if(isset($_POST['newAcc'])){

        $username = $_POST['username'];
        $role = $_POST['role'];
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
                $img_upload_path = '../../Assets/profilePic/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                $sql = "INSERT INTO `users` (username, password, role, avatarSrc) VALUES ('$username', '$password', '$role', '$new_img_name') ";
                if ($conn->query($sql) === TRUE) {
                  echo "<script> alert ('New user created successfully'); </script>";
                } else {
                  echo "<script> alert (" ."Error: " . $sql . "<br>" . $conn->error."); </script>";
                }

            }else{
                $err_msg = "Invalid File Type!";
                header("Location: createuser.php?error=$err_msg");
            }

        }else{
            echo "Image Error!";
        }

    }

           
        $sql = "SELECT * FROM users ";
        $result = $conn->query($sql);
        echo "<table border='2'><tr><th>Username</th><th>Password</th><th>Delete</th></tr>";

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $uID = $row['userID'];
                    echo "<tr>";
                    echo "<td>" . $row['username'] ."</td>";
                    echo "<td>" . $row['password'] ."</td>";
                    echo "<td>";
                    if($uID == $userID){
                        echo "You";
                    }else{
                    ?>
                    <form action="manageusers.php" method="POST">
                        <input type="text" name="uID" value="<?php echo $uID; ?>" hidden>
                        <button type="submit" name="deletebtn" id="delbtn">Delete</button>

                    </form>


                    <?php
                    }
                    echo "</td></tr>";


                }
            }else{
                echo "Something went wrong!";
            }


    

    echo "</table>";




    ?>
  </table>
</div>
    <br>

    <button type="button" data-bs-toggle="modal" data-bs-target="#myModal" id="cBtn">Create New Admin/User</button>
    
 
  
</div>


<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create Admin/User Account</h4>
        <form action="manageusers.php">
        <button type="submit" class="btn-close" data-bs-dismiss="modal"></button>
        </form>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form action="manageusers.php" method="POST" enctype="multipart/form-data">
        <label for="role">Role: </label>
        <select name="role" id="role">
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
        <br><br>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="avatar">Profile Picture:</label><br>
        <input type="file" name="avatar" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="pword" name="password" required><br>
        <input type="checkbox" onclick="showPass()">Show Password <br><br>
        <input type="submit" value="Submit" id="subBtnAd" name="newAcc">
    </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <form action="manageusers.php">
        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </form>
      </div>

    </div>
  </div>
</div>

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


</body>
</html>



<?php
mysqli_close($conn);
    }
}
?>