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


    $url =  $_SERVER['QUERY_STRING'];

    $productID = ltrim(strstr($url, '='), '=');

    //echo "Product ID = ".$productID;

    include ("../../config.php");

    $sql = "SELECT * FROM products WHERE productID= '$productID' ";
    $result = $conn->query($sql);

    if ($result->num_rows ==1 ) {
        while($row = $result->fetch_assoc()) {
            $productName = $row["productName"];
            $productCate = $row["productCategory"];
            $productDis = $row["productDiscription"];
            $productPrice = $row["productPrice"];
            $productImg = $row["productImgSrc"];
        }
    }


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
                  <h1 class="headerText"><span><b>Admin - Update Item</b></span></h1>
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
                <img src="<?php echo $avatar1; ?>" alt="Avatar Logo" style="width: 28px; height: 28px;" class="myicon rounded-pill "> <br/><b><?php echo $userName; ?></b><br/><a href='../../logout.php'> <small><u style="color:yellow">LogOut</u></small></a> 
        </div>
    </div>
    <center>
    <div id="adminupdatediv">
        <form action="#" method="POST">
            <br>
          <label for="productname"><b>Product Name:</b></label><br>
          <input type="text" id="productname" class="addproform" name="productname" value="<?php echo $productName; ?>" required><br><br>

          <label for="productCategory"><b>Product Category:</b></label><br>
          <input type="text" id="productCategory" class="addproform" name="productCategory" value="<?php echo $productCate; ?>" required><br><br>

          <label for="productDiscription"><b> Discription:</b></label><br>
          <textarea id="productDiscription" class="addproform" name="productDiscription" required><?php echo $productDis; ?></textarea><br><br>

          <label for="productPrice"><b>Product Price:</b></label><br>
          <input type="text" id="productPrice" class="addproform" name="productPrice" value="<?php echo $productPrice; ?>" required><br><br>

          <label for="productImgURL"><b>Product Image URL:</b></label><br>
          <textarea id="productImgURL" class="addproform" name="productImgURL" required><?php echo $productImg; ?></textarea><br><br>


          <br>
          <input type="submit" value="Submit" id="adminupdateitem">
        </form> 
        <br>
       
        <button onclick= "document.location='../../index.php'" id="storelinkbtn">Product Store</button>
        <br><br>
    </div>
    </center>


    
  
</div>

<?php

if($_POST){ 

    include("../../config.php");

    $proName= $_POST['productname'];
    $proCat= $_POST['productCategory'];
    $proDis= $_POST['productDiscription'];
    $proPrice= $_POST['productPrice'];
    $proImg= $_POST['productImgURL'];

    $sql = "UPDATE `products` SET productName='$proName' , productCategory='$proCat', productDiscription='$proDis', productPrice='$proPrice', productImgSrc='$proImg' WHERE productID = '$productID' ";

    if ($conn->query($sql) === TRUE) {
      echo "<script> alert ( 'New record updated successfully'); </script> ";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

}


}
}


?>
