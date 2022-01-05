<!doctype html>
<html lang="en">
  <head>
    <title>Liên hệ</title>
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

  </head>
  <body>
  <!-- topheader -->
  <?php include('header.php') ?>
  
   <!-- end topheader -->
   
  <!-- message -->
  <div class="messenge">
    <div class="container">
      <div class="row">
      <div class="col-sm-6">
        <div class="imgmessage">
          <img src="images/images/contact01_03.jpg" alt="" srcset="">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="textmess">
            <div class="text01 fontdacing">
                Gửi phản hồi cho nhà hàng tại đây
            </div>
            <div class="text02 fontroboto">
                Liên hệ với nhà hàng
            </div>

        </div>
          <form action="<?php echo base_url(); ?>contact/insertlienhe" method="post" enctype="multipart/form-data">
            <div class="form-row fontroboto">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Tên</label>
                <input type="text" class="form-control" id="inputEmail4" name="name">
              </div>
              <div class="form-group col-md-6">
                <label for="">Số điện thoại</label>
                <input type="phone" class="form-control" id="inputPassword4" name="sdt">
              </div>
            </div>
            <div class="form-group fontroboto">
              <label for="inputAddress">Email</label>
              <input type="email" class="form-control" id="inputAddress" placeholder="" name="email">
            </div>
            <div class="form-group fontroboto">
              <label for="inputAddress">Địa chỉ</label>
              <input type="textarea" class="form-control" id="inputAddress" placeholder="" name="address">
            </div>
            <div class="form-group fontroboto" >
              <label for="">Mô tả</label>
              <textarea class="form-control" id="content" name="content" rows="5"></textarea>
            </div>
            
            <button type="submit" class="btn btn-dark">Gửi phản hồi</button>
          </form>

      </div>  
      </div>
    </div>
  </div>
  <div class="about mt-5">
    <div class="containaer">
        <div class="textabout fontdacing">
            Cảm Ơn Đã Ghé Thăm Nhà Hàng        </div>
        <div class="textabout1 fontroboto">
            Chúng tôi làm cho thực phẩm luôn tươi ngon và khung cảnh tuyệt vời        </div>
    </div>
</div>
<div class="ourservices">
    <div class="container">
        <div class="textservices text-center">
            <div class="text01 fontdacing">
                Các Chi Nhánh Khác Thuộc Hệ Thống Chúng Tôi
            </div>
            <div class="text02 fontroboto">
                Địa Chỉ
            </div>
        </div>
        <div class="detailservice location">
            <div class="card-deck">
                <div class="card">
                    <img class="card-img-top" src="images/images/contact02_03.jpg" alt="">
                    <div class="card-body">
                        <p class="card-text local"><i class="fa fa-send" aria-hidden="true"></i>4/3A Nam Cao,P.Tân Phú,Quận 9,TP Hồ Chí Minh</p>
                        <p class="card-text local"><i class="fa fa-phone" aria-hidden="true"></i>0968686868</p>
                        <p class="card-text local"><i class="fa fa-envelope" aria-hidden="true"></i>thanhpppp360@gmail.com</p>

                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="images/images/contact03_03.jpg" alt="">
                    <div class="card-body">
                        <p class="card-text local"><i class="fa fa-send" aria-hidden="true"></i>4/3A Nam Cao,P.Tân Phú,Quận 9,TP Hồ Chí Minh</p>
                        <p class="card-text local"><i class="fa fa-phone" aria-hidden="true"></i>0968686868</p>
                        <p class="card-text local"><i class="fa fa-envelope" aria-hidden="true"></i>thanhpppp360@gmail.com</p>

                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="images/images/contact04_03.jpg" alt="">
                    <div class="card-body">
                        <p class="card-text local"><i class="fa fa-send" aria-hidden="true"></i>4/3A Nam Cao,P.Tân Phú,Quận 9,TP Hồ Chí Minh</p>
                        <p class="card-text local"><i class="fa fa-phone" aria-hidden="true"></i>0968686868</p>
                        <p class="card-text local"><i class="fa fa-envelope" aria-hidden="true"></i>thanhpppp360@gmail.com</p>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
  <!-- end message -->
 <!-- footer -->
  <?php include('footer.php') ?>
   <!-- endfooter1 -->
       <!-- Optional JavaScript -->
       <!-- jQuery first, then Popper.js, then Bootstrap JS -->
       <script src="<?php base_url(); ?>js/jquery.js"></script>
       <script src="<?php base_url(); ?>js/popper.min.js"></script>
       <script src="<?php base_url(); ?>js/bootstrap.min.js"></script>
       <script src="<?php base_url(); ?>js/isotope.pkgd.js"></script>
       <script src="<?php base_url(); ?>js/1.js"></script>
     </body>
   </html>