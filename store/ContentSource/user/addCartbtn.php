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

        include ("../../config.php");
        $productID = $_POST['pID'];

        $sql = "SELECT productID, userID FROM usercart WHERE userID = '$userID' AND productID = '$productID' ";
        $result = $conn->query($sql);

                if($result->num_rows > 0){
                    echo "This Product Already Added!";
                }else{
                    
                    $sql1 = "INSERT INTO usercart (`userID`, `productID`) VALUES ('$userID', '$productID')";
                      if ($conn->query($sql1) === TRUE) {
                        echo "Item Added to the Cart Successfully! ";
                      } else {
                        echo "Error: " . $sql1 . "<br>" . $conn->error;
                      }
                }
    }
}



?>