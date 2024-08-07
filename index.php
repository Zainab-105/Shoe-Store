<?php include('includes/config.php');
include('includes/connection.php');
include('includes/header.php');

?>

<body>

<header class="header_area ">
<div class="main_menu">
  <?php include('includes/nav.php');?>

</div>
<div  >
<?php include('includes/search.php')?>
</div>
</header>


<section class="banner-area">
<div class="container">
<div class="row fullscreen align-items-center justify-content-start">
<div class="col-lg-12">
<div class=" ">
<div class="row single-slide">
<div class="col-lg-5">
<div class="banner-content">
<h1>Nike New <br>Collection!</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
<div class="add-bag d-flex align-items-center">
<a class="btnindex" href="category.php">Shop Now</a>

</div>
</div>
</div>
<div class="col-lg-7">
<div class="banner-img">
<img class="img-fluid" src="img/" alt>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="features-area section_gap">
<div class="container">
<div class="row features-inner">

<div class="col-lg-3 col-md-6 col-sm-6">
<div class="single-features">
<div class="f-icon">
<img src="img/features/f-icon1.png" alt>
</div>
<h6>Free Delivery</h6>
<p>Free Shipping on all order</p>
</div>
</div>

<div class="col-lg-3 col-md-6 col-sm-6">
<div class="single-features">
<div class="f-icon">
<img src="img/features/f-icon2.png" alt>
</div>
<h6>Return Policy</h6>
<p>Free Shipping on all order</p>
</div>
</div>

<div class="col-lg-3 col-md-6 col-sm-6">
<div class="single-features">
<div class="f-icon">
<img src="img/features/f-icon3.png" alt>
</div>
<h6>24/7 Support</h6>
<p>Free Shipping on all order</p>
</div>
</div>

<div class="col-lg-3 col-md-6 col-sm-6">
<div class="single-features">
<div class="f-icon">
<img src="img/features/f-icon4.png" alt>
</div>
<h6>Secure Payment</h6>
<p>Free Shipping on all order</p>
</div>
</div>
</div>
</div>
</section>


<section class="category-area">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-8 col-md-12">
<div class="row">
<div class="col-lg-8 col-md-8">
<div class="single-deal">
<div class="overlay"></div>
<img class="img-fluid w-100" src="img/category/c1.jpg" alt>
<a href="img/category/c1.jpg" class="img-pop-up" target="_blank">
<div class="deal-details">
<h6 class="deal-title">Sneaker for Sports</h6>
</div>
</a>
</div>
</div>
<div class="col-lg-4 col-md-4">
<div class="single-deal">
<div class="overlay"></div>
<img class="img-fluid w-100" src="img/category/c2.jpg" alt>
<a href="img/category/c2.jpg" class="img-pop-up" target="_blank">
<div class="deal-details">
<h6 class="deal-title">Sneaker for Sports</h6>
</div>
</a>
</div>
</div>
<div class="col-lg-4 col-md-4">
<div class="single-deal">
<div class="overlay"></div>
<img class="img-fluid w-100" src="img/category/c3.jpg" alt>
<a href="img/category/c3.jpg" class="img-pop-up" target="_blank">
<div class="deal-details">
<h6 class="deal-title">Product for Couple</h6>
</div>
</a>
</div>
</div>
<div class="col-lg-8 col-md-8">
<div class="single-deal">
<div class="overlay"></div>
<img class="img-fluid w-100" src="img/category/c4.jpg" alt>
<a href="img/category/c4.jpg" class="img-pop-up" target="_blank">
<div class="deal-details">
<h6 class="deal-title">Sneaker for Sports</h6>
</div>
</a>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6">
<div class="single-deal">
<div class="overlay"></div>
<img class="img-fluid w-100" src="img/category/c5.jpg" alt>
<a href="img/category/c5.jpg" class="img-pop-up" target="_blank">
<div class="deal-details">
<h6 class="deal-title">Sneaker for Sports</h6>
</div>
</a>
</div>
</div>
</div>
</div>
</section>


<section>

<div class="single-product-slider">
<div class="container">
<?php
if (isset($_SESSION['showAlert'])) {
    if ($_SESSION['showAlert'] == 'success') {
        echo '<div class="alert alert-success alert-dismissible mt-2">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>' . $_SESSION['message'] . '</strong>
              </div>';
    } elseif ($_SESSION['showAlert'] == 'danger') {
        echo '<div class="alert alert-danger alert-dismissible mt-2">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>' . $_SESSION['message'] . '</strong>
              </div>';
    }
    unset($_SESSION['showAlert']);
    unset($_SESSION['message']);
}
?>
<div class="row justify-content-center">
<div class="col-lg-6 text-center">
<div class="section-title">
<h1>Latest Products</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
dolore
magna aliqua.</p>
</div>
</div>
</div>
<div class="row card-row">
<?php
                                $a = 1;
                                // Fetch data from descending order by id
                                $sql = "SELECT * FROM products ORDER BY product_id DESC LIMIT 8";
                                $query = mysqli_query($conn, $sql);
                                if ($query) {
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
<div class="col-lg-3 col-md-6 ">
<div class="single-product card">
<a href="single-product.php?id=<?= $row['product_id']?>"><div class="container-relative">
    <img class="img-fluid" style='width:100%;height: 200px;object-fit:cover;' src="admin/<?php echo $row['product_image_path']; ?>" alt>
<span class="text-overlay"><?php echo $row['catagorey']; ?></span>
    </div>

<div class="product-details">
<h6 style="text-align:center;"> <?php echo $row['product_name']; ?></h6>
<div class="price text-center">
<h6 style="color:#FF324D;">$<?php echo $row['selling_price']; ?></h6>
</div></a>
<div class="">
<a href="add_cart.php?id=<?= $row['product_id']?>&price=<?= $row['selling_price']?>&name=<?= $row['product_name']?>" class="social-info btnindex">
<i class="fa-solid fa-cart-plus btn-i"></i>
  Add to Cart
</a>
</div>
</div>
</div>
</div>

<?php
                                        $a++;
                                    }
                                } else {
                                    echo "Error: " . mysqli_error($conn);
                                }
                                ?>


</div>
</div>
</div>


</section>




<?php include('includes/footer.php'); ?>
