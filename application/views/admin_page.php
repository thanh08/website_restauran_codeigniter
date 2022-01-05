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
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/font-awesome.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/1.css">

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
<div class="col-sm-2">
	<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Hồ sơ</a>
  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Đơn hàng</a>
  <!-- <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Thông báo</a> -->
  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Cài đặt</a>

</div>
</div>
<div class="col-sm-10" >
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
       <?php }elseif($value['status']==1){?>
          <a class="btn-primary p-1" style="text-decoration: none;" href="#">In hóa đơn</a>

        <?php
      }elseif($value['status']==0){

      }
         ?>
        


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
       <?php }elseif($value['status']==1){?>
          <a class="btn-primary p-1" style="text-decoration: none;" href="#">In hóa đơn</a>

        <?php
      }elseif($value['status']==0){

      }
         ?>
        


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
 <!--  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div> -->
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
    

});
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
