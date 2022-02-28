<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
$phone = ($this->session->userdata['logged_in']['phone']);
$id = ($this->session->userdata['logged_in']['id']);
$diachi = ($this->session->userdata['logged_in']['address']);

} else {
//header("location: login");
}
?>
<head>
<title>Hồ sơ tài khoản</title>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/font-awesome.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/1.css">
<<<<<<< HEAD
=======
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">

>>>>>>> 7d99a79... new update
<style>
  .animated {
    -webkit-transition: height 0.2s;
    -moz-transition: height 0.2s;
    transition: height 0.2s;
}

.stars
{
    margin: 20px 0;
    font-size: 24px;
    color: #d17581;
}

</style>
</head>
<body ng-app="myApp">
	<!-- topheader -->
  <?php include('header.php') ?>
   <!-- end topheader -->
<div id="profile">
<?php
echo "Xin chào <b id='welcome'><i>" . $username . "</i> !</b>";
echo "<br/>";
?>
<b id="logout"><a href="logout">Đăng xuất</a></b>
</div>
<div class="row mt-2">
<div class="col-sm-2 col-12">
	<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Hồ sơ</a>
  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Đơn hàng</a>
  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Yêu thích</a>
  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Cài đặt</a>

</div>
</div>
<div class="col-sm-10 col-12" >
	<div class="tab-content" id="v-pills-tabContent">
  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">



  	<div class="row">
  		<div class="col-sm-12 col-12 text-center"><h4>Thông tin về tài khoản</h4></div>

  	</div>
  	<div class="row" ng-controller="controller6">

  		<div class="col-sm-10 offset-sm-1" ng-init="hienthi=true">
  			<form action="<?php echo base_url(); ?>user_authentication/suathongtinuser" method="post" enctype="multipart/form-data">
  <?php foreach ($user as $key => $value): ?>

  			<div class="mb-3">
  				<input type="hidden" value="<?= $id ?>" name="id">
            <label for="username">Tài khoản</label>
            <div class="input-group" ng-show="!hienthi">
              <input type="text" class="form-control" name="ten" value="<?= $value['user_name'] ?>" id="username" placeholder="Tài khoản" required>
            </div>
            <div ng-show="hienthi"><span><i class="fa fa-circle" aria-hidden="true"></i>
</span><?= $value['user_name'] ?></div>
          </div>
          <div class="mb-3">
            <label for="email">Số điện thoại</label>
            <input type="" ng-show="!hienthi" name="sdt" class="form-control" value="<?= $value['user_phone'] ?>" id="email" placeholder="038********">
            <div ng-show="hienthi"><span><i class="fa fa-circle" aria-hidden="true"></i>
</span><?= $value['user_phone'] ?></div>
          </div>
          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" ng-show="!hienthi" name="email" class="form-control" value="<?= $value['user_email'] ?>" id="email" placeholder="you@example.com">
            <div ng-show="hienthi"><span><i class="fa fa-circle" aria-hidden="true"></i>
</span><?= $value['user_email'] ?></div>
          </div>

          <div class="mb-3">
            <label for="address">Địa chỉ</label>
            <input type="text" name="diachi" ng-show="!hienthi" class="form-control" value="<?= $value['user_address'] ?> " id="address" placeholder="1234 Main St" required >

            <div ng-show="hienthi"><span><i class="fa fa-circle" aria-hidden="true"></i>
