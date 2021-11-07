<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
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
<!-- <div class="topheader">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-md-7">
                <div class="mangxahoi float-sm-left ">
                    <a href=""><i class="fa fa-facebook-f    "></i></a>
                    <a href=""><i class="fa fa-twitter    "></i></a>
                    <a href=""><i class="fa fa-skyatlas    "></i></a>
                    <a href=""><i class="fa fa-tumblr"></i></a>
                </div>
                <div class="datban">
                    Call for reservation: +011 29 345 678
                </div>
            </div>
            <div class="col-sm-5 col-md-5">
                <div class="openhour datban float-sm-right">
                    Opening Hours : 9:00am - 10:00pm
                </div>
            </div>
        </div>
    </div>
</div> -->
  <?php include('header.php') ?>

<!-- end topheader -->
<!-- menuandlogo -->
<div class="menuandlogo fontroboto">

    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="../images/images/logo_29.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo base_url() ?>">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Menu</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url(); ?>news">New</a>
                    </li>
                   <!--  <li class="nav-item">
                        <a class="nav-link" href="#">Shop</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>contact">Contact Us</a>
                    </li>
                    <li class="nav-item nutdb">
                        <a class="nav-link btn-warning nutdatban" href="#">Reservation</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- endmenuandlogo -->
<div class="contentofblog">
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
                            <a href="<?php echo base_url() ?>news/loadtintheodanhmuc/<?= $value['id'] ?>"><li><?= $value['tendanhmuc'] ?></li></a>
                            <?php endforeach ?>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- endcatalog-mobile -->
        <div class="row">
            <div class="col-sm-8 col-12">
                <div class="contentofblog1">
                    <?php foreach ($dulieuloadnews as $key => $value): ?>

                    <div class="contentblog w-100">

                        <a href="<?php echo base_url() ?>news/loadnewschitiet/<?= $value['id'] ?>"><img class=" w-100" src="<?= $value['hinhanh'] ?>" alt="First slide"></a>
                        <a href="<?php echo base_url() ?>news/loadnewschitiet/<?= $value['id'] ?>"><div class="titleblog fontoswald"><?= $value['tieude'] ?></div></a>
                        <?php $time = gmdate('d/m/Y-H:i A',$value['ngaytao']);
                            ?>
                        <div class="dateblog"><span><?= $time ?></span> in <span style="color: #feb518;"><?= $value['tendanhmuc'] ?></span></div>
                        <div class="content01blog"><?= $value['mota'] ?></div>
                        <div class="readmore fontroboto">
                            <div class="read"><a href="<?php echo base_url() ?>news/loadnewschitiet/<?= $value['id'] ?>">Read more</a></div>

                            <div class="likeblog">10 like</div>

                        </div>

                    </div>

                    <?php endforeach ?>
                    
                </div>
                <div class="row">
                    <nav aria-label="Page navigation example" class="chonpage justify-content-center">
                        <ul class="pagination ">
                            <?php $uri=$_SERVER['REQUEST_URI']; 
                                    $uri=explode('/', $uri);
                                    $tranghientai=end($uri);

                            ?>
                            <li class="page-item <?php if($tranghientai == 1){echo "d-none";}?> ">
                                <?php if ($tranghientai== 'news') {?>
                                <a class="page-link" href="<?php echo base_url(); ?>news/page/" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                                </a>
                                <?php } ?>
                                <?php if ($tranghientai!= 'news') {?>
                                <a class="page-link" href="<?php echo base_url(); ?>news/page/<?= $tranghientai - 1 ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                                </a>
                                <?php } ?>    
                                
                            </li>
                            
                            <?php for ($i = 0; $i < $dulieusotrang ; $i++) {?>
                            <li class="page-item"><a class="page-link <?php if($i+1 == $tranghientai){echo"activepage";} ?> " href="<?php echo base_url(); ?>news/page/<?= $i+1 ?>"><?= $i+1 ?></a></li>
                            <?php } ?>


                             
                            <li class="page-item <?php if($dulieusotrang == $tranghientai){echo "d-none";}?>">
                                <?php if ($tranghientai=='news') {?>
                                <a class="page-link" href="<?php echo base_url(); ?>news/page/" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                                <?php } ?>
                                <?php if ($tranghientai!='news') {?>
                                <a class="page-link" href="<?php echo base_url(); ?>news/page/<?= $tranghientai + 1 ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                                <?php } ?>
                                
                            </li>

                
                            

                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-sm-3 ml-auto">
                <div class="category">
                    <div class="titlecategory">
                        Categories
                    </div>
                    <ul>
                        <?php foreach ($dulieucuadanhmuc as $key => $value): ?>
                        <a href="<?php echo base_url() ?>news/loadtintheodanhmuc/<?= $value['id'] ?>"><li><?= $value['tendanhmuc'] ?></li></a>
                        <?php endforeach ?>
                        
                    </ul>
                </div>
            </div>
        </div>


    </div>
</div>

<!-- footer -->
<div class="footerend fontroboto">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <img src="images/logofooter_22.png" alt="">
                <p class="textfooter">Marsh mallow muffin soufflé jelly-o tart cake Marshmallow macaroon jelly jubes dont tiramisu croissant cake.</p>
                <p class="text1footer"><i class="fa fa-paper-plane"></i>Address : 44 New Design Street, Melbourne 005</p>
                <p class="text2footer"><i class="fa fa-phone"></i><span>Phone : (01) 800 433 633</span></p>
                <p class="text3footer"><i class="fa fa-envelope"></i><span>Email : info@Example.com</span></p>
            </div>
            <div class="col-sm-2">
                <div class="text1uselink">usefull links</div>
                <ul>
                    <li>Reservation</li>
                    <li>Reservation</li>
                    <li>Reservation</li>
                    <li>Reservation</li>
                    <li>Reservation</li>
                    <li>Reservation</li>

                </ul>

            </div>
            <div class="col-sm-2">
                <div class="blogpost">
                    Latest Blog Post
                </div>
                <ul>
                    <li>Reservation</li>
                    <li>Reservation</li>
                    <li>Reservation</li>
                    <li>Reservation</li>
                    <li>Reservation</li>
                    <li>Reservation</li>

                </ul>

            </div>
            <div class="col-sm-4">
                <div class="footeropenhour">
                    <div class="footerhour">Opening Hours</div>
                    <ul>
                        <li>Mon — Fri ........................ 9:00 am - 23:00 pm
                        </li>
                        <li>Mon — Fri ........................ 9:00 am - 23:00 pm
                        </li>
                        <li>Mon — Fri ........................ 9:00 am - 23:00 pm
                        </li>
                        <li>Note: Arctica Restaurant is closed on holidays.
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
                Copyrights © 2015 All Rights Reserved.
            </div>
        </div>
    </div>
</div>
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