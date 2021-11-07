<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
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
   
   <!-- menuandlogo -->
  <div class="menuandlogo fontroboto">
    
      <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
        <a class="navbar-brand" href="#"><img src="<?= $logo ?>" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url() ?>">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>news">New</a>
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
            <p class="textlargeservice"><a href="">Our Restaruant Story</a></p>
            <p class="textsmallservice fontroboto">Sed ut perspiciatis unde omnis iste natus errorsit voluptatem accusantium doloremque laudantium thes hatles tooest surf totam rem aperiam.</p>
            <div class="textsmallservice1 fontroboto"><a href="">Read More</a></div>  
            </div>
            <div class="col-sm-4 text-sm-center">
            <a href="" class="imgservice"> <img src="images/img_service03_05.png" alt=""></a>
            <p class="textlargeservice"><a href="">About Our Master Chefs</a></p>
            <p class="textsmallservice fontroboto">Sed ut perspiciatis unde omnis iste natus errorsit voluptatem accusantium doloremque laudantium thes hatles tooest surf totam rem aperiam.</p>
            <div class="textsmallservice1 fontroboto"><a href="">Read More</a></div>  
            </div>
            <div class="col-sm-4 text-sm-center">
            <a href="" class="imgservice" > <img src="images/img_service_05.png" alt=""></a>
            <p class="textlargeservice "><a href="">Check Our Sweet Courses</a></p>
            <p class="textsmallservice fontroboto">Sed ut perspiciatis unde omnis iste natus errorsit voluptatem accusantium doloremque laudantium thes hatles tooest surf totam rem aperiam.</p>
            <div class="textsmallservice1 fontroboto"><a href="">Read More</a></div>  
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
           <div class="textcontent01 fontdacing">Our Delicious Menu Items</div>
           <div class="textcontent02 fontroboto">Fresh And Healthy Food Available</div>
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
            <span data-meal="*"><a href="">All</a></span>
            <span data-meal=".break"><a href="">Break Fast</a></span>
            <span data-meal=".lunch"><a href="">Lunch</a></span>
            <span data-meal=".dinner"><a href="">Dinner</a></span>
          </div>
        </div>
      </div>
       <div class="row ">
         <div class="col-12 col-sm-6 allmeal ">
           <!-- 1mon -->
           <div class="row mot break">
            <div class="onemeal  ">
             <div class="col-3 col-sm-2 imgmeal">
               <div class="tagmeal fontroboto">New</div>
               <img src="images/meal_menu01_32.png" alt="">
               
             </div>
             <div class="col-9 col-sm-10">
               <div class="namemenu2 fontoswald">
                 <div class="text">Gosh Egg-White Omelet </div>
                 <div class="number">
                  $25.40
                 </div>
               </div>
               <div class="contentmenu2 fontroboto">
                 <div class="textcontent1">Mussel with tomato sauce, wine</div>
               </div>
                 
             </div>
            </div>
           </div>
           <!-- end1mon -->
           <!-- 1mon -->
           <div class="row mot lunch">
            <div class="onemeal  ">
             <div class="col-3 col-sm-2 imgmeal">
               <div class="tagmeal fontroboto">New</div>
               <img src="images/meal_menu01_32.png" alt="">
               
             </div>
             <div class="col-9 col-sm-10">
               <div class="namemenu2 fontoswald">
                 <div class="text">Gosh Egg-White Omelet </div>
                 <div class="number">
                  $25.40
                 </div>
               </div>
               <div class="contentmenu2 fontroboto">
                 <div class="textcontent1">Mussel with tomato sauce, wine</div>
               </div>
                 
             </div>
            </div>
           </div>
           <!-- end1mon -->
           <!-- 1mon -->
           <div class="row mot dinner">
            <div class="onemeal  ">
             <div class="col-3 col-sm-2 imgmeal">
               <div class="tagmeal fontroboto">New</div>
               <img src="images/meal_menu01_32.png" alt="">
               
             </div>
             <div class="col-9 col-sm-10">
               <div class="namemenu2 fontoswald">
                 <div class="text">Gosh Egg-White Omelet </div>
                 <div class="number">
                  $25.40
                 </div>
               </div>
               <div class="contentmenu2 fontroboto">
                 <div class="textcontent1">Mussel with tomato sauce, wine</div>
               </div>
                 
             </div>
            </div>
           </div>
           <!-- end1mon -->
           <!-- 1mon -->
           <div class="row mot">
            <div class="onemeal ">
             <div class="col-3 col-sm-2 imgmeal">
               <div class="tagmeal fontroboto">New</div>
               <img src="images/meal_menu01_32.png" alt="">
               
             </div>
             <div class="col-9 col-sm-10">
               <div class="namemenu2 fontoswald">
                 <div class="text">Gosh Egg-White Omelet </div>
                 <div class="number">
                  $25.40
                 </div>
               </div>
               <div class="contentmenu2 fontroboto">
                 <div class="textcontent1">Mussel with tomato sauce, wine</div>
               </div>
                 
             </div>
            </div>
           </div>
           <!-- end1mon -->
          </div>
         <div class="col-12 col-sm-6 allmeal">
          <!-- 1mon -->
          <div class="row mot">
            <div class="onemeal  ">
             <div class="col-3 col-sm-2 imgmeal">
               <div class="tagmeal fontroboto">New</div>
               <img src="images/meal_menu01_32.png" alt="">
               
             </div>
             <div class="col-9 col-sm-10">
               <div class="namemenu2 fontoswald">
                 <div class="text">Gosh Egg-White Omelet </div>
                 <div class="number">
                  $25.40
                 </div>
               </div>
               <div class="contentmenu2 fontroboto">
                 <div class="textcontent1">Mussel with tomato sauce, wine</div>
               </div>
                 
             </div>
            </div>
           </div>
           <!-- end1mon -->
           <!-- 1mon -->
           <div class="row mot">
            <div class="onemeal  ">
             <div class="col-3 col-sm-2 imgmeal">
               <div class="tagmeal fontroboto">New</div>
               <img src="images/meal_menu01_32.png" alt="">
               
             </div>
             <div class="col-9 col-sm-10">
               <div class="namemenu2 fontoswald">
                 <div class="text">Gosh Egg-White Omelet </div>
                 <div class="number">
                  $25.40
                 </div>
               </div>
               <div class="contentmenu2 fontroboto">
                 <div class="textcontent1">Mussel with tomato sauce, wine</div>
               </div>
                 
             </div>
            </div>
           </div>
           <!-- end1mon -->
           <!-- 1mon -->
           <div class="row mot">
            <div class="onemeal  ">
             <div class="col-3 col-sm-2 imgmeal">
               <div class="tagmeal fontroboto">New</div>
               <img src="images/meal_menu01_32.png" alt="">
               
             </div>
             <div class="col-9 col-sm-10">
               <div class="namemenu2 fontoswald">
                 <div class="text">Gosh Egg-White Omelet </div>
                 <div class="number">
                  $25.40
                 </div>
               </div>
               <div class="contentmenu2 fontroboto">
                 <div class="textcontent1">Mussel with tomato sauce, wine</div>
               </div>
                 
             </div>
            </div>
           </div>
           <!-- end1mon -->
           <!-- 1mon -->
           <div class="row mot">
            <div class="onemeal  ">
             <div class="col-3 col-sm-2 imgmeal">
               <div class="tagmeal fontroboto">New</div>
               <img src="images/meal_menu01_32.png" alt="">
               
             </div>
             <div class="col-9 col-sm-10">
               <div class="namemenu2 fontoswald">
                 <div class="text">Gosh Egg-White Omelet </div>
                 <div class="number">
                  $25.40
                 </div>
               </div>
               <div class="contentmenu2 fontroboto">
                 <div class="textcontent1">Mussel with tomato sauce, wine</div>
               </div>
                 
             </div>
            </div>
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
          <div class="contentspecial w-25">
            <img class="" src="images/special_meal_48.png" alt="First slide">
             <div class="tagnew fontroboto">New</div>
             <div class="text01 fontoswald">
               <div class="textmeal">Cabernet Sauvignon</div>
               <div class="textprice">$155</div>
             </div>
             <div class="text02 fontroboto">Mussel with tomato sauce, wine</div>
          </div>
          <div class="contentspecial w-25">
            <img class="" src="images/special_meal_48.png" alt="First slide">
             <div class="tagnew fontroboto">New</div>
             <div class="text01 fontoswald">
               <div class="textmeal">Cabernet Sauvignon</div>
               <div class="textprice">$155</div>
             </div>
             <div class="text02 fontroboto">Mussel with tomato sauce, wine</div>
          </div>
          <div class="contentspecial w-25">
            <img class="" src="images/special_meal_48.png" alt="First slide">
             <div class="tagnew fontroboto">New</div>
             <div class="text01 fontoswald">
               <div class="textmeal">Cabernet Sauvignon</div>
               <div class="textprice">$155</div>
             </div>
             <div class="text02 fontroboto">Mussel with tomato sauce, wine</div>
          </div>
          <div class="contentspecial w-25">
            <img class="" src="images/special_meal_48.png" alt="First slide">
             <div class="tagnew fontroboto">New</div>
             <div class="text01 fontoswald">
               <div class="textmeal">Cabernet Sauvignon</div>
               <div class="textprice">$155</div>
             </div>
             <div class="text02 fontroboto">Mussel with tomato sauce, wine</div>
          </div>
          
        </div>
        <!-- end1sline -->

         <!-- 1sline -->
         <div class="carousel-item">
          <div class="contentspecial w-25">
            <img class="" src="images/special_meal_48.png" alt="First slide">
             <div class="tagnew fontroboto">New</div>
             <div class="text01 fontoswald">
               <div class="textmeal">Cabernet Sauvignon</div>
               <div class="textprice">$155</div>
             </div>
             <div class="text02 fontroboto">Mussel with tomato sauce, wine</div>
          </div>
          <div class="contentspecial w-25">
            <img class="" src="images/special_meal_48.png" alt="First slide">
             <div class="tagnew fontroboto">New</div>
             <div class="text01 fontoswald">
               <div class="textmeal">Cabernet Sauvignon</div>
               <div class="textprice">$155</div>
             </div>
             <div class="text02 fontroboto">Mussel with tomato sauce, wine</div>
          </div>
          <div class="contentspecial w-25">
            <img class="" src="images/special_meal_48.png" alt="First slide">
             <div class="tagnew fontroboto">New</div>
             <div class="text01 fontoswald">
               <div class="textmeal">Cabernet Sauvignon</div>
               <div class="textprice">$155</div>
             </div>
             <div class="text02 fontroboto">Mussel with tomato sauce, wine</div>
          </div>
          <div class="contentspecial w-25">
            <img class="" src="images/special_meal_48.png" alt="First slide">
             <div class="tagnew fontroboto">New</div>
             <div class="text01 fontoswald">
               <div class="textmeal">Cabernet Sauvignon</div>
               <div class="textprice">$155</div>
             </div>
             <div class="text02 fontroboto">Mussel with tomato sauce, wine</div>
          </div>
          
        </div>
        <!-- end1sline -->
         <!-- 1sline -->
         <div class="carousel-item">
          <div class="contentspecial w-25">
            <img class="" src="images/special_meal_48.png" alt="First slide">
             <div class="tagnew fontroboto">New</div>
             <div class="text01 fontoswald">
               <div class="textmeal">Cabernet Sauvignon</div>
               <div class="textprice">$155</div>
             </div>
             <div class="text02 fontroboto">Mussel with tomato sauce, wine</div>
          </div>
          <div class="contentspecial w-25">
            <img class="" src="images/special_meal_48.png" alt="First slide">
             <div class="tagnew fontroboto">New</div>
             <div class="text01 fontoswald">
               <div class="textmeal">Cabernet Sauvignon</div>
               <div class="textprice">$155</div>
             </div>
             <div class="text02 fontroboto">Mussel with tomato sauce, wine</div>
          </div>
          <div class="contentspecial w-25">
            <img class="" src="images/special_meal_48.png" alt="First slide">
             <div class="tagnew fontroboto">New</div>
             <div class="text01 fontoswald">
               <div class="textmeal">Cabernet Sauvignon</div>
               <div class="textprice">$155</div>
             </div>
             <div class="text02 fontroboto">Mussel with tomato sauce, wine</div>
          </div>
          <div class="contentspecial w-25">
            <img class="" src="images/special_meal_48.png" alt="First slide">
             <div class="tagnew fontroboto">New</div>
             <div class="text01 fontoswald">
               <div class="textmeal">Cabernet Sauvignon</div>
               <div class="textprice">$155</div>
             </div>
             <div class="text02 fontroboto">Mussel with tomato sauce, wine</div>
          </div>
          
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
           <div class="texttable">Make A Reservation</div>
           <p class="textsmall">Booking a table has never been so easy with free & instant online restaurant reservations, booking now!!</p>
           <p class="textsmall1">Monday to Friday<span> 9:00 am - 23:00 pm </span>Saturday to Sunday <span>10:00 am - 22:00 pm</span></p>
           <div class="textsmall2">Note: Arctica Restaurant is closed on holidays.
          </div>
          <div class="textsmall3 ">0844.335.1211</div>
        </div>
        <hr>
         </div>
       </div>


       <form action="<?php echo base_url(); ?>home/getdatabook" method="post" enctype="multipart/form-data">
       <div class="row fontroboto">
         <div class="col-sm-12 text-sm-center fontroboto">
           <p class="text1booktable">Book Your Table Online</p>
           </div>

           
         <div class="col-sm-4">
           <div class="form-group">
             <input type="text" name="ten" id="" class="form-control" placeholder="Your Name *" >
           </div>
           <div class="form-group">
            <input type="date" name="ngay" id="" class="form-control" placeholder="Date *">
          </div>
         </div>
         <div class="col-sm-4">
          <div class="form-group">
            <input type="email" name="email" id="" class="form-control" placeholder="Your Email *">
          </div>
          <div class="form-group">
            <input type="time" name="gio" id="" class="form-control" placeholder="Time *">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <input type="tel" name="sdt" pattern="[0-9]{1,11}" id="" class="form-control" placeholder="Mobile Number">
          </div>
          <div class="form-group">
            <input type="number" name="songuoi" id="" class="form-control" placeholder="No. of Persons *">
          </div>
        </div>
        <div class="col-sm-12 text-sm-center">
          <input type="submit" value="BOOK NOW" class="btn-warning submitbook fontroboto">
        </div>
       </div>
     </form>


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
                <div class="textcomment fontroboto">“ We enjoy sharing the projects and posts we make just as much as we enjoy creating them.
                  consectetur adipiscing elit, sed do eiusmod tempor incididunt Sit back & take a moment to browse through some of our recent completed work.”</div>
                  <div class="textcomment1 fontdacing"><span>-</span>Jhon Smith</div>
                </div>
        
            </div>
            <div class="carousel-item">
              <div class="contentcomment">
                <!-- <img class="d-block w-100" src="/images/comment1.jpg" alt="First slide"> -->
                <div class="textcomment fontroboto">“ We enjoy sharing the projects and posts we make just as much as we enjoy creating them.
                  consectetur adipiscing elit, sed do eiusmod tempor incididunt Sit back & take a moment to browse through some of our recent completed work.”</div>
                  <div class="textcomment1 fontdacing"><span>-</span>Jhon Smith</div>
                </div>
              
            </div>
            </div>
            <div class="carousel-item">
              <div class="contentcomment">
                <!-- <img class="d-block w-100" src="/images/comment1.jpg" alt="First slide"> -->
                <div class="textcomment fontroboto">“ We enjoy sharing the projects and posts we make just as much as we enjoy creating them.
                  consectetur adipiscing elit, sed do eiusmod tempor incididunt Sit back & take a moment to browse through some of our recent completed work.”</div>
                  <div class="textcomment1 fontdacing"><span>-</span>Jhon Smith</div>
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
           <div class="textourblog fontdacing">Our Blog</div>
           <div class="textblog1 fontroboto">Latest New Updates</div>
           
         </div>
       </div>
       <div class="row">
        <div id="idslineblog" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner fontroboto">
            <!-- 1sline -->
            <div class="carousel-item active">
              <div class="contentblog w-25">
                <img class=" w-100" src="images/blog01_94.png" alt="First slide">
                <div class="titleblog fontoswald">Ingredients For Cooking Pasta </div>
                <div class="dateblog">10 June 2016  by Peter Parker</div>
                <div class="content01blog">Curabitur quas nets lacusets nulat iaculis loremis etis nisle varius vitae seditum fugiatum ligul aliquam qui sequi nets lacusets nulat </div>
                <div class="readmore">
                  <div class="read"><a href="">Read more</a></div>
                  
                  <div class="likeblog">10 like</div>
                  
                </div>

              </div>
              <div class="contentblog w-25">
                <img class=" w-100" src="images/blog01_94.png" alt="First slide">
                <div class="titleblog fontoswald">Ingredients For Cooking Pasta </div>
                <div class="dateblog">10 June 2016  by Peter Parker</div>
                <div class="content01blog">Curabitur quas nets lacusets nulat iaculis loremis etis nisle varius vitae seditum fugiatum ligul aliquam qui sequi nets lacusets nulat </div>
                <div class="readmore">
                  <div class="read"><a href="">Read more</a></div>
                  
                  <div class="likeblog">10 like</div>
                  
                </div>

              </div>
              <div class="contentblog w-25">
                <img class=" w-100" src="images/blog01_94.png" alt="First slide">
                <div class="titleblog fontoswald">Ingredients For Cooking Pasta </div>
                <div class="dateblog">10 June 2016  by Peter Parker</div>
                <div class="content01blog">Curabitur quas nets lacusets nulat iaculis loremis etis nisle varius vitae seditum fugiatum ligul aliquam qui sequi nets lacusets nulat </div>
                <div class="readmore">
                  <div class="read"><a href="">Read more</a></div>
                  
                  <div class="likeblog">10 like</div>
                  
                </div>

              </div>
              <div class="contentblog w-25">
                <img class=" w-100" src="images/blog01_94.png" alt="First slide">
                <div class="titleblog fontoswald">Ingredients For Cooking Pasta </div>
                <div class="dateblog">10 June 2016  by Peter Parker</div>
                <div class="content01blog">Curabitur quas nets lacusets nulat iaculis loremis etis nisle varius vitae seditum fugiatum ligul aliquam qui sequi nets lacusets nulat </div>
                <div class="readmore">
                  <div class="read"><a href="">Read more</a></div>
                  
                  <div class="likeblog">10 like</div>
                  
                </div>

              </div>
              
            </div>
            <!-- end1sline -->
            <!-- sline -->
            <div class="carousel-item">
              <div class="contentblog w-25">
                <img class=" w-100" src="images/blog01_94.png" alt="First slide">
                <div class="titleblog fontoswald">Ingredients For Cooking Pasta </div>
                <div class="dateblog">10 June 2016  by Peter Parker</div>
                <div class="content01blog">Curabitur quas nets lacusets nulat iaculis loremis etis nisle varius vitae seditum fugiatum ligul aliquam qui sequi nets lacusets nulat </div>
                <div class="readmore">
                  <div class="read"><a href="">Read more</a></div>
                  
                  <div class="likeblog">10 like</div>
                  
                </div>

              </div>
              <div class="contentblog w-25">
                <img class=" w-100" src="images/blog01_94.png" alt="First slide">
                <div class="titleblog fontoswald">Ingredients For Cooking Pasta </div>
                <div class="dateblog">10 June 2016  by Peter Parker</div>
                <div class="content01blog">Curabitur quas nets lacusets nulat iaculis loremis etis nisle varius vitae seditum fugiatum ligul aliquam qui sequi nets lacusets nulat </div>
                <div class="readmore">
                  <div class="read"><a href="">Read more</a></div>
                  
                  <div class="likeblog">10 like</div>
                  
                </div>

              </div>
              <div class="contentblog w-25">
                <img class=" w-100" src="images/blog01_94.png" alt="First slide">
                <div class="titleblog fontoswald">Ingredients For Cooking Pasta </div>
                <div class="dateblog">10 June 2016  by Peter Parker</div>
                <div class="content01blog">Curabitur quas nets lacusets nulat iaculis loremis etis nisle varius vitae seditum fugiatum ligul aliquam qui sequi nets lacusets nulat </div>
                <div class="readmore">
                  <div class="read"><a href="">Read more</a></div>
                  
                  <div class="likeblog">10 like</div>
                  
                </div>

              </div>
              <div class="contentblog w-25">
                <img class=" w-100" src="images/blog01_94.png" alt="First slide">
                <div class="titleblog fontoswald">Ingredients For Cooking Pasta </div>
                <div class="dateblog">10 June 2016  by Peter Parker</div>
                <div class="content01blog">Curabitur quas nets lacusets nulat iaculis loremis etis nisle varius vitae seditum fugiatum ligul aliquam qui sequi nets lacusets nulat </div>
                <div class="readmore">
                  <div class="read"><a href="">Read more</a></div>
                  
                  <div class="likeblog">10 like</div>
                  
                </div>

              </div>
              
            </div>
            <!-- end1sline -->
            
          </div>
        </div>
       </div>
     </div>
   </div>
   <!-- endblog -->
   <!-- footer -->
   <div class="footerend fontroboto">
     <div class="container">
       <div class="row">
         <div class="col-sm-4">
           <img src="images/logofooter_22.png" alt="">
           <p class="textfooter">Marsh mallow muffin soufflé jelly-o tart cake Marshmallow macaroon jelly jubes dont 
            tiramisu croissant cake.</p>
            <p class="text1footer"><i class="fa fa-paper-plane"></i>Address : 44 New Design Street,
              Melbourne 005</p>
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
              <li>Mon — Fri  ........................ 9:00 am - 23:00 pm
              </li>
              <li>Mon — Fri  ........................ 9:00 am - 23:00 pm
              </li>
              <li>Mon — Fri  ........................ 9:00 am - 23:00 pm
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
        Copyrights © 2015  All Rights Reserved.
       </div></div>
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