</span><?= $value['user_address'] ?></div>
          </div>
  <?php endforeach ?>
          

          <div><input ng-show="!hienthi" type="submit" value="lưu lại dữ liệu" class="btn-success btn-block"></div>
          </form>
          <div ng-show="hienthi"><button class="btn-warning" ng-click="thaydoithongtin()">Thay đổi thông tin</button></div>
  		</div>


  	</div>
  </div>
  <div  class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Đơn hàng giao tại nhà</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Đơn hàng đặt tại nhà hàng</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">


  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="row">
      <div class="col-sm-12 col-12 text-center"><h4>Thông tin về đơn hàng</h4></div>
      <div>    
       <form method="POST" action="<?php echo base_url(); ?>user_authentication/xemuser" enctype="multipart/form-data" >
        <div class="form-group">
          <select class="form-control" name="luachon" id="">
            <option value="" selected="selected">Tất cả</option>
            <option value="5don" <?php echo set_select('luachon','5don'); ?>>5 đơn hàng gần đây</option>
            <option value="1thang" <?php echo set_select('luachon','1thang'); ?>>1 tháng gần đây</option>
            <option value="huy" <?php echo set_select('luachon','huy'); ?>>Đơn hàng hủy</option>
            <option value="hoanthanh" <?php echo set_select('luachon','hoanthanh'); ?>>Đơn hàng hoàn thành</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Lọc</button>
      </form>
    </div>
    </div>
    <div class="row">
      <div class="col-sm-10 offset-sm-1">
        
  <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Mã đơn hàng</th>
      <th scope="col">Tổng tiền</th>
      <th scope="col">Ngày đặt</th>
      <th scope="col">Hình thức thanh toán</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Hành động</th>
      <th scope="col">Thông tin</th>



    </tr>
  </thead>
    
  <tbody >
  <?php foreach ($dulieudonhang as $key => $value): ?>

    <tr ng-controller="controller5">
      <th scope="row"><?= $value['id'] ?></th>
      <td><?= $this->cart->format_number( $value['total']) ?> VND</td>
      <?php $time = gmdate(' d-m-Y',$value['ngaydat']); ?>
      <td><?= $time ?></td>
      <td><?= $value['payment_info'] ?></td>
      <td><?php if ($value['status']==NULL) {
        echo 'Đang xử lý';
      } elseif($value['status']==0) {
        echo 'Đơn đã bị hủy';
      }elseif ($value['status']==1) {
        echo 'Hoàn thành';
      } ?></td>
      <td>
        <?php 
        if ($value['status']==NULL) {?>
          <a class="btn-danger p-1" style="text-decoration: none;" href="<?php echo base_url(); ?>cart/huydon/<?= $value['id'] ?>">Hủy đơn hàng</a>
<<<<<<< HEAD
       <?php }elseif($value['status']==1){?>
=======
       <?php }elseif( empty($value['transaction_id']) && $value['status']==1){?>

>>>>>>> 7d99a79... new update
          <!-- phan danh gia -->
          <div class="container">
  <div class="row">
      <div class="well well-sm">
            <div class="text-right">
                <div class="open-review-box btn btn-primary">Viết đánh giá</div>
            </div>
        
            <div class="post-review-box row" id="" style="display:none; width: 300px;">
                <div class="col-md-12">
                    <form accept-charset="UTF-8" action="<?php echo base_url(); ?>user_authentication/danhgia" method="post">
                        <input class="ratings-hidden" name="rating" type="hidden"> 
<<<<<<< HEAD

=======
                        <input type="hidden" name="idgiaodich" value="<?= $value['id'] ?>">
>>>>>>> 7d99a79... new update
<!--                         <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
 -->                        <textarea class="new-review form-control animated" cols="" id="" name="comment" placeholder="Viết đánh giá của bạn đây!" rows=""></textarea>
        
                        <div class="text-right">
                            <div class="stars starrr" data-rating="0"></div>
                            <a class="close-review-box btn btn-danger btn-sm" href="#" id="" style="display:none; margin-right: 10px;">
                            <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
         
    
  </div>
</div>
<!-- endphandanhgia
 -->

<<<<<<< HEAD

=======
>>>>>>> 7d99a79... new update


        <?php }elseif( !empty($value['transaction_id']) && $value['status']==1 ){?>
        <div>
                <div class="btn btn-primary">Đã đánh giá</div>
            </div>
      <?php } ?>
        


      </td>
      <td><button class="btn-success xem" ng-click="xemchitiet()" ng-init="id = '<?php echo $value['id']; ?>' ">Chi tiết đơn hàng</button></td>
      <td>
        <div class="chitietdon" style="width: 600px; background: whitesmoke;right: 350px;z-index: 10;bottom: 200px;height: 300px;position: fixed;padding:10px ;border-radius: 3px; ">
      <button class="btn-danger float-right dong">Đóng</button>
      <div class="row">
          
        <div class="col-sm-6">
          <div class="text-center">Địa chỉ người nhận</div>
          <div>
            <div style="font-size: 14px;"><?= $value['user_name'] ?></div>
        </div>
        <div>
            <div style="font-size: 14px;"><?= $value['user_phone'] ?></div>
        </div>
        <div>
            <div style="font-size: 14px;"><?= $value['user_address'] ?></div>
        </div>
            
