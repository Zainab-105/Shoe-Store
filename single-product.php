<?php
include ('includes/connection.php');
include ('includes/header.php');
?>

<body>

  <header class="header_area ">
    <div class="main_menu">
      <?php include ('includes/nav.php'); ?>
    </div>
    <div class="search_input" id="search_input_box">
      <?php include ('includes/search.php') ?>
    </div>
  </header>

  <section class="banner-area organic-breadcrumb">
    <div class="container">
      <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-start">
        <div class="col-first">
          <h1>Product Details Page</h1>
          <nav class="d-flex align-items-center">
            <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
            <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
            <a href="single-product.php">product-details</a>
          </nav>
        </div>
      </div>
    </div>
  </section>

  <div class="product_image_area mb-5">
    <div class="container">
    <?php
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE product_id='$product_id'";
        $result = mysqli_query($conn, $sql);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
    ?>
      <div class="row s_product_inner">
        <div class="col-lg-6">
          <img  class="img-fluid" src="admin/<?php echo $row['product_image_path']; ?>" alt="">
        </div>
        <div class="col-lg-5 offset-lg-1">
          <div class="s_product_text">
            <h3><?php echo $row['product_name']; ?></h3>
            <h2>$<?php echo $row['selling_price']; ?></h2>
        <ul>
          <li><i class="fa-solid fa-arrow-rotate-left ul-li"></i>30 Day Return Policy</li>
          <li><i class="fa-solid fa-sack-dollar ul-li"></i>Cash on Delivery available</li>
        </ul>
         
            <div class="product-detail"><?php echo $row['short_description']; ?></div>
            <div class="card_area d-flex align-items-center">
              <a class="btnindex" href="add_cart.php?id=<?= $row['product_id']?>&price=<?= $row['selling_price']?>">Add to Cart</a>
             
            </div>
            <p style="" >Catagorey: <?php echo $row['catagorey']; ?></p>
          </div>
        </div>
      </div>
    <?php
        } else {
            echo "<p>No product found with the provided ID.</p>";
        }
    }
    ?>
    </div>
  </div>
  
  <?php include('includes/footer.php'); ?>
</body>
