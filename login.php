<?php
include('includes/header.php');
include('includes/connection.php');
session_start();
$msg = '';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form inputs
    if (empty($email) || empty($password)) {
        $msg = '<div class="alert alert-danger">Please enter both email and password.</div>';
    } else {
        // Check if the user exists
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            // Verify the password
            if ( $row) {
                $_SESSION['user_id'] = $row['uid'];
                header('Location: index.php');
                exit();
            } else {
                $msg = '<div class="alert alert-danger">Incorrect email or password.</div>';
            }
        } else {
            $msg = '<div class="alert alert-danger">User not found.</div>';
        }
    }
}
?>

<header class="header_area sticky-header">
<div class="main_menu">
<?php include('includes/nav.php');?>
</div>
<div class="search_input" id="search_input_box">
<?php include('includes/search.php');?>


</div>
</header>

<?php
echo $msg;
 ?>

<section class="banner-area organic-breadcrumb">
<div class="container">
<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-start">
<div class="col-first">
<h1>Login/Register</h1>
<nav class="d-flex align-items-center">
<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
<a href="category.html">Login/Register</a>
</nav>
</div>
</div>
</div>
</section>


<section class="login_box_area section_gap">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="login_box_img">
<img class="img-fluid" src="img/login.jpg" alt>
<div class="hover">
<h4>New to our website?</h4>
<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
<a class="primary-btn" href="registration.php">Create an Account</a>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="login_form_inner">
<h3>Log in to enter</h3>
<form action="php/login.php" class="row login_form"  method="post" id="contactForm" novalidate="novalidate">
<div class="col-md-12 form-group">
<input type="text" class="form-control" id="name" name="email" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
</div>
<div class="col-md-12 form-group">
<input type="text" class="form-control" id="name" name="password" placeholder="Password" >
</div>
<div class="col-md-12 form-group">
<div class="creat_account">

</div>
</div>
<div class="col-md-12 form-group">
<button type="submit"  class="primary-btn">Log In</button>

</div>
</form>
</div>
</div>
</div>
</div>
</section>

<?php include('includes/footer.php'); ?>


</body>

<!-- Mirrored from preview.colorlib.com/theme/karma/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Apr 2024 06:22:15 GMT -->
</html>