</div>

<div class="col-sm-6">
  <div class="text-center">Hình thức thanh toán</div>
  <div style="font-size: 14px;"><?php if ($value['payment_info']=='COD') {
    echo 'Thanh toán khi nhận hàng';
  } elseif ($value['payment_info']=='Credit Card') {
    echo 'Thanh toán qua thẻ';
    
  } ?>
   


  </div>
        </div>
</div>

<div class="row">

  <div class="col-sm-10 offset-sm-1" >
    <div class="text-center">Chi tiết món</div>
     <li class="list-group-item d-flex justify-content-between lh-condensed" ng-repeat="motdon in donchitiet">
            <div>

              <h6 class="my-0">{{motdon.name}}</h6>
              <small class="text-muted">Sl: {{motdon.qty}}</small>
            </div>
            <span class="text-muted">{{motdon.amount}} VND</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Tổng tiền</span>
            <strong><?= $value['total'] ?> VND</strong>
          </li>
    
  </div>


</div>
      
    </div>    </td>
    </tr>
    
  <?php endforeach ?>

  </tbody>

</table>
      </div>
    </div>
  </div>

<!-- bảng đơn đặt tại nhà hàng -->
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    
    <div class="row">
      <div class="col-sm-12 col-12 text-center"><h4>Thông tin về đơn hàng</h4></div>
      <div>    
       <form method="POST" action="<?php echo base_url(); ?>user_authentication/xemuser" enctype="multipart/form-data" >
        <div class="form-group">
          <select class="form-control" name="luachon1" id="">
            <option value="" selected="selected">Tất cả</option>
            <option value="5don1" <?php echo set_select('luachon1','5don1'); ?>>5 đơn hàng gần đây</option>
            <option value="1thang1" <?php echo set_select('luachon1','1thang1'); ?>>1 tháng gần đây</option>
            <option value="huy1" <?php echo set_select('luachon1','huy1'); ?>>Đơn hàng hủy</option>
            <option value="hoanthanh1" <?php echo set_select('luachon1','hoanthanh1'); ?>>Đơn hàng hoàn thành</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Lọc</button>
      </form>
    </div>
    </div>
    <div class="row">
      <div class="col-sm-10 offset-sm-1">
        
  <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Mã đơn hàng</th>
      <th scope="col">Tổng tiền</th>
      <th scope="col">Ngày đặt</th>
      <th scope="col">Hình thức thanh toán</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Hành động</th>
      <th scope="col">Thông tin</th>



    </tr>
  </thead>
    
  <tbody >
  <?php foreach ($dulieudonhang1 as $key => $value): ?>

    <tr ng-controller="controller5">
      <th scope="row"><?= $value['id'] ?></th>
      <td><?= $this->cart->format_number( $value['total']) ?> VND</td>
      <?php $time = gmdate(' d-m-Y',$value['ngaydattransaction']); ?>
      <td><?= $time ?></td>
      <td><?= $value['payment_info'] ?></td>
      <td><?php if ($value['status']==NULL) {
        echo 'Đang xử lý';
      } elseif($value['status']==0) {
        echo 'Đơn đã bị hủy';
      }elseif ($value['status']==1) {
        echo 'Hoàn thành';
      } ?></td>
      <td>
        <?php 
        if ($value['status']==NULL) {?>
          <a class="btn-danger p-1" style="text-decoration: none;" href="<?php echo base_url(); ?>cart/huydon/<?= $value['id'] ?>">Hủy đơn hàng</a>
<<<<<<< HEAD
       <?php }elseif($value['status']==1){?>
=======
       <?php }elseif( empty($value['transaction_id']) && $value['status']==1){?>
        
>>>>>>> 7d99a79... new update
          <!-- phan danh gia -->
          <div class="container">
  <div class="row">
      <div class="well well-sm">
            <div class="text-right">
                <div class="open-review-box btn btn-primary">Viết đánh giá</div>
            </div>
        
            <div class="post-review-box row" id="" style="display:none; width: 300px;">
                <div class="col-md-12">
                    <form accept-charset="UTF-8" action="<?php echo base_url(); ?>user_authentication/danhgia" method="post">
                        <input class="ratings-hidden" name="rating" type="hidden"> 
<<<<<<< HEAD

<!--                         <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
 -->                        <textarea class="new-review form-control animated" cols="" id="" name="comment" placeholder="Viết đánh giá của bạn đây!" rows=""></textarea>
        
                        <div class="text-right">
                            <div class="stars starrr" data-rating="0"></div>
                            <a class="close-review-box btn btn-danger btn-sm" href="#" id="" style="display:none; margin-right: 10px;">
                            <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
         
    
  </div>
</div>
<!-- endphandanhgia
 -->
        <?php
      }elseif($value['status']==0){
=======
                        <input type="hidden" name="idgiaodich" value="<?= $value['id'] ?>">
<!--                         <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
 -->                        <textarea class="new-review form-control animated" cols="" id="" name="comment" placeholder="Viết đánh giá của bạn đây!" rows=""></textarea>
        
                        <div class="text-right">
                            <div class="stars starrr" data-rating="0"></div>
                            <a class="close-review-box btn btn-danger btn-sm" href="#" id="" style="display:none; margin-right: 10px;">
                            <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
         
    
  </div>
</div>
<!-- endphandanhgia -->


>>>>>>> 7d99a79... new update

        <?php }elseif( !empty($value['transaction_id']) && $value['status']==1 ){?>
        <div>
                <div class="btn btn-primary">Đã đánh giá</div>
            </div>
      <?php } ?>
        



      </td>
      <td><button class="btn-success xem" ng-click="xemchitiet()" ng-init="id = '<?php echo $value['id']; ?>' ">Chi tiết đơn hàng</button></td>
      <td>
        <div class="chitietdon" style="width: 600px; background: whitesmoke;right: 350px;z-index: 10;bottom: 200px;height: 300px;position: fixed;padding:10px ;border-radius: 3px; ">
      <button class="btn-danger float-right dong">Đóng</button>
      <div class="row">
          
        <div class="col-sm-6">
          <div class="text-center">Địa chỉ người nhận</div>
          <div>
            <div style="font-size: 14px;"><?= $value['user_name'] ?></div>
        </div>
        <div>
            <div style="font-size: 14px;"><?= $value['user_phone'] ?></div>
        </div>
        <div>
            <div style="font-size: 14px;"><?= $value['user_address'] ?></div>
        </div>
            
