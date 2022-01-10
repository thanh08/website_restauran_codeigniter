<!doctype html>
<html lang="en">

<head>
    <?php foreach ($dulieutinchitiet as $key => $value): ?>
    <title><?= $value['tieude'] ?></title>
    <?php endforeach ?>

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

<div class="contentofblog singlepage">
    <div class="container">

        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="textourblog fontdacing">Tips For New Dishes</div>
                <div class="textblog1 fontroboto">Latest News</div>

            </div>
        </div>
        <!-- catalog-moblie           -->
        <div class="row">
            <div class="col-12">
                <div class="catalog-mobile fontroboto">
                    <div class="title">
                        Categories
                        <i class="fa fa-angle-right"></i>
                    </div>
                    <div class="contentcatalog">
                        <ul>
                            <?php foreach ($dulieucuadanhmuc as $key => $value): ?>
                            <a href=""><li><?= $value['tendanhmuc'] ?></li></a>
                            <?php endforeach ?>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- endcatalog-mobile -->
        <div class="row">
            <div class="col-sm-8 col-12">
                <div class="contentofblog1 singlepage">
                    <?php foreach ($dulieutinchitiet as $key => $value): ?>
                        
                    <div class="contentblog w-100 singlepage">
                        <img class=" w-100" src="<?= $value['hinhanh'] ?>" alt="First slide">
                        <div class="titleblog fontoswald"><?= $value['tieude'] ?></div>
                        <?php $time = gmdate('d/m/Y-H:i A',$value['ngaytao']);?>
                        <div class="dateblog"><span><?= $time ?></span> in <span style="color: #feb518;"><?= $value['tendanhmuc'] ?></span></div>

                        <div class="content01blog fontroboto singlepage"><?= $value['noidungtin'] ?> </div>
                    </div>
                    <?php endforeach ?>

                    
                    
                </div>
                <div class="tagblogsingle fontroboto">
                    <div class="tagblog">Tag : <span>Food, Cereals, Others</span></div>
<!--                     <div class="commentblogsingle">10 comment</div>
 -->                </div>
                <div class="newkhac mb-3">
                    <div class="card-deck" >
                        <?php foreach ($dulieutinkhac as $key => $value): ?>
                    <a href="<?php echo base_url() ?>/news/loadnewschitiet/<?= $value['id']?>">
                        <div class="card" style="flex: none; width: 250px; height: 500px;">
                            <img class="card-img-top" src="<?= $value['hinhanh'] ?>" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title"><?= $value['tieude'] ?></h4>
                                <p class="card-text"  style="font-size: 14px;font-style: italic;"><?= $value['mota'] ?></p>
                            </div>   
                                <div class="card-footer">
                                    <?php $time = gmdate('d/m/Y-H:i A',$value['ngaytao']);
                            ?>
                                    <small class="text-muted"><?= $time ?></small>
                                </div>
                            
                        </div></a>
                        <?php endforeach ?>
                        
                        
                    </div>
                </div>
               
            </div>
            <div class="col-sm-3 ml-auto">
                <div class="category">
                    <div class="titlecategory">
                        Categories
                    </div>
                    <ul>
                        <?php foreach ($dulieucuadanhmuc as $value): ?>
                        <a href="<?php echo base_url() ?>news/loadtintheodanhmuc/<?= $value['id'] ?>"><li><?= $value['tendanhmuc'] ?></li></a>                          
                        <?php endforeach ?>
                        
                    </ul>
                </div>
            </div>
        </div>


    </div>
</div>

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