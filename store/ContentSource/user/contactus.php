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

    if($role== "user"){
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
    <div class="row" id="storeHead">
        <div class="col-2 col-sm-2">
                  <img src="../../Assets/icon.png" alt="Company Logo" style="width: 52px; height: 52px;" class="companyLogo">
        </div>
        <div class="col-8 col-sm-8">
                  <h1 id="headerText"><b> Contact Us</b></h1>
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
            //mysqli_close($conn);

            ?>
                <img src="<?php echo $avatar1; ?>" alt="Avatar Logo" style="width: 28px; height: 28px;" class="myicon rounded-pill "> <br/><?php echo $userName; ?><br/><a href='../../logout.php'> <small><u style="color:yellow">LogOut</u></small></a> 
        </div>
    </div>
    
    <div class="row"> 
        <nav class="navbar navbar-expand-sm bg-primary navbar-white">
            <div class="container-fluid">
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#abc" aria-controls="abc" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="abc">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link" href="../../index.php"><b>Product Store</b></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="mycart.php"><b>My Cart</b></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="#"><b>Contact Us</b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">

<div class="contact-background">
<div class = "contact-bg">
<br>
<p><center><h3><b>Have questions about our products, features, or pricing?</b></h3><h4>Our teams will help you.</h4></center></p>
</div>


<br><br>


<div class = "contact-body">

<table class="wp-table">
<tr>
<th><h4><b>Phone No</b></h4></th>
<th><h4><b>E-mail</b></h4></th>
<th><h4><b>Address</b></h4></th>
</tr>
<tr>
<td><h5>077 1234567</h5></td>
<td><h5>oneshop@gmail.com</h5></td>
<td><h5>No.20/B, Oneshop, Kelaniya.</h5></td>
</tr>
</table>

</div>
</div>

<div class = "map">
<iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d31682.603057807737!2d79.891629!3d6.970886!3m2!1i1024!2i768!4f13.1!2m1!1sKelaniya!5e0!3m2!1sen!2slk!4v1673015478497!5m2!1sen!2slk" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>

    
</div>
    
    <div class="row">
        <div id="footer">
            <p> &#169; 2023 ONE SHOP </p>
          
        </div>
        
    </div>

   

  


</body>
</html>

<?php 
    }
}
?>