</div>

<div class="col-sm-6">
  <div class="text-center">Chi tiết đơn đặt</div>
  <ul style="font-size: 14px;list-style: none;">
    <li>Ngày đặt: <?= $value['ngaydat'] ?></li>
    <li>Giờ đặt: <?= $value['giodat'] ?></li>
    <li>Số người: <?= $value['songuoi'] ?></li>
  </ul>
        </div>
</div>

<div class="row">

  <div class="col-sm-10 offset-sm-1" >
    <div class="text-center">Chi tiết món</div>
     <li class="list-group-item d-flex justify-content-between lh-condensed" ng-repeat="motdon in donchitiet">
            <div>
              <h6 class="my-0">{{motdon.name}}</h6>
              <small class="text-muted">Sl: {{motdon.qty}}</small>
            </div>
            <span class="text-muted">{{motdon.amount}} VND</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Tổng tiền</span>
            <strong><?= $value['total'] ?> VND</strong>
          </li>
    
  </div>


</div>
      
    </div>    </td>
    </tr>
    
  <?php endforeach ?>

  </tbody>

</table>
      </div>
    </div>
  </div>



</div>
  	
<!-- end -->
  </div>
  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
    
      <ul class="list-group mb-3"  >
        <?php foreach ($monyeuthich as $key => $value): ?>
          
          <li ng-controller="controller8" class="list-group-item d-flex justify-content-between lh-condensed" ng-click="xoaspyeuthich()" ng-init="id = '<?php echo $value['id']; ?>' " 
            ng-hide="an" >
            <img style="width: 90px;" src="<?= $value['image_link'] ?>" alt="" class="anhyeuthich">
            <div style="width: 150px;">
              <h6 class="my-0"><?= $value['name'] ?></h6>
              <small class="text-muted"><?= $value['description_short'] ?></small>
            </div>
            <span class="text-muted"><?= $formattedNum = number_format($value['discount']); ?> VND</span>
            <div ng-click="xoaspyeuthich()"><i class="fa fa-minus-circle ml-5" aria-hidden="true" style="color: red; size: 22px;"></i></div>
          </li>
        <?php endforeach ?>
          
        </ul>
  </div>
  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
