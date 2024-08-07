<?php
session_start();
include("includes/connection.php");

if (isset($_SESSION['user_id'])) {
    $user = $_SESSION['user_id'];
    if (isset($_GET["id"]) && isset($_GET["price"])) {
        $id = $_GET["id"];
        
        $price = $_GET["price"];
       


        // Check if the product is already in the cart
        $sql = "SELECT * FROM cart WHERE user_id='$user' AND product_id='$id' AND status = '0'";
       
        $cart = mysqli_query($conn, $sql);
        if (mysqli_num_rows($cart) == 0) {
            $sql = "INSERT INTO cart (user_id, product_id,quantity, price , status) VALUES ($user, '$id', 1,'$price' , '0')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $_SESSION['showAlert'] = 'success';
                $_SESSION['message'] = 'Item added to your cart!';
                header('location: index.php');
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            $_SESSION['showAlert'] = 'danger';
            $_SESSION['message'] = 'Item already added to your cart!';
            header('location: index.php');
            exit();
        }
    } else {
        echo "";
    }
} else {
    header('location: login.php');
    exit();
}
?>
