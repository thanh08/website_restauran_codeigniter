<!doctype html>
<html lang="en">
  <head>
    <title>Thực đơn</title>
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
  <!-- menu -->
  <div class="about">
    <div class="containaer">
        <div class="textabout fontdacing">
            Thưởng Thức Món Ăn         </div>
        <div class="textabout1 fontroboto">
            Danh Sách Món Ăn Của Nhà Hàng        </div>
    </div>
</div>
  <!-- menu2 -->
  <div class="menu2 page">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 text-sm-center">

          <div class="optionmenu fontroboto">
            <span data-meal="*"><a href="">Tất cả</a></span>

            <?php foreach ($dulieudanhmuc as $value): ?> 
        <span data-meal="<?php if($value['name']=="Thực đơn buổi chiều"){echo ".dinner";} else if($value['name']=="Thực đơn buổi sáng"){echo ".break";} else if($value['name']=="Thực đơn chưa xác định"){echo ".lunch";} ?>"><a href=""><?= $value['name'] ?></a></span>
            <?php endforeach ?>

          </div>

        </div>
      </div>
       <div class="row ">
         <div class="col-12 col-sm-12 allmeal ">
          <!-- 1mon -->
           <div class="row mot ">
           <?php foreach ($dulieumonan as $value): ?>

            <a href="<?php echo base_url(); ?>product/chitietmonan/<?= $value['id'] ?>" class="monan">
            <div class="onemeal col-sm-6 <?php if($value['tendanhmuc']=="Thực đơn buổi chiều"){echo "dinner";} else if($value['tendanhmuc']=="Thực đơn buổi sáng"){echo "break";} else if($value['tendanhmuc']=="Thực đơn chưa xác định"){echo "lunch";} ?>">
             <div class="col-3 col-sm-2 imgmeal">
              <?php if ($value['status']==1) {
                 echo '<div class="tagmeal fontroboto">New</div>';
               }?>
               <img src="<?= $value['image_link'] ?>" alt="">
               
             </div>
             <div class="col-9 col-sm-10">
               <div class="namemenu2 fontoswald">
                 <div class="text"><?= $value['name'] ?></div>
                 <div class="number">
                  <?php
                              echo number_format($value['discount']);
                              ?> VND
                 </div>
               </div>
               <div class="contentmenu2 fontroboto">
                 <div class="textcontent1"><?= $value['description_short'] ?></div>
               </div>
                 
             </div>
            </div>
            </a>
          <?php endforeach ?>
            
           </div>
           <!-- end1mon -->


       </div>
    </div>
  </div>
  </div>
  <!-- endmenu -->
    <!-- footer -->
  <?php include('footer.php') ?>
   <!-- endfooter1 -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/isotope.pkgd.js"></script>
    <script src="<?php echo base_url(); ?>js/1.js"></script>
  </body>
</html>