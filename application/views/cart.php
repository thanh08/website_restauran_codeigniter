<!doctype html>
<html lang="en">
  <head>
    <title>Giỏ hàng</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>fonts/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/1.css">
    <script type="text/javascript">
// To conform clear all data in cart.
          function clear_cart() {
          var result = confirm('Bạn có chắc chắn muốn xóa hết giỏ hàng ?');

          if (result) {
          window.location = "<?php echo base_url(); ?>/Cart/remove/all";
          } else {
          return false; // cancel button
          }
          }
          
    </script>



  </head>
  <body>
   <!-- topheader -->
  <?php include('header.php') ?>
  
   <!-- end topheader -->
  
  <!-- checkout -->
  <div class="about">
    <div class="containaer">
        <div class="textabout1 fontroboto">
            Giỏ hàng        </div>
    </div>
</div>

<div class="container fontroboto checkoutfood">

    <div class="row">
      <div class="col-sm-10 offset-sm-1 mb-4">
        <?php $i = 1;$sl=0; ?>

         <?php foreach ($this->cart->contents() as $items): ?>
          <?php  $sl=$i++; ?>
         <?php endforeach; ?>
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Giỏ hàng của bạn</span>
          <span class="badge badge-secondary badge-pill"><?php if ($sl != 0) {echo $sl;
            
          } else {
            $sl=0;
            echo $sl;
            
          } ?></span>
        </h4>
<?php echo form_open('../Cart/update_cart1');?>

        <ul class="list-group mb-3">

         <?php foreach ($this->cart->contents() as $items): ?>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
          
            <div>
              <h6 class="my-0" style="width: 250px;"><?php echo $items['name'] ?></h6>
            </div>

            <input type="number" min="1" name="soluong" value="<?= $items['qty'] ?>" class="soluong" style="height: 35px;width: 35px;">

            <?php $total=$items['qty']*$items['price']; ?>
            <span class="text-muted"><?=  $this->cart->format_number($total); ?> VND<a href="<?php echo base_url() ?>cart/remove/<?= $items['rowid'] ?>"><i class="fa fa-minus-circle ml-5" aria-hidden="true" style="color: red; size: 22px;"></i></a>
           </span>


          </li>
          <?php endforeach; ?>

           

          <li class="list-group-item d-flex bg-light">
<input class ='btn-warning teal'  type="submit" value="Cập nhật giỏ hàng">
<button class="btn-danger teal float-right ml-2" onclick="clear_cart()">Xóa hết giỏ hàng</button>
<?php echo form_close(); ?>
          <!-- <button class="btn-warning teal" id="nut1" >Cập nhật giỏ hàng</button> -->
          <!-- <button class="btn-warning teal"><a href="<?php echo base_url(); ?>Cart/update_cart">Cập nhật giỏ hàng</a></button> -->

            
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Tổng tiền</span>
            <strong><?php echo $this->cart->format_number($this->cart->total()); ?> VND</strong>
          </li>
        </ul>

        <!-- <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <div class="input-group-append">
              <button type="submit" class="btn btn-secondary">Redeem</button>
            </div>
          </div>
        </form> -->
        <hr class="mb-4">
        <button class="btn btn-warning btn-lg btn-block"><a style="text-decoration: none; color: #333" href="<?php echo base_url(); ?>Cart/checkout">Tiếp tục thanh toán</a></button>
      </div>
      


    </div>

    
  </div>
  <!-- endcheckout -->
   <!-- footer -->
   <!-- endfooter1 -->
  <?php include('footer.php') ?>
  
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="<?php echo base_url(); ?>js/jquery.js"></script>
   <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/jquery.js"><\/script>')</script>
    <script src="<?php echo base_url(); ?>js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/isotope.pkgd.js"></script>
    <script src="<?php echo base_url(); ?>js/holder.min.js"></script>
    <script src="<?php echo base_url(); ?>js/1.js"></script> 
    
 </body>
</html>