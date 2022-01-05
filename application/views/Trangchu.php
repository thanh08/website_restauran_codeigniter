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
            <p class="textlargeservice"><a href="#">Câu Chuyện Về Nhà Hàng Chúng Tôi</a></p>
            <p class="textsmallservice fontroboto">Dân sành ẩm thực đang “kháo” nhau là muốn ăn hải sản, đặc sản ngon tại Nhà hàng Arctica. Hãy đến nhà hàng Arctica để tìm được địa chỉ ăn ngon, giá phải chăng, cảnh quan đẹp, an toàn sức khỏe cũng khó như “mò kim đáy bể” trong vô vàn quán ăn, nhà hàng hiện nay.<span class="noidungan">  Thường cảnh đẹp thì thức ăn không vừa ý, giá đắt hoặc ngược lại; chứ để đủ các ưu điểm “4 trong 1” như trên trong một nhà hàng thì rất hiếm.</span></p>
            <div class="textsmallservice1 fontroboto"><a>Xem Thêm</a></div>  
            </div>
            <div class="col-sm-4 text-sm-center">
            <a href="" class="imgservice"> <img src="images/img_service03_05.png" alt=""></a>
            <p class="textlargeservice"><a href="#">Thông Tin Về Đầu Bếp Của Chúng Tôi</a></p>
            <p class="textsmallservice fontroboto">Với phương châm "Hãy nấu như nấu cho người mình yêu thương nhất", chúng tôi luôn mong muốn mang đến cho quý khách những giây phút thư giãn để thưởng thức những món ăn ngon bên gia đình, bạn bè, đồng nghiệp và người thân.Những đầu bếp của chúng tôi có kinh nghiệm và am hiểu ẩm thực.<span class="noidungan">  Thường cảnh đẹp thì thức ăn không vừa ý, giá đắt hoặc ngược lại; chứ để đủ các ưu điểm “4 trong 1” như trên trong một nhà hàng thì rất hiếm.</span></p>
            <div class="textsmallservice1 fontroboto"><a>Xem Thêm</a></div>  
            </div>
            <div class="col-sm-4 text-sm-center">
            <a href="" class="imgservice" > <img src="images/img_service_05.png" alt=""></a>
            <p class="textlargeservice "><a href="#">Nguồn Nguyên Liệu Tươi Sạch</a></p>
            <p class="textsmallservice fontroboto">“Hình thức món ăn có thể thu hút thực khách nhưng cái ngon thật sự vẫn là ở chính cái chất, nguyên liệu gốc của món ăn”. Không phải chờ đợi cơ hội tự tìm đến, bà quyết định chủ động tìm nguồn nguyên liệu từ gốc hoặc những nhà cung cấp sản xuất trực tiếp, uy tín. <span class="noidungan">Điều này đảm bảo giá thành đầu vào rẻ nhưng chất lượng luôn ở mức cao nhất và thực khách sẽ là người hưởng lợi từ việc này. Cho dù làm điều này rất mất thời gian và vất vả nhưng là yếu tố quan trọng cần thiết để hàng hóa đầu vào luôn phong phú, xuất xứ nguồn gốc rõ ràng trong khi giá thành thì rẻ nhất ở mọi thời điểm.</span></p>
            <div class="textsmallservice1 fontroboto"><a>Xem Thêm</a></div>  
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
           <div class="textcontent01 fontdacing">Các Món Ăn Ngon Trong Thực Đơn Của Chúng Tôi</div>
           <div class="textcontent02 fontroboto">Cung cấp Các Món Ăn Tươi Sạch Và Tốt Cho Sức Khỏe </div>
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
           <div class="texttable">Đặt bàn</div>
           <p class="textsmall">Đặt bàn chưa bao giờ dễ dàng đến thế với đặt chỗ nhà hàng trực tuyến miễn phí và tức thì, đặt ngay bây giờ !!</p>
           <p class="textsmall1">Thứ hai đến Chủ nhật<span> 6:00 am - 23:00 pm </span></p>
           <div class="textsmall2">Lưu ý:Nhà hàng không mở cửa vào ngày lễ.
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
                <div class="textcomment fontroboto">“Hình thức món ăn có thể thu hút thực khách nhưng cái ngon thật sự vẫn là ở chính cái chất, nguyên liệu gốc của món ăn.”</div>
                  <div class="textcomment1 fontdacing"><span>-</span>Thông điệp CEO</div>
                </div>
        
            </div>
            <div class="carousel-item">
              <div class="contentcomment">
                <!-- <img class="d-block w-100" src="/images/comment1.jpg" alt="First slide"> -->
                <div class="textcomment fontroboto">“Quá bận rộn công việc cùng những chuyến đi xa vài ngày đã cho tôi thấy được giá trị thực sự của những bữa ăn gia đình không chỉ ở các món ăn, mà còn là sự ấm áp, không gian, tiếng cười của con trẻ – đó là những điều vô giá mà ai cũng trân trọng.”</div>
                  <div class="textcomment1 fontdacing"><span>-</span>Thông điệp CEO</div>
                </div>
              
            </div>
            <div class="carousel-item">
              <div class="contentcomment">
                <!-- <img class="d-block w-100" src="/images/comment1.jpg" alt="First slide"> -->
                <div class="textcomment fontroboto">““Sự sạch sẽ trong suốt quy trình chế biến không những đảm bảo được vệ sinh an toàn thực phẩm, mang lại cảm giác an tâm cho khách hàng mà thông qua đó còn khẳng định được uy tín và sự tin cậy của khách hàng ở bất cứ thời điểm nào”.</div>
                  <div class="textcomment1 fontdacing"><span>-</span>Thông điệp CEO</div>
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
           <div class="textourblog fontdacing">Tin Tức Nhà Hàng</div>
           <div class="textblog1 fontroboto">Tin Mới Nhất</div>
           
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
                  <div class="read"><a href="<?php echo base_url() ?>news/loadnewschitiet/<?= $value['id'] ?>">Xem thêm</a></div>
                  
                  <div class="likeblog">10 lượt thích</div>
                  
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