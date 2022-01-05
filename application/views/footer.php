   <?php foreach ($dulieuheader as $key => $value): ?>
            <?php 
            if ($key == 'hotline') {
              $hotline=$value;
            }
            if($key == 'giomocua'){
              $giomocua=$value;
            }
            if ($key == 'diachi') {
              $diachi=$value;
            }
            if ($key == 'email') {
              $email = $value;
            }
            if ($key== 'logofooter') {
              $logofooter = $value;
            }
            if ($key=='gioithieu') {
              $gioithieu = $value;
            }

             ?>
            <?php endforeach ?>   
   <div class="footerend fontroboto">
     <div class="container">
       <div class="row">
         <div class="col-sm-3">
           <img src="<?= $logofooter ?>" alt="">
           <p class="textfooter"><?= $gioithieu ?></p>
            <p class="text1footer"><i class="fa fa-paper-plane"></i>Địa chỉ : <?= $diachi ?></p>
              <p class="text2footer"><i class="fa fa-phone"></i><span>Điện thoại : <?= $hotline['sdt'] ?></span></p>
              <p class="text3footer"><i class="fa fa-envelope"></i><span>Email : <?= $email ?></span></p>
         </div>
         <div class="col-sm-3">
           <div class="text1uselink">Google Map</div>
           <ul class="mt-2">

             <div class="mapouter"><div class="gmap_canvas"><iframe width="230" height="230" id="gmap_canvas" src="https://maps.google.com/maps?q=4/3A%20Nam%20Cao%20,T%C3%A2n%20Ph%C3%BA%20Qu%E1%BA%ADn%209&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-org.net"></a><br><style>.mapouter{position:relative;text-align:right;height:230px;width:230px;}</style><a href="https://www.embedgooglemap.net">embed google map html</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:230px;width:230px;}</style></div></div>
           </ul>

         </div>
         <div class="col-sm-2">
           <div class="blogpost">
            Tin tức gần đây
           </div>
          
           <ul>
              <?php foreach ($dulieunewstrangchu as $key => $value): ?>

            <li><?= $value['tieude'] ?></li>
              <?php endforeach ?>

          </ul>

         </div>
         <div class="col-sm-4">
          <div class="footeropenhour">
            <div class="footerhour">Giờ mở cửa</div>
            <ul>
              <li>Thứ hai — Chủ nhật  ........................ <?= $giomocua['gio'] ?>
              </li>
              <li>Lưu ý: Nhà Arctica không mở vào ngày lễ.
              </li>
            </ul>
          </div>
         </div>
       </div>
     </div>
   </div>
   <!-- endfooter -->
   <!-- foote1 -->
   <div class="footer1 fontroboto">
     <div class="container">
       <div class="row ">
         <div class="col-sm-12 text-center">
        Copyrights © 2021  All Rights Reserved.
       </div></div>
     </div>
   </div>
