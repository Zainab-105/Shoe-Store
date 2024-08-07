<?php
include('includes/connection.php');
$msg='';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $eCheck = "SELECT * FROM users WHERE email='$email'";
    $emailcheck = mysqli_query($conn, $eCheck);
    
    // Check for errors in the SQL query
    if (!$emailcheck) {
        die("Error: " . mysqli_error($conn));
    }

    // Count the number of rows returned
    $eCount = mysqli_num_rows($emailcheck);

   
    // Count the number of rows returned
    $eCount = mysqli_num_rows($emailcheck);
    // Insert data if email doesn't exist
    if ($eCount >= 1) {
        $msg = '<div class="alert alert-danger">Email Already exists. Try logging in instead. <a href="login.php">Login Now</a></div>';
    } 
   
        $q = "INSERT INTO users (username,email,password) VALUES ('$name','$email','$pass')";
        $res = mysqli_query($conn, $q);
        if ($res) {
            $msg = '<div class="alert alert-success">Registered Successfully <a href="login.php"> Login Now </a></div>';
        } else {
            $msg = '<div class="alert alert-danger">Error in Insertion</div>';
        }
   
}
?>

<?php include('includes/header.php'); ?>
<body>
    <div class="container-fluid">
        <div class="container">
            <header class="header_area sticky-header">
                <div class="main_menu">
                    <?php include('includes/nav.php'); ?>
                </div>
                <div class="search_input" id="search_input_box">
                    <?php include('includes/search.php'); ?>
                </div>
            </header>
            <section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                        <div class="col-first">
                            <h1>Login/Register</h1>
                            <nav class="d-flex align-items-center">
                                <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                                <a href="category.php">Login/Register</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-md-6 mx-auto mt-2">
                    <div class="card p-5">
                        <h2 class="text-center">Register</h2>
                        <?php if (!empty($msg)) { echo $msg; } ?>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Enter Your Email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter Your password" name="password">
                            </div>
                            <div>
                                <button type="submit" name="submit" class="btn btn-primary" style="background-color:#FF7E00;">Register Account</button>
                            </div>
                        </form>
                        <br>
                        <p>Already have an Account? <a href="login.php">Login Now</a></p>
                    </div>
                </div>
            </div>
            <?php include('includes/footer.php'); ?>
        </div>
    </div>
</body>
</html>
