<?php
include ('connection.php');
session_start();
if(isset($_SESSION['user_id'])){
    //store session in uid varaiable
    $uid=$_SESSION['user_id'];
    //give all data whose id is equal to session id

    $udata=mysqli_query($conn,"SELECT * from users where uid='$uid'");
    //take complete row of data against that id
    $data=mysqli_fetch_array($udata);

}else{
    header('location:login.php');
}
?>