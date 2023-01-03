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
  <title>Add Products</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Competible" content="ie=edge">
  <link href="../../Styles/style.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

</head>
<body>

<div class="container-fluid">
    <div class="row" id="storeHead-admin">
        <div class="col-2 col-sm-2">
                  <img src="../../Assets/ComIcon.jpg" alt="Company Logo" style="width: 64px; height: 64px;" class="companyLogo">
        </div>
        <div class="col-8 col-sm-8">
                  <h1 id="headerText">ADMINISTRATOR - <b>Add Product</b></h1>
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
                <img src="<?php echo $avatar1; ?>" alt="Avatar Logo" style="width: 28px; height: 28px;" class="myicon rounded-pill "> <br/><?php echo $userName; ?><br/><a href='../../logout.php'> <small><u>LogOut</u></small></a> 
        </div>
    </div>
    
    <div class="row"> 
        <nav class="navbar navbar-expand-sm bg-primary-admin navbar-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#abc" aria-controls="abc" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="abc">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link active" href="addproduct.php"><b>Add Products</b></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="../../index.php"><b>Update/Delete Items</b></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="manageusers.php"><b>Manage Users</b></a>
                        </li>
                    </ul>
                </div>
      
            </div>
        </nav>
    </div>

    <div id="addItem">
        <form action="#" method="POST">
          <label for="productname">Product Name:</label><br>
          <input type="text" id="productname" name="productname" required><br>

          <label for="productCategory">Product Category:</label><br>
          <input type="text" id="productCategory" name="productCategory" required><br>

          <label for="productDiscription">Product Discription:</label><br>
          <input type="textarea" id="productDiscription" name="productDiscription" required><br>

          <label for="productPrice">Product Price:</label><br>
          <input type="text" id="productPrice" name="productPrice" required><br>

          <label for="productImgURL">Product Image URL:</label><br>
          <input type="textbox" id="productImgURL" name="productImgURL" required><br>


          <br>
          <input type="submit" value="Submit">
        </form> 
    </div>


    
  
</div>

<?php

if($_POST){

    include("../../config.php");

    $proName= $_POST['productname'];
    $proCat= $_POST['productCategory'];
    $proDis= $_POST['productDiscription'];
    $proPrice= $_POST['productPrice'];
    $proImg= $_POST['productImgURL'];

    $sql = "INSERT INTO `products` (productName, productCategory, productDiscription, productPrice, productImgSrc) VALUES ('$proName', '$proCat', '$proDis', '$proPrice', '$proImg')";

    if ($conn->query($sql) === TRUE) {
      echo "<script> alert('New Item Details Entered Successfully! '); </script>";
    } else {
      echo " <script> alert( ". "Error: " . $sql . "<br>" . $conn->error."); </script> ";
    }

    mysqli_close($conn);

}


?>

</body>
</html>

<?php
    }
}
?>