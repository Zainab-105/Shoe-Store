<?php
$server='localhost';
$username='root';
$password='';
$db='karma';
$conn=mysqli_connect($server,$username,$password,$db);
if($conn){
    echo '';
}else{
    echo 'Error'.mysqli_error();
}
?>