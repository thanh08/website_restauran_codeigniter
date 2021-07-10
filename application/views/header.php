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
<div class="topheader">
    <div class="container">
    <div class="row">
       <div class="col-sm-7 col-md-7">
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
       <div class="col-sm-5 col-md-5">
         <div class="openhour datban float-sm-right">
          <?= $giomocua['text'] ?> : <?= $giomocua['gio'] ?>
         </div>
       </div>
    </div>
    </div>
  </div>