<!doctype html>
<html lang="en">
  <head>
    <title>Thanh toán giỏ hàng</title>
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
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/form-validation.css">

  </head>
  <body>
  
   <!-- topheader -->
  <?php include('header.php') ?>
  
   <!-- end topheader -->
  
  <!-- checkout -->
  <div class="about">
    <div class="containaer">
        <div class="textabout1 fontroboto">
            Thanh toán        </div>
    </div>
</div>

<div class="container fontroboto checkoutfood">

    <div class="row">
      <div class="col-sm-4 order-sm-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Giỏ hàng</span>
          <?php $i = 1;$sl=0; ?>

         <?php foreach ($this->cart->contents() as $items): ?>
          <?php  $sl=$i++; ?>
         <?php endforeach; ?>
          <span class="badge badge-secondary badge-pill"><?php if ($sl != 0) {echo $sl;
            
          } else {
            $sl=0;
            echo $sl;
            
          } ?></span>
        </h4>
        <ul class="list-group mb-3">
        <?php foreach ($this->cart->contents() as $items): ?>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0" style="width: 130px;"><?php echo $items['name'] ?></h6>
            </div>
            <span class="text-muted">Sl: <?php echo $items['qty'] ?></span>
            <?php $total=$items['qty']*$items['price']; ?>

            <span class="text-muted"><?=  $this->cart->format_number($total); ?> VND</span>
          </li>
          <?php endforeach; ?>

          
          <li class="list-group-item d-flex justify-content-between">
            <span>Tổng tiền</span>
            <strong><?php echo $this->cart->format_number($this->cart->total()); ?> VND</strong>
          </li>
        </ul>
      </div>
      <div class="col-sm-8 order-sm-1">
        <?php
if (isset($this->session->userdata['logged_in'])) {?>
<?php $username = ($this->session->userdata['logged_in']['username']);
 ?>
 <?php $email = ($this->session->userdata['logged_in']['email']);
 ?>
 <?php $phone = ($this->session->userdata['logged_in']['phone']);
 ?>
 <?php $id = ($this->session->userdata['logged_in']['id']);
 ?>
  <?php $address = ($this->session->userdata['logged_in']['address']);
 ?>

<?php
} else {
//header("location: login");

}
?>

      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Đặt giao tại nhà</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Đặt tại nhà hàng</a>
  </li>
  
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <h4 class="mb-3">Địa chỉ đặt hàng</h4>
  <form role="form" class="needs-validation" novalidate action="<?php echo base_url(); ?>Cart/save_oderuser" method="post" enctype="multipart/form-data" >
          <div class="row">
            <div class="col-md-12 mb-3">
              <input type="hidden" name="id" value="<?php if (isset($id)) {
                echo $id;
                }?>">
              <label for="firstName">Họ và tên</label>
              <input type="text" class="form-control" name="name" id="firstName" placeholder="Họ và tên" value="<?php if (isset($username)) {
                echo $username;
                }?>" required>
              <div class="invalid-feedback">
                Vui lòng nhập họ tên!
              </div>
            </div>
            
          </div>

          <div class="mb-3">
            <label for="username">Số điện thoại</label>
            <div class="input-group">
              <input type="text" value="<?php if (isset($phone)) {
                echo $phone;
                }?>" class="form-control" name="phone" placeholder="Số điện thoại" required>
              <div class="invalid-feedback" style="width: 100%;">
                Vui lòng nhập số điện thoại!
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" value="<?php if (isset($email)) {
                echo $email;
                }?>" class="form-control" name="email" id="email" placeholder="Email">
            <div class="invalid-feedback">
              Vui lòng nhập địa chỉ email!
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Địa chỉ</label>
            <input type="text" class="form-control" name="address" id="address" value="<?php if (isset($address)) {
                echo $address;
                }?>" placeholder="Địa chỉ" required>
            <div class="invalid-feedback">
              Vui lòng nhập địa chỉ!
            </div>
          </div>     


          <hr class="mb-4">

          <h4 class="mb-3">Phương thức thanh toán</h4>

          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input id="credit" name="paymentMethod" value="COD" type="radio" <?php echo set_radio('paymentMethod', 'COD'); ?> class="custom-control-input" checked required>
              <label class="custom-control-label" for="credit">Thanh toán khi nhận hàng</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="paypal" name="paymentMethod" type="radio" value="Credit Card" <?php echo set_radio('paymentMethod', 'Credit Card'); ?> class="custom-control-input" required>
              <label class="custom-control-label" for="paypal">Credit/Debit Card</label>
            </div>
          </div>          
          <hr class="mb-4">
          <button class="btn btn-warning btn-lg btn-block" type="submit" name="submit">Đặt hàng</button>
        </form>


  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    
<form action="<?php echo base_url(); ?>cart/savetable" method="post" enctype="multipart/form-data">
       <div class="row fontroboto">
         <div class="col-sm-12 text-sm-center fontroboto">
           <p class="text1booktable">Đặt tại nhà hàng</p>
           </div>

           
         <div class="col-sm-4">
           <div class="form-group">
            <input type="hidden" name="id" value="<?php if (isset($id)) {
                echo $id;
                }?>">
             <input type="text" name="ten" id="" value="<?php if (isset($username)) {
                echo $username;
                }?>" class="form-control" placeholder="Tên bạn*" >
           </div>
           <div class="form-group">
            <input type="date" name="ngay" id="" value="" class="form-control" placeholder="Ngày đặt *">
          </div>
         </div>
         <div class="col-sm-4">
          <div class="form-group">
            <input type="email" name="email" id="" value="<?php if (isset($email)) {
                echo $email;
                }?>" class="form-control" placeholder="Email *">
          </div>
          <div class="form-group">
            <input type="time" name="gio" id="" class="form-control" placeholder="Thời gian *">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <input type="tel" name="sdt" value="<?php if (isset($phone)) {
                echo $phone;
                }?>" pattern="[0-9]{1,11}" id="" class="form-control" placeholder="Số điện thoại">
          </div>
          <div class="form-group">
            <input type="number" name="songuoi" id="" class="form-control" placeholder="Số lượng người *">
          </div>
        </div>
        <div class="col-sm-12 text-sm-center">
          <input type="submit" value="ĐẶT NGAY" class="btn-warning submitbook fontroboto">
        </div>
       </div>
     </form>



  </div>
  
</div>




        

      </div>
    </div>
  </div>
  <!-- endcheckout -->
   <!-- endfooter1 -->
  <?php include('footer.php') ?>
  
   <!-- Optional JavaScript -->
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="<?php echo base_url(); ?>js/jquery.js"></script>
   <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/jquery.js"><\/script>')</script>
    <script src="<?php echo base_url(); ?>js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/isotope.pkgd.js"></script>
    <script src="<?php echo base_url(); ?>js/holder.min.js"></script>
    <script src="<?php echo base_url(); ?>js/1.js"></script> 

   <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';

      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');

        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>



  
 </body>
</html>