<button class="mk btn-warning">Thay đổi mật khẩu</button>
<div id="main" class="kohienthi">
<button class="btn-danger float-right dongmk">Đóng</button>
<div id="login">
<?php echo @$error; ?>
<h2>Thay đổi mật khẩu</h2>
<br>
<form method="post" action='../user_authentication/update_new_set_password'>
    <label>Mật khẩu cũ :</label>
    <input type="password" name="password_old" id="name" placeholder="Nhập mật khẩu cũ"/><br /><br />
    <label>Mật khẩu mới :</label>
    <input type="password" name="freshpassword" id="password" placeholder="Nhập mật khẩu mới"/><br/><br />

    <label>Xác nhận mật khẩu mới :</label>
    <input type="password" name="second_time_verify_password" id="password" placeholder="Xác nhận mật khẩu mới"/><br/><br />
    <input type="submit" value="Lưu mật khẩu" name="update_new_set_password"/><br />
</form>
</div>
</div>

  </div>
</div>
</div>
</div>



<br/>
  <?php include('footer.php') ?>
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
   <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/jquery.js"><\/script>')</script>
   	<script>
	$(document).ready(function () {
    $('.btn-success.xem').click(function () { 
       // console.log('ban đã kích');
        $(this).parent().next().children().addClass('hienthidon');


        
       
        
    });
    $('.dong').click(function () { 
       // console.log('bạn đã kích 1')
        $(this).parent().removeClass('hienthidon');
       
    });
    $('.mk').click(function () { 
        //console.log('ban đã kích');
        $(this).next().addClass('cohienthi');


        
       
        
    });
    $('.dongmk').click(function () { 
        //console.log('bạn đã kích 1')
        $(this).parent().removeClass('cohienthi');
       
    });
    

    (function(e){
      var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

$(function(){

  $('.new-review').autosize({append: "\n"});

  var reviewBox = $('.post-review-box');
  var newReview = $('.new-review');
  var openReviewBtn = $('.open-review-box');
  var closeReviewBtn = $('.close-review-box');
  var ratingsField = $('.ratings-hidden');

  openReviewBtn.click(function(e)
  {
    console.log('tada');
    $(this).parent().next().slideDown(400, function()
      {
        $('#new-review').trigger('autosize.resize');
        newReview.focus();
      });
    openReviewBtn.fadeOut(100);
    closeReviewBtn.show();
  });

  closeReviewBtn.click(function(e)
  {
    e.preventDefault();
    reviewBox.slideUp(300, function()
      {
        newReview.focus();
        openReviewBtn.fadeIn(200);
      });
    closeReviewBtn.hide();
    
  });

  $('.starrr').on('starrr:change', function(e, value){
    var h=ratingsField.val(value);
    console.log(h);
  });
<<<<<<< HEAD
});

});

=======
});

});

>>>>>>> 7d99a79... new update
</script>
    <script src="<?php echo base_url(); ?>js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/isotope.pkgd.js"></script>
    <script src="<?php echo base_url(); ?>js/holder.min.js"></script>
    <script src="<?php echo base_url(); ?>vender/angular.min.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-animate.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-aria.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-messages.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-material.min.js"></script>
	<script src="<?php echo base_url(); ?>vender/ang1.js"></script>
    <script src="<?php echo base_url(); ?>js/1.js"></script> 
</body>
</html>
