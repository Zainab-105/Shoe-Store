<footer class="footer-area section_gap">
  <div class="container">
    <div class="row">
      <div class="col-lg-3  col-md-6 col-sm-6">
        <div class="single-footer-widget">
          <h6>About Us</h6>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore
            magna aliqua.
          </p>
        </div>
      </div>
      <div class="col-lg-4  col-md-6 col-sm-6">
        <div class="single-footer-widget">
          <h6>Newsletter</h6>
          <p>Stay update with our latest</p>
          <div class id="mc_embed_signup">
            <form target="_blank" novalidate="true"
              action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
              method="get" class="form-inline">
              <div class="d-flex flex-row">
                <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''"
                  onblur="this.placeholder = 'Enter Email '" required type="email">
                <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right"
                    aria-hidden="true"></i></button>
                <div style="position: absolute; left: -5000px;">
                  <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value type="text">
                </div>

              </div>
              <div class="info"></div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-3  col-md-6 col-sm-6">
        <div class="single-footer-widget mail-chimp">
          <h6 class="mb-20">Instragram Feed</h6>
          <ul class="instafeed d-flex flex-wrap">
            <li><img src="img/i1.jpg" alt></li>
            <li><img src="img/i2.jpg" alt></li>
            <li><img src="img/i3.jpg" alt></li>
            <li><img src="img/i4.jpg" alt></li>
            <li><img src="img/i5.jpg" alt></li>
            <li><img src="img/i6.jpg" alt></li>
            <li><img src="img/i7.jpg" alt></li>
            <li><img src="img/i8.jpg" alt></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 col-sm-6">
        <div class="single-footer-widget">
          <h6>Follow Us</h6>
          <p>Let us be social</p>
          <div class="footer-social d-flex align-items-center">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
            <a href="#"><i class="fa fa-behance"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
      <p class="footer-text m-0">
        Copyright &copy;
        <script>document.write(new Date().getFullYear());</script> All rights reserved  <i
          class="fa fa-heart-o" aria-hidden="true"></i>

      </p>
    </div>
  </div>
</footer>

<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="../../../cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
  integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="js/gmaps.min.js"></script>
<script src="js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag() { dataLayer.push(arguments); }
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
  integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
  data-cf-beacon='{"rayId":"86e6f4e42af74127","b":1,"version":"2024.3.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
  crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/ad578f38da.js" crossorigin="anonymous"></script>
<script>
  
  $(document).ready(function () {
    $(".itemQty").on('change', function () {
        var $el = $(this).closest('tr');

        var pid = $el.find(".pid").val();
    
        var pprice = $el.find(".pprice").val();
        
        var qty = $el.find(".itemQty").val();
        if (qty < 1) {
            qty = 1;
        } else if (qty > 12) {
            qty = 12;
        }
    
        $.ajax({
            url: 'action.php',
            method: 'post',
            cache: false,
            data: {
                qty: qty,
                pid: pid,
                pprice: pprice
            },
            success: function (response) {
                console.log(response);
                location.reload(true);
            }
        });
    });
});
function redirectToIndex() {
    // Redirect to index.php
    alert("Thank you for visting our store . Your order has been placed successfully");
    window.location.href = "index.php";
}


</script>

</html>