<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>fonts/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/1.css">
    
</head>
<body>
	 <!-- topheader -->
   
  <?php include('header.php') ?>

   <!-- end topheader -->

  <!-- menu -->
  <div class="menu">
    <div id="idsline1" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#idsline1" data-slide-to="0" class="active"></li>
        <li data-target="#idsline1" data-slide-to="1"></li>
        <li data-target="#idsline1" data-slide-to="2"></li>
      </ol>
      
      <div class="carousel-inner" >
        <?php $dem = 1 ?>
        <?php foreach ($dulieusline as $key => $value): ?>
        <div class="carousel-item <?php if ($dem == 1) { echo "active";$dem ++; } ?>">
          <div class="noidungsl">
            <img src="images/logoinsline_64.png" alt="">
            <div class="textlargesline fontroboto"><?= $value['title'] ?></div>
            <p class="textsmallsline fontroboto">
              <?= $value['description'] ?>
            </p>
            
    <div class="nutsline"><a href=" <?= $value['link'] ?>" class="btn-warning btn-lg"><?= $value['textbuton'] ?></a>
    </div>
          </div>
          <img class="d-block w-100" src=" <?= $value['image'] ?>" alt="First slide">
        </div>
       <?php endforeach ?>
        
      </div>
      <a class="carousel-control-prev" href="#idsline1" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#idsline1" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <!-- endmenu -->
  <!-- service -->
  <div class="service">
    <div class="container">
      <div class="row">
            <div class="col-sm-4 text-sm-center ">
            <a href="" class="imgservice"> <img src="images/imgsevice01.png" alt=""></a>
            <p class="textlargeservice"><a href="#">C??u Chuy???n V??? Nh?? H??ng Ch??ng T??i</a></p>
            <p class="textsmallservice fontroboto">D??n s??nh ???m th???c ??ang ???kh??o??? nhau l?? mu???n ??n h???i s???n, ?????c s???n ngon t???i Nh?? h??ng Arctica. H??y ?????n nh?? h??ng Arctica ????? t??m ???????c ?????a ch??? ??n ngon, gi?? ph???i ch??ng, c???nh quan ?????p, an to??n s???c kh???e c??ng kh?? nh?? ???m?? kim ????y b?????? trong v?? v??n qu??n ??n, nh?? h??ng hi???n nay.<span class="noidungan">  Th?????ng c???nh ?????p th?? th???c ??n kh??ng v???a ??, gi?? ?????t ho???c ng?????c l???i; ch??? ????? ????? c??c ??u ??i???m ???4 trong 1??? nh?? tr??n trong m???t nh?? h??ng th?? r???t hi???m.</span></p>
            <div class="textsmallservice1 fontroboto"><a>Xem Th??m</a></div>  
            </div>
            <div class="col-sm-4 text-sm-center">
            <a href="" class="imgservice"> <img src="images/img_service03_05.png" alt=""></a>
            <p class="textlargeservice"><a href="#">Th??ng Tin V??? ?????u B???p C???a Ch??ng T??i</a></p>
            <p class="textsmallservice fontroboto">V???i ph????ng ch??m "H??y n???u nh?? n???u cho ng?????i m??nh y??u th????ng nh???t", ch??ng t??i lu??n mong mu???n mang ?????n cho qu?? kh??ch nh???ng gi??y ph??t th?? gi??n ????? th?????ng th???c nh???ng m??n ??n ngon b??n gia ????nh, b???n b??, ?????ng nghi???p v?? ng?????i th??n.Nh???ng ?????u b???p c???a ch??ng t??i c?? kinh nghi???m v?? am hi???u ???m th???c.<span class="noidungan">  Th?????ng c???nh ?????p th?? th???c ??n kh??ng v???a ??, gi?? ?????t ho???c ng?????c l???i; ch??? ????? ????? c??c ??u ??i???m ???4 trong 1??? nh?? tr??n trong m???t nh?? h??ng th?? r???t hi???m.</span></p>
            <div class="textsmallservice1 fontroboto"><a>Xem Th??m</a></div>  
            </div>
            <div class="col-sm-4 text-sm-center">
            <a href="" class="imgservice" > <img src="images/img_service_05.png" alt=""></a>
            <p class="textlargeservice "><a href="#">Ngu???n Nguy??n Li???u T????i S???ch</a></p>
            <p class="textsmallservice fontroboto">???H??nh th???c m??n ??n c?? th??? thu h??t th???c kh??ch nh??ng c??i ngon th???t s??? v???n l?? ??? ch??nh c??i ch???t, nguy??n li???u g???c c???a m??n ??n???. Kh??ng ph???i ch??? ?????i c?? h???i t??? t??m ?????n, b?? quy???t ?????nh ch??? ?????ng t??m ngu???n nguy??n li???u t??? g???c ho???c nh???ng nh?? cung c???p s???n xu???t tr???c ti???p, uy t??n. <span class="noidungan">??i???u n??y ?????m b???o gi?? th??nh ?????u v??o r??? nh??ng ch???t l?????ng lu??n ??? m???c cao nh???t v?? th???c kh??ch s??? l?? ng?????i h?????ng l???i t??? vi???c n??y. Cho d?? l??m ??i???u n??y r???t m???t th???i gian v?? v???t v??? nh??ng l?? y???u t??? quan tr???ng c???n thi???t ????? h??ng h??a ?????u v??o lu??n phong ph??, xu???t x??? ngu???n g???c r?? r??ng trong khi gi?? th??nh th?? r??? nh???t ??? m???i th???i ??i???m.</span></p>
            <div class="textsmallservice1 fontroboto"><a>Xem Th??m</a></div>  
            </div>
        
      </div>
      
    </div>
  </div>
  <!-- end service -->
  <!-- menu1 -->
  <div class="menu1">
    <div class="container">
     <div class="row">
       <div class="col-sm-8 offset-sm-2">
         <div class="contentmenu">
         <div class="contentmenu01 text-sm-center">
           <div class="textcontent01 fontdacing">C??c M??n ??n Ngon Trong Th???c ????n C???a Ch??ng T??i</div>
           <div class="textcontent02 fontroboto">Cung c???p C??c M??n ??n T????i S???ch V?? T???t Cho S???c Kh???e </div>
          </div>
         </div>
       </div>
     </div>
    </div>
  </div>
  <!-- endmenu1 -->
  <!-- menu2 -->
  <div class="menu2">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 text-sm-center">
          <div class="optionmenu fontroboto">
            <span data-meal="*"><a href="">T???t c???</a></span>
            <?php foreach ($dulieudanhmuc as $value): ?> 
        <span data-meal="<?php if($value['name']=="Th???c ????n bu???i chi???u"){echo ".dinner";} else if($value['name']=="Th???c ????n bu???i s??ng"){echo ".break";} else if($value['name']=="Th???c ????n ch??a x??c ?????nh"){echo ".lunch";} ?>"><a href=""><?= $value['name'] ?></a></span>
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
            <div class="onemeal col-sm-6 <?php if($value['tendanhmuc']=="Th???c ????n bu???i chi???u"){echo "dinner";} else if($value['tendanhmuc']=="Th???c ????n bu???i s??ng"){echo "break";} else if($value['tendanhmuc']=="Th???c ????n ch??a x??c ?????nh"){echo "lunch";} ?>">
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
                  <?= $value['discount'] ?> VND
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
  <!-- end menu2 -->
   <!-- special meal -->
   <div class="specialmeal">
    <div id="idspecialmeal" class="carousel slide" data-ride="carousel">
      <div class="container">
        <div class="row">
          
        
        <div class="carousel-inner">
          <!-- 1sline -->

        <div class="carousel-item active">
           <?php foreach ($dulieumonan1 as $value): ?>
