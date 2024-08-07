<?php
session_start();
include('../includes/connection.php');



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $pass = $_POST['password'];
     $sql = "SELECT * FROM users WHERE email='$email'";
 
    $chkuser=mysqli_query($conn,$sql);
    
    if($chkuser){
        
        $q="SELECT * FROM users WHERE email='$email' AND password='$pass'";
      
        $chkpass=mysqli_query($conn,$q);
        $row = mysqli_fetch_assoc($chkpass);

        if ($chkpass) {
         $_SESSION['user_id']=$row['uid'];
            header('location:../index.php');
             exit();
        }else{
            header('location:../login.php');
            exit();
        }
    }else{
        header('location:../login.php');
             exit();
    }





}
?>