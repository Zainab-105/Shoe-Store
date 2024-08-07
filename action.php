
<?php
session_start();
//remove single item from cart
include("includes/connection.php");

if (isset($_GET['remove'])) {
	  $id = $_GET['remove'];

	  $sql = mysqli_query($conn,"DELETE FROM cart WHERE product_id='$id'");
	 

	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Item removed from the cart!';
    header('location:cart.php');
	}
    //remove all item from cart
    if (isset($_GET['clear'])) {
        $stmt = mysqli_query($conn,'DELETE FROM cart');
       
        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'All Item removed from the cart!';
        header('location:cart.php');
      }
      	// Set total price of the product in the cart table
          if (isset($_POST['qty'])) {
            $qty = $_POST['qty'];
            $pid = $_POST['pid'];
            $pprice = $_POST['pprice'];
        
            $tprice = $qty * $pprice;
        
          
            $sql = mysqli_query($conn, "UPDATE cart SET quantity='$qty', price='$tprice' WHERE product_id='$pid'");
        }
        
    ?>