<a href="<?php echo base_url(); ?>product/chitietmonan/<?= $value['id'] ?>" class="monan">
          <div class="contentspecial w-25">
            <img class="" src="<?= $value['image_link'] ?>" alt="First slide">
             <div class="tagnew fontroboto">New</div>
             <div class="text01 fontoswald">
               <div class="textmeal"><?= $value['name'] ?></div>
               <div class="textprice"><?= $value['discount'] ?>VND</div>
             </div>
             <div class="text02 fontroboto"><?= $value['description_short'] ?></div>
          </div></a>
          <?php endforeach ?>
          
        </div>

        <!-- end1sline -->

         <!-- 1sline -->
         <div class="carousel-item">
          <?php foreach ($dulieumonan1 as $value): ?>
<a href="<?php echo base_url(); ?>product/chitietmonan/<?= $value['id'] ?>" class="monan">
          <div class="contentspecial w-25">
            <img class="" src="<?= $value['image_link'] ?>" alt="First slide">
             <div class="tagnew fontroboto">New</div>
             <div class="text01 fontoswald">
               <div class="textmeal"><?= $value['name'] ?></div>
               <div class="textprice"><?= $value['discount'] ?>VND</div>
             </div>
             <div class="text02 fontroboto"><?= $value['description_short'] ?></div>
          </div></a>
          <?php endforeach ?>
        </div>
        <!-- end1sline -->
         <!-- 1sline -->
         <div class="carousel-item">
          <?php foreach ($dulieumonan1 as $value): ?>
