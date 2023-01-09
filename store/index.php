<?php
session_start();
if(!$_SESSION['auth']){
    header('location:login.php');
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
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>ONE SHOP</title>
            <link rel="shortcut icon" href="Assets/icon.png" />
        </head>
       
        </html>


        <?php

        include("ContentSource/admin/adminStore.php");
    }else{
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>ONE SHOP</title>
            <link rel="shortcut icon" href="Assets/icon.png" />
        </head>
     
        </html>


<?php
        include("ContentSource/user/user_store_page.php");
    }
    
}



?>