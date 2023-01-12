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

        include("../../config.php");
        $productID = $_POST['pID'];

        $sql = "DELETE FROM products WHERE productID = '$productID' ";

        if ($conn->query($sql) === TRUE) {
          echo "Item Deleted Successfully";
        } else {
          echo "Error deleting record: " . $conn->error;
        }
    }
}

mysqli_close($conn);

?>
