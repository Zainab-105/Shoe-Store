
<nav class="navbar navbar-expand-lg navbar-light main_box">
    <div class="container">
        <a class="navbar-brand logo_h" href="index.php"><img src="img/logo_dark.png" alt></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link" href="category.php">Shop Category</a></li>
                        <li class="nav-item"><a class="nav-link" href="single-product.php">Product Details</a></li>
                       
                        <li class="nav-item"><a class="nav-link" href="cart.php">Shopping Cart</a></li>
                        
                    </ul>
                </li>
               
                <li class="nav-item submenu dropdown active">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item active"><a class="nav-link" href="login.php">Login</a></li>
                        <li class="nav-item active"><a class="nav-link" href="includes/logout.php">Logout</a></li>
                     
                    </ul>
                </li>
               
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php 
                if(isset($_SESSION['user_id'])) {
                    $user = $_SESSION['user_id']; 
                    $cart_products = mysqli_query($conn, "SELECT user_id FROM cart WHERE user_id='$user' AND status = '0'");
                    $cart_num = mysqli_num_rows($cart_products);
                } else {
                    $cart_num = 0;
                }
                ?>
                <li class="nav-item ">
                    <a href="cart.php" class="cart"><i class="fa-solid fa-cart-plus cart-i"></i><span class="cart-count  " style="height: 30px;width: 30px;"><?php echo $cart_num; ?></span></a>
                </li>
                <li class="nav-item">
                    <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                </li>
            </ul>
        </div>
    </div>
</nav>
