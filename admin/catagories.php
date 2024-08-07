<?php
include('includes/head.php');
include('includes/config.php');


$msg='';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo $msg;
    $category_name = $_POST['category_name'];
        $sql = "INSERT INTO catagories (name) VALUES ('$category_name')";
        if (mysqli_query($conn, $sql)) {
            $msg='<div class="alert alert-success>Ctagorey Inserted Successfully <a href="display-cat">View Catagorey</a></div>';
        } else {
            $msg='<div class="alert alert-danger>Error in Insertion</div>';
        }
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
                <? If(!empty($msg)){
                    echo $msg;
                }?>
                    <div class="row">
                        <div class="col">
                        <label for="category_name">Category Name:</label><br>
                    <input type="text" id="category_name" name="category_name" class='form-control'><br>
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