<a href="<?php echo base_url(); ?>product/chitietmonan/<?= $value['id'] ?>" class="monan">
          <div class="contentspecial w-25">
            <img class="" src="<?= $value['image_link'] ?>" alt="First slide">
             <div class="tagnew fontroboto">New</div>
             <div class="text01 fontoswald">
               <div class="textmeal"><?= $value['name'] ?></div>
               <div class="textprice"><?= $value['discount'] ?>VND</div>
             </div>
             <div class="text02 fontroboto"><?= $value['description_short'] ?></div>
          </div></a>
          <?php endforeach ?>
        </div>
        <!-- end1sline -->

      </div>
      </div>
    </div>
      <a class="carousel-control-prev" href="#idspecialmeal" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#idspecialmeal" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    
   </div>
   <!-- end special meal -->
   <!-- booktable -->
   <div class="booketable">
     <div class="container">
       <div class="row">
         <div class="col-sm-8 offset-sm-2 text-sm-center text-center fontroboto">
           <div class="contentbook">
           <div class="texttable">?????t b??n</div>
           <p class="textsmall">?????t b??n ch??a bao gi??? d??? d??ng ?????n th??? v???i ?????t ch??? nh?? h??ng tr???c tuy???n mi???n ph?? v?? t???c th??, ?????t ngay b??y gi??? !!</p>
           <p class="textsmall1">Th??? hai ?????n Ch??? nh???t<span> 6:00 am - 23:00 pm </span></p>
           <div class="textsmall2">L??u ??:Nh?? h??ng kh??ng m??? c???a v??o ng??y l???.
          </div>
          <div class="textsmall3 ">0968686868</div>
        </div>
         </div>
       </div>

     </div>
   </div>
   <!-- endbooktable -->
   <!-- comment -->
   <div class="comment">
     <div class="container">
       <div class="row">
        <div id="idslinecomment" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#idslinecomment" data-slide-to="0" class="active"></li>
            <li data-target="#idslinecomment" data-slide-to="1"></li>
            <li data-target="#idslinecomment" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="contentcomment">
                <!-- <img class="d-block w-100" src="/images/comment1.jpg" alt="First slide"> -->
                <div class="textcomment fontroboto">???H??nh th???c m??n ??n c?? th??? thu h??t th???c kh??ch nh??ng c??i ngon th???t s??? v???n l?? ??? ch??nh c??i ch???t, nguy??n li???u g???c c???a m??n ??n.???</div>
                  <div class="textcomment1 fontdacing"><span>-</span>Th??ng ??i???p CEO</div>
                </div>
        
            </div>
            <div class="carousel-item">
              <div class="contentcomment">
                <!-- <img class="d-block w-100" src="/images/comment1.jpg" alt="First slide"> -->
                <div class="textcomment fontroboto">???Qu?? b???n r???n c??ng vi???c c??ng nh???ng chuy???n ??i xa v??i ng??y ???? cho t??i th???y ???????c gi?? tr??? th???c s??? c???a nh???ng b???a ??n gia ????nh kh??ng ch??? ??? c??c m??n ??n, m?? c??n l?? s??? ???m ??p, kh??ng gian, ti???ng c?????i c???a con tr??? ??? ???? l?? nh???ng ??i???u v?? gi?? m?? ai c??ng tr??n tr???ng.???</div>
                  <div class="textcomment1 fontdacing"><span>-</span>Th??ng ??i???p CEO</div>
                </div>
              
            </div>
            <div class="carousel-item">
              <div class="contentcomment">
                <!-- <img class="d-block w-100" src="/images/comment1.jpg" alt="First slide"> -->
                <div class="textcomment fontroboto">??????S??? s???ch s??? trong su???t quy tr??nh ch??? bi???n kh??ng nh???ng ?????m b???o ???????c v??? sinh an to??n th???c ph???m, mang l???i c???m gi??c an t??m cho kh??ch h??ng m?? th??ng qua ???? c??n kh???ng ?????nh ???????c uy t??n v?? s??? tin c???y c???a kh??ch h??ng ??? b???t c??? th???i ??i???m n??o???.</div>
                  <div class="textcomment1 fontdacing"><span>-</span>Th??ng ??i???p CEO</div>
                </div>
              
            </div>
            </div>
            
            </div>
          </div>
        </div>
       </div>
     </div>
   </div>
   <!-- endcomment -->
   <!-- blog -->
   <div class="blog">
     <div class="container">
       <div class="row">
         <div class="col-sm-12 text-center">
           <div class="textourblog fontdacing">Tin T???c Nh?? H??ng</div>
           <div class="textblog1 fontroboto">Tin M???i Nh???t</div>
           
         </div>
       </div>
       <div class="row">
        <div id="idslineblog" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner fontroboto">

            <!-- 1sline -->
            <div class="carousel-item active">
              <?php foreach ($dulieunewstrangchu as $key => $value): ?>
                
              <div class="contentblog w-25">
                <a style="text-decoration:none ;" href="<?php echo base_url() ?>news/loadnewschitiet/<?= $value['id'] ?>"><img class=" w-100" src="<?= $value['hinhanh'] ?>" alt="First slide"></a>
                <a style="text-decoration:none ;" href="<?php echo base_url() ?>news/loadnewschitiet/<?= $value['id'] ?>"><div class="titleblog fontoswald"><?= $value['tieude'] ?></div></a>
                <?php $time = gmdate('d/m/Y-H:i A',$value['ngaytao']);
                            ?>
                <div class="dateblog"><?= $time ?>  trong <span style="color: #feb518;"><?= $value['tendanhmuc'] ?></span></div>
                <div class="content01blog"><?= $value['mota'] ?></div>
                <div class="readmore">
                  <div class="read"><a href="<?php echo base_url() ?>news/loadnewschitiet/<?= $value['id'] ?>">Xem th??m</a></div>
                  
                  <div class="likeblog">10 l?????t th??ch</div>
                  
                </div>

              </div>
              <?php endforeach ?>
              
            </div>
            <!-- end1sline -->

            
            
          </div>
        </div>
       </div>
     </div>
   </div>
   <!-- endblog -->
   <!-- footer -->
  <?php include('footer.php') ?>
   <!-- endfooter1 -->

      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.easing.1.3.js"></script>
    <script src="<?php echo base_url(); ?>js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/isotope.pkgd.js"></script>
    <script src="<?php echo base_url(); ?>js/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>js/1.js"></script>
</body>
</html>