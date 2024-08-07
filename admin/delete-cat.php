<?php
include('includes/connection.php');

if (isset($_GET['id'])) {
    $catId = $_GET['id'];

    // Perform deletion query
    $sql = "DELETE FROM catagories WHERE id='$catId'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Deletion successful
        echo 'Product deleted successfully';
        header('location:display-cat.php');
    } else {
        // Error occurred during deletion
        echo 'Error: ' . mysqli_error($conn);
    }
} else {
    // Invalid request
    echo 'Invalid request';
}
?>
