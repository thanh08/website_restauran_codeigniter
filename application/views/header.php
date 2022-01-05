     <?php foreach ($dulieuheader as $key => $value): ?>
            <?php 
            if ($key == 'mangxahoi') {
              $mangxahoi=$value;
              
            }
            if ($key == 'hotline') {
              $hotline=$value;
            }
            if($key == 'giomocua'){
              $giomocua=$value;
            }
            if ($key == 'logo') {
              $logo=$value;
            }

             ?>
            <?php endforeach ?>   

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.min.css">
        <script src="<?php echo base_url(); ?>js/jquery.js"></script>


<div class="topheader">
    <div class="container">
    <div class="row">
       <div class="col-sm-7">
         <div class="mangxahoi float-sm-left ">
           <a href="<?= $mangxahoi['linkfb'] ?>"><i class="fa fa-facebook-f    "></i></a>
          <a href="<?= $mangxahoi['linktwitter'] ?>"><i class="fa fa-twitter    "></i></a>
          <a href="<?= $mangxahoi['linksky'] ?>"><i class="fa fa-skyatlas    "></i></a>
          <a href="<?= $mangxahoi['linktum'] ?>"><i class="fa fa-tumblr"></i></a>
         </div>
         <div class="datban">
          <?= $hotline['text'] ?>: <?= $hotline['sdt'] ?>
         </div>
       </div>
       <div class="col-sm-5">
         <div class="openhour datban float-sm-right">
          <?= $giomocua['text'] ?> : <?= $giomocua['gio'] ?>
         </div>
       </div>
    </div>
    </div>
  </div>

  <div class="menuandlogo fontroboto">
    
      <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
        <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?= $logo ?>" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url() ?>">Trang chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>about">Thông tin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>product">Thực đơn</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>news">Tin tức</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>contact">Liên hệ</a>
            </li>
             <li class="nav-item nutdb">
              <?php $i = 1;$sl=0; ?>

         <?php foreach ($this->cart->contents() as $items): ?>
          <?php  $sl=$i++; ?>
         <?php endforeach; ?>
              <a class="nav-link btn-warning nutdatban animate__animated animate__tada" href="<?php echo base_url(); ?>cart"><i class="fa fa-cart-plus giohang" aria-hidden="true"><span class="badge badge-light"><?php if ($sl != 0) {echo $sl;
            
          } else {
            $sl=0;
            echo $sl;
            
          } ?></span></i>Giỏ hàng</a>
            </li>
            
             <?php
if (isset($this->session->userdata['logged_in'])) {?>
<?php $username = ($this->session->userdata['logged_in']['username']);
 ?>
 <?php $email = ($this->session->userdata['logged_in']['email']);
 ?>

<?php
} else {
//header("location: login");

}
?>

             <li class="nav-item nutdb">
              <a class="nav-link btn-warning nutdatban" <?php if (isset($username)) {?>
                href="<?php echo base_url(); ?>user_authentication/xemuser"
              <?php } else {?>
                href="<?php echo base_url(); ?>user_authentication"
              <?php } ?> 
              ><i class="fa fa-user" aria-hidden="true"></i><?php if (isset($username)) {
                echo $username;
                
              } else {?>
                Đăng nhập/Đăng kí
              <?php } ?> </a>
            </li>



          </ul>
        </div>
      </div>
      </nav>
  </div>
  <script type="text/javascript">
    $(function () {
    // $('li.nav-item a.nav-link').click(function () {
    //   console.log('kich');
    //   $('li.nav-item a.nav-link').removeClass('active');
    //   $(this).addClass('active');
    // });
    $('li.active').removeClass('active');
  $('a[href="'+location.protocol+"//"+location.host+ location.pathname +'"]').closest('li.nav-item').addClass('active');


    });
  </script>