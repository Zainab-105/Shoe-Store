<?php
session_start();
include("includes/connection.php");

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    $user = $_SESSION['user_id'];
    
    // Check if product ID and quantity are set
    if (isset($_POST["productId"]) && isset($_POST["quantity"])) {
        $productId = $_POST["productId"];
        $quantity = $_POST["quantity"];

        // Update quantity in database
        $query = "UPDATE cart SET quantity = '$quantity' WHERE user_id = '$user' AND product_id = '$productId'";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Quantity updated successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error updating quantity']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Product ID or quantity not provided']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
}
?>
