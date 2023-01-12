<?php

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
  <title>Admin-ProductStore</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Competible" content="ie=edge">
  <link href="Styles/style.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

</head>
<body>

<div class="container-fluid">


    <div class="row" id="storeHead-admin">
        <div class="col-2 col-sm-2">
                  <img src="Assets/icon.png" alt="Company Logo" style="width: 52px; height: 52px;" class="companyLogo">
        </div>
        <div class="col-8 col-sm-8">
        <h1 class="headerText"><span><b>Admin - Update/Delete Items</b></span></h1>
        </div>
        <div class="col-2 col-sm-2">
            <?php
            include("config.php");
            $q1 = "SELECT avatarSrc FROM users WHERE userID = $userID";
            $res = $conn->query($q1);

                if ($res->num_rows > 0) {
                  while($r = $res->fetch_assoc()) {
                    $avatar1 = "Assets/profilePic/".$r["avatarSrc"];
                }}
            mysqli_close($conn);

            ?>
                <img src="<?php echo $avatar1; ?>" alt="Avatar Logo" style="width: 28px; height: 28px;" class="myicon rounded-pill "> <br/><b><?php echo $userName; ?></b><br/><a href='logout.php'> <small><u style="color:yellow">LogOut</u></small></a> 
        </div>
    </div>


    
    <div class="row"> 
        <nav class="navbar navbar-expand-sm bg-primary-admin navbar-white">
            <div class="container-fluid">
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#abc" aria-controls="abc" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="abc">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link" href="ContentSource/admin/addproduct.php"><b>Add Products</b></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="index.php"><b>Update/Delete Items</b></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="ContentSource/admin/manageusers.php"><b>Manage Users</b></a>
                        </li>
                    </ul>
                </div>
                <form class="d-flex" method="POST" action="index.php">
                    <input class="form-control me-2" id="userSearch" type="text" name="keyw" placeholder="Search" required>
                    <button  type="submit" class="btn btn-primary" id="adminsearchbtn">Search</button>
                </form>
            </div>
        </nav>
    </div>



    <div class="row" id="stores-admin">

            <?php
            if($_POST){
            ?>
                <form action="index.php">
                    <br>
                    <center>
                    <button class="Stbutton" type="submit">Close The Search Results</button>
                    </center>
                </form>

            <?php
                include ("config.php");
                $kw = $_POST['keyw'];
                
                $sql = "SELECT * FROM products WHERE productName LIKE '%{$kw}%' ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    $productID = $row["productID"];

            ?>
                
                <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-12 col-12">

            <?php
                    echo "<div class='cartitem' "."id=".$productID.">";
                    echo "<h3 class="."title".">" .$row["productName"] ."</h3>";
                    echo " <img src=$row[productImgSrc] height='120' width='auto'>";
                    echo "<p class="."category".">" .$row["productCategory"] ."</p>";
                    echo "<p>" .$row["productDiscription"] . "</p>";
                    echo "<p class="."price".">LKR ".$row["productPrice"]. ".00</p>";

                    echo "<button  onClick= "."updateItem($productID)"." class="."Stbutton"." type="."submit"."><b>Update</b></button>";
                    echo "  ";
                    echo "<button  onClick= "."deleteItem($productID)"." class="."rmvbutton"." type="."submit"."><b>Delete</b></button>";
                        
                    echo "</div>";
                    echo "</div>";

                  }//fetch-while

                } else {
            
                    echo "<div class=" ."stores" .">";
                    echo "<h3 class="."title".">NO ITEMS ARE MATCHING TO YOUR SEARCHING !</h3>";
                    echo "</div>";
                }
                mysqli_close($conn);

            }else{

                include ("config.php");

                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    $productID = $row["productID"];
                ?>
                    <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-12 col-12">

                <?php
                    //echo "<div class= "." col-xxl-3 col-lg-4 col-md-6 col-sm-12 col-12".">";
                    echo "<div class='cartitem' "."id=".$productID.">";
                    echo "<h3 class="."title".">" .$row["productName"] ."</h3>";
                    echo " <img src=$row[productImgSrc] height='120' width='auto'>";
                    echo "<p style='color:#0577FF'class="."category"."><b>" .$row["productCategory"] ."</b></p>";
                    echo "<p>" .$row["productDiscription"] . "</p>";
                    echo "<p class="."price"."><b>LKR ".$row["productPrice"]. ".00</b></p>";

                    echo "<button  onClick= "."updateItem($productID)"." class="."Stbutton"." type="."submit"."><b>Update</b></button>";
                    echo "  ";
                    echo "<button  onClick= "."deleteItem($productID)"." class="."rmvbutton"." type="."submit"."><b>Delete</b></button>";
 
                    echo "</div>";
                    echo "</div>";    
                  }//fetch-while

                } else {

                    echo "<div class=" ."stores" .">";
                    echo "<h3 class="."title".">NO ITEMS ARE UPDATED IN THE STORE SITE !</h3>";
                    
                    echo "</div>";
                    
                }
                mysqli_close($conn);
            }

                ?>



                 <script type="text/javascript">
                
                     function deleteItem(abc){
                        var pID = abc;
                       
                        $.ajax({
                            url:'ContentSource/admin/deleteItem.php',
                            type: 'POST',
                            data: {pID},
                            success: function(data) {
                                var x = JSON.stringify(data);
                                console.log(x);
                                alert(x);
                            }
                        });

                        document.getElementById(pID).innerHTML = "<b>Successfully Deleted!</b>";

                     }


                     function updateItem(updateID) {
                        var id= updateID;
                        window.location = 'ContentSource/admin/update.php?updateid='+updateID;
                     }
                
            </script>

</div>

</body>
</html>

<?php
    }
}
?>
    
