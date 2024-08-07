<?php 
include('includes/connection.php');
include('includes/header.php');

?>

<body id="category">

<header class="header_area ">
<div class="main_menu">
  <?php include('includes/nav.php');?>

</div>
<div class="search_input" id="search_input_box">
<?php include('includes/search.php')?>
</div>
</header>


<section class="banner-area organic-breadcrumb">
<div class="container">
<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-start">
<div class="col-first">
<h1>Shop Category page</h1>
<nav class="d-flex align-items-center">
<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
<a href="category.html">Fashon Category</a>
</nav>
</div>
</div>
</div>
</section>

<div class="container">
<div class="row">



<section class="lattest-product-area pb-40 category-list">
<div class="row card-row">
<?php
                                $a = 1;
                                // Fetch data from descending order by id
                                $sql = "SELECT * FROM products ORDER BY product_id DESC";
                                $query = mysqli_query($conn, $sql);
                                if ($query) {
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
<div class="col-lg-4 col-md-6 ">
<div class="single-product card">
<img style="height:200px;width: 100%;" class="img-fluid" src="admin/<?php echo $row['product_image_path']; ?>" alt>
<div class="product-details">
<h6 class="text-center"><?php echo $row['product_name']; ?></h6>
<div class="price text-center">
<h6 style="color:#FF324D;">$<?php echo $row['selling_price']; ?></h6>

</div>
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
</section>




</div>
</div>
</div>
<?php include('includes/footer.php')?>



