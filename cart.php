<?php
session_start();
include('includes/connection.php');
include('includes/header.php');
include('add_cart.php');

?>

<body>

  <header class="header_area ">
    <div class="main_menu">
      <?php include('includes/nav.php'); ?>
    </div>
    <div class="search_input" id="search_input_box">
      <?php include('includes/search.php'); ?>
    </div>
  </header>

  <section class="banner-area organic-breadcrumb">
    <div class="container">
      <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-start">
        <div class="col-first">
          <h1>Shopping Cart</h1>
          <nav class="d-flex align-items-center">
            <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
            <a href="category.php">Cart</a>
          </nav>
        </div>
      </div>
    </div>
  </section>

  <section class="cart_area">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
        <div style="display:<?php echo isset($_SESSION['showAlert']) ? $_SESSION['showAlert'] : 'none'; ?>;" class="alert alert-success alert-dismissible mt-3">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong><?php echo isset($_SESSION['message']) ? $_SESSION['message'] : ''; ?></strong>
</div>
          <table class="table" style="    background-color: #f2f0f5;">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th>
                  <a href="action.php?clear=all" class="btn btn-danger badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>Clear Cart</a>
                </th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $user = $_SESSION['user_id']; 
              $result=mysqli_query($conn,"SELECT * FROM cart WHERE user_id='$user' AND status='0'");
              $grand_total = 0;
              if ($result) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      
                      $product_id = $row['product_id'];
                      $product_result = mysqli_query($conn, "SELECT * FROM products WHERE product_id='$product_id'");
                      $product_row = mysqli_fetch_assoc($product_result);
              ?>
              <tr>
                
                <input type="hidden" class="pid" value="<?= $product_row['product_id'] ?>">
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img class="cart-img" src="admin/<?php echo $product_row['product_image_path']; ?>" alt="">
                    </div>
                    <div class="media-body">
                      <p><?php echo $product_row['product_name']; ?></p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5>$<?php echo $product_row['selling_price']; ?></h5>
                </td>
                <td>
                  <div class="product_count">
                  <input type="number" name="qty" class="sst input-text qty itemQty iquantity"  title="Quantity:" value='<?php echo $row['quantity']; ?>'>
<input type="hidden" class="pprice" value="<?php echo $product_row['selling_price']; ?>">
                  </div>
                </td>
                <td>
                  <h5 class='itotal'>$<?php echo $row['price']; ?></h5>
                </td>
                <td>
                  <a href="action.php?remove=<?= $row['product_id'] ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure want to remove this item?');">Remove</a>
                </td>
                <?php $grand_total += $row['price']; ?>
              </tr>
              <?php 
                  }
              } else {
                  echo "Error: " . mysqli_error($conn);
              }
              ?>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Subtotal</h5>
                </td>
                <td>
                <h5 class='itotal'>$<?= number_format($grand_total,2); ?></h5>
                </td>
              </tr>
          
              <tr class="out_button_area">
                <td></td>
                <td></td>
                <td>
                <div class="checkout_btn_inner d-flex align-items-center">
                  
                  </div>
                </td>
                <td>
                  <div class="checkout_btn_inner d-flex align-items-center">
                    <a class="gray_btn" href="index.php">Continue Shopping</a>
                    <a class="primary-btn" href="checkout.php?uid=<?= $user ?>">Proceed to checkout</a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <?php include('includes/footer.php'); ?>