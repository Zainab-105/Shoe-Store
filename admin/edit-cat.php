
<?php
include('includes/head.php');
include('includes/connection.php');

$msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_id = $_POST['cat_id'];
    $category_name = $_POST['category'];
    // Update the SQL query with the correct table and column names
    $sql = "UPDATE catagories SET name='$category_name' WHERE id='$category_id'";
    if (mysqli_query($conn, $sql)) {
        $msg = '<div class="alert alert-success">Category Updated Successfully <a href="display-cat.php">View Category</a></div>';
    } else {
        $msg = '<div class="alert alert-danger">Error in Update</div>';
    }
}
if (isset($_GET['id'])) {
    $catid = $_GET['id'];
    $sql = "SELECT * FROM catagories WHERE id='$catid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include('includes/sidebar.php')?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include('includes/nav.php');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Category</h1>
                        
                    </div>


                    <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
              
            <form method="post" mx-auto>
    <?php if (!empty($msg)) {
        echo $msg;
    }?>
    <div class="row">
        <div class="col-md-6">
           
            <input type="hidden" name="cat_id" value="<?php echo $catid ?>">
            <label for="category_name">Category Name:</label><br>
            <select class="form-control" name="category" aria-label="Default select example" required>
                                <option selected value="" disabled>Open this select menu</option>
                                    <?php

                                    $sql_cat = "SELECT * FROM `catagories`";
                                    $result_cat = mysqli_query($conn, $sql_cat);

                                    while ($fetch_cat = mysqli_fetch_assoc($result_cat)){
                                        ?>
                                          <option value="<?=$fetch_cat['name']?>"><?=$fetch_cat['name']?></option>

                                     <?php

                                    }


                                    ?>
 
  
</select>
            <input type="submit" value="Submit" class='btn btn-primary'>
        </div>
    </div>
</form>
            </div>
            <!-- End of Page Wrapper -->
        </div>

                  
                   
        

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php')?>