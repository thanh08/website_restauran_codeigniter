<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quản lý thông tin </title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/fonts/font-awesome.css">
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>css_server/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css_server/1.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>css_server/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css_server/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css_server/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css_server/bootstrap.min.js"></script>
    
</head>
<body ng-app="myApp">

	<?php if ($this->session->has_userdata('taikhoan') && $this->session->has_userdata('matkhau') ){  ?>

		<div class="alert alert-primary" style="margin-bottom: 0px;" role="alert">
			<strong><?= $this->session->userdata('taikhoan'); ?></strong> đã đăng nhập ! <span><a href="<?php echo base_url() ?>Admin/dangxuat">Đăng xuất</a></span>
		</div>

	 	<?php } else { redirect('../admin','refresh') ?>

	 	<?php } ?>


	<?php require('adminmenu.php') ?>

	<div class="container" ng-controller="controller2">
		<div class="row">
			<div class="col-sm-12 text-sm-center ">
				<h3>Thông tin tài khoản quản trị</h3>
				<a href="<?php echo base_url(); ?>admin/showdangki" class="btn-success btn-lg float-right mb-2">Thêm tài khoản mới<i class="fa fa-arrow-right" style="width: 18px !important;"></i> </a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-12">
				<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Ten</th>
      <th scope="col">Tài khoản</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Email</th>
      <th scope="col">Thay đổi</th>

    </tr>
  </thead >
  <tbody ng-repeat="mottk in taikhoan" ng-init="mottk.hienthi=true">
    <tr ng-show="mottk.hienthi">
      <td>{{mottk.ten}}</td>
      <td>{{mottk.taikhoan}}</td>
      <td>{{mottk.sdt}}</td>
      <td>{{mottk.email}}</td>
      <td><button class="btn-warning" ng-click="suataikhoan(mottk)">Sửa</button><a class="btn-danger ml-1 p-1" href="<?php echo base_url(); ?>/admin/xoataikhoan/{{mottk.id}}">Xóa</a></td>

    </tr>
    <tr ng-show="!mottk.hienthi">
      <td><input type="text" ng-model="mottk.ten" value="{{mottk.ten}}"></td>
      <td><input type="text" ng-model="mottk.taikhoan" value="{{mottk.taikhoan}}"></td>
      <td><input type="text" ng-model="mottk.sdt"  value="{{mottk.sdt}}" ></td>
      <td><input type="email" ng-model="mottk.email"  value="{{mottk.email}}" ></td>
      <input type="hidden" ng-model="mottk.ngaytao">
      <input type="hidden" ng-model="mottk.id">
      <td ><button class="btn-success" style="width: 100px;"  ng-click="luutaikhoan(mottk)">Lưu</button></td>


    </tr>

  </tbody>
</table>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url(); ?>vender/angular.min.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-animate.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-aria.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-messages.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-material.min.js"></script>
	<script src="<?php echo base_url(); ?>vender/ang1.js"></script>
</body>
</html>