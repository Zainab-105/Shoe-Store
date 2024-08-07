<?php 

session_start();
include('includes/connection.php');
include('includes/header.php');
$grand_total = 0;
$msg='';


if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_GET['uid'])){
$uid=($_GET['uid']);
    }
    $number=$_POST['number'];
    $adress=$_POST['add1'];
    $country=$_POST['country'];
    $city=$_POST['city'];
    $zip=$_POST['zipcode'];
    $grand_total = 0;
    $result = mysqli_query($conn, "SELECT * FROM cart WHERE user_id='$uid'");
    while ($row = mysqli_fetch_assoc($result)) {
        $cart_id = $row['cart_id'];
         $update_query = "UPDATE `cart` SET `status`='1' WHERE user_id = '$uid' AND status = '0'";
         $query = mysqli_query($conn , $update_query);
   
        $grand_total += $row['price'];
    }
    $sql = "INSERT INTO payment (uid,number,adress,country,city,zip_code,total_price,status) VALUES ('$uid', '$number','$adress','$country','$city','$zip','$grand_total',1)";
            $result = mysqli_query($conn, $sql);
            if($result){
                $msg = '<div class="alert alert-success">Your Order Has been Placed. Go to <a href="index.php">Home</a></div>';

                
            }
            else{
               
            }
}
?>

<body>

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
                <h1>Checkout</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="single-product.php">Checkout</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="checkout_area section_gap">
    <div class="container">
        <?php if(!empty($msg)){
            echo $msg;
        }?>
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Billing Details</h3>
                    <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                    <?php 
                            if(isset($_GET['uid'])){
                              $uid=$_GET['uid'];
                              $result=mysqli_query($conn,"SELECT * FROM users WHERE uid='$uid'");
                              if($result) {
                                  $row = mysqli_fetch_assoc($result);
                        ?>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="first" name="uname" value="<?=$row['username']?>">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="last" name="email" value="<?=$row['email']?>">
                        </div>
                        <?php 
                              } else {
                                  echo "Error: " . mysqli_error($conn);
                              }
                            }
                        ?>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="number" name="number" placeholder="Phone number" required>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="add1" name="add1" placeholder="Address" required>
                        </div>
                        <div class="col-md-12 form-group p_star">
                    <select id="category" name="country" required>
                        <option value="Country" selected disabled>Country</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Australia">Australia</option>
                        <option value="NewzaeaLand">NewzaeaLand</option>
                    </select>
                </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="add1" name="city" placeholder="City" required>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="add1" name="zipcode" placeholder="Zip Code" required>
                        </div>
                        <div class="col-md-6 ">
                        <button class="btnindex" onclick="redirectToIndex()">Confirm Order</button>
                        </div>
                      
                        
                    </form>
    
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <ul class="list">
                            <li><a href="#">Product <span>Total</span></a></li>
                            <?php 
                            if(isset($_GET['uid'])){
                                $uid= $_GET['uid'];
                                $result=mysqli_query($conn,"SELECT * from cart WHERE user_id='$uid' AND status = '0'");
                               
                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $product_id = $row['product_id'];
                                        $product_result = mysqli_query($conn, "SELECT * FROM products WHERE product_id='$product_id'");
                                        if ($product_result && mysqli_num_rows($product_result) > 0) {
                                            $product_row = mysqli_fetch_assoc($product_result);
                            ?>
                            <li><a href="#"><?= $product_row['product_name']?><span class="middle">x <?= $row['quantity']?></span> <span class="last">$<?= $row['price']?></span></a></li>
                            <?php 
                                            $grand_total += $row['price'];
                                        }
                                    }
                                } else {
                                    echo "Error: " . mysqli_error($conn);
                                }
                            }
                            ?>
                        </ul>
                        <ul class="list list_2">
                            <li><a href="#">Total <span>$<?= $grand_total ?></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>

</body>
