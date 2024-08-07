<?php
include ('connection.php');
session_start();
if(isset($_SESSION['adminid'])){
    //store session in uid varaiable
    $aid=$_SESSION['adminid'];
    //give all data whose id is equal to session id

    $udata=mysqli_query($conn,"SELECT * from admin where aid='$aid'");
    //take complete row of data against that id
    $data=mysqli_fetch_array($udata);

}else{
    header('location:login.php');
}
?>