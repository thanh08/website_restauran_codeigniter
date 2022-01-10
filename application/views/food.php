<!doctype html>
<html lang="en">
  <head>
    <title>Chi tiết sản phẩm</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>fonts/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>dist/jquery.toast.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>css/1.css">

  </head>
  <body>
  <!-- topheader -->
  <?php include('header.php') ?>
  
   <!-- end topheader -->
  <!-- fooddetail -->
  <div class="about">
    <div class="containaer">
      <?php foreach ($dulieumonanchitiet as $value): ?>
        
        <div class="textabout fontdacing">
             Thông Tin Chi Tiết Món Ăn        </div>
        <div class="textabout1 fontroboto">
            <?= $value['name'] ?>       </div>
      <?php endforeach ?>

    </div>
</div>
<div class="food">
    <div class="container">
      <?php foreach ($dulieumonanchitiet as $key => $value): ?>
        
        <div class="row">
            
        <div class="col-sm-6 col-12">
            <div class="imgfood">
             <img class="imgchinh" src="<?= $value['image_link'] ?>" alt="" srcset="">
      <?php endforeach ?>
               
             <div class="anhfoodnho">
             <?php foreach ($dulieuanhlist as $value): ?>

                <a href="<?= $value['image_link'] ?>" data-fancybox="nhom1"><img src="<?= $value['image_link'] ?>" alt="" ></a>
                
             <?php endforeach ?>
              
            </div>

            </div>
        </div>
      <?php foreach ($dulieumonanchitiet as $key => $value): ?>

        <div class="col-sm-6 col-12">
           <div class="textfood">
            <input type="hidden" value="<?= $value['id'] ?>" id="id">
               <div class="text01food fontoswald">
                <?= $value['name'] ?>
               </div>
               <input type="hidden" value="<?= $value['name'] ?>" id="namemon">

               <div class="review fontroboto">
                   <i class="fa f-star" aria-hidden="true"></i>
                   <i class="fa f-star" aria-hidden="true"></i>
                   <i class="fa f-star" aria-hidden="true"></i>
                   <i class="fa f-star" aria-hidden="true"></i>
                <span class="rev"></span>
                <span class="yeuthich"><i class="fa fa-heart-o" aria-hidden="true"></i>
</span>
                <div class="describe">
                <?= $value['description_short'] ?>
                    
                </div>
               <div class="cost">
                <div class="textcost fontroboto" style="font-size: small; text-decoration: line-through;
">
                <?php
                              $num = $value['price'];
                              $formattedNum = number_format($num);
                              echo $formattedNum;
                              ?> VND
                       
                   </div>
                   <div class="textcost fontroboto">
                <?php
                              $num = $value['discount'];
                              $formattedNum = number_format($num);
                              echo $formattedNum;
                              ?> VND
                       
                   </div>
                  <input type="hidden" value="<?= $value['discount'] ?>" id="discount">

               </div>
               <span class="textsoluong">Số lượng:</span>
               <input type="number" name="soluong" min="1" id="soluong" value="1" class="soluong">
               <?php if ($value['tonkho']== 0){ ?>
                                <button type="button" id="nut1" class="btn btn-warning">Thêm vào giỏ hàng</button>

               <?php } elseif ($value['tonkho']== 1) { ?>
                 <?php echo 'Hết hàng'; ?>
               <?php } ?>
               <i class="fa fa-share-alt" aria-hidden="true"></i>
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Mô tả</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Đánh giá</a>
                </li>
                
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><?= $value['description'] ?></div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <span>2 Review</span>

                  <?php foreach ($dulieudanhgia as $key => $value): ?>
                    

           <li class="list-group-item d-flex justify-content-between lh-condensed mt-2">
            <div>
              <h6 class="my-0"><?= $value['user_name'] ?></h6>
              <small class="text-muted"><?= $value['comment'] ?></small>
            </div>
            <span class="text-muted"></span>
          </li>


                  <?php endforeach ?>






        </div>
              </div>

               </div>
               
           </div>
        </div>
    </div>

      <?php endforeach ?>

</div>

</div>
  <div class="container">
     <div class="textrealeated text-center fontroboto">
        Những Món Ăn Tương Tự
     </div>
  </div>
  <!-- endfooddeail -->
     <!-- food Realeated  -->
     <div class="specialmeal">
      <div id="idspecialmeal" class="carousel slide" data-ride="carousel">
        <div class="container">
          <div class="row">
          <div class="carousel-inner">
            <!-- 1sline -->
            <?php foreach ($dulieumonankhac as $key => $value): ?>
              
          <div class="carousel-item active">
            <div class="contentspecial w-25">
              <img class="" src="<?= $value['image_link'] ?>" alt="First slide">
               <div class="tagnew fontroboto">New</div>
               <div class="text01 fontoswald">
                 <div class="textmeal"><?= $value['name'] ?></div>
                 <div class="textprice"><?php
                              $num = $value['discount'];
                              $formattedNum = number_format($num);
                              echo $formattedNum;
                              ?>
 VND</div>
               </div>
               <div class="text02 fontroboto"><?= $value['description_short'] ?></div>
            </div>
            
            
          </div>
            <?php endforeach ?>

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
  <!-- endfoodReleated -->
  <!-- footer -->
  <?php include('footer.php') ?>
   <!-- endfooter1 -->
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="<?php echo base_url() ?>js/jquery.js"></script>
   <script src="<?php echo base_url() ?>js/popper.min.js"></script>
   <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
   <script src="<?php echo base_url() ?>js/isotope.pkgd.js"></script>
   <script src="<?php echo base_url() ?>js/jquery.easing.1.3.js"></script>
   <script src="<?php echo base_url() ?>js/jquery.fancybox.min.js"></script>
       <script src="<?php echo base_url() ?>dist/jquery.toast.min.js"></script>

   <script src="<?php echo base_url() ?>js/1.js"></script>
   <script>
    $(function () {
      duongdan='<?php echo base_url(); ?>';
      //phần thêm sp vao gio hang bằng ajax
      $('#nut1').click(function () {
        $.toast({
    heading: 'Thành công',
    text: 'Bạn đã thêm món thành công vào giỏ hàng!',
    showHideTransition: 'slide',
        position: 'top-right',

    icon: 'success'
})
        $.ajax({
          url: duongdan+'Cart/add',
          type: 'post',
          dataType: 'json',
          data: {id:$('#id').val(),
          namemon:$('#namemon').val(),
          soluong:$('#soluong').val(),
          discount:$('#discount').val(),

        },
        })
        .done(function() {
          //console.log("success");
          
        })
        .fail(function() {
          //console.log("error");
        })
        .always(function(res) {
          //console.log(res);
          
          
        });
        
      });


      
      //them sp yeu thich
      $('.yeuthich').click(function () {
        $.toast({
    heading: 'Thành công',
    text: 'Bạn đã thêm thành công món ăn vào mục yêu thích!',
    showHideTransition: 'slide',
        position: 'top-right',

    icon: 'success'
})
        $(this).children().css("color", "red");
        $.ajax({
          url: duongdan+'Cart/addfavorite',
          type: 'post',
          dataType: 'json',
          data: {id_product:$('#id').val(),
          id_user:$('#idnguoidung').val()

        },
        })
        .done(function() {
          //console.log("success");
          

          
        })
        .fail(function() {
          //console.log("error");
        })
        .always(function(res) {
          //console.log(res);
          
          
        });
        
      });

    
     
      
    
});
   </script>


 </body>
</html>