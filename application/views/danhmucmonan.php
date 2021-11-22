<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Danh mục món ăn</title>
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>css_server/bootstrap.css">
	
</head>
<body ng-app="myApp">
	
	<?php if ($this->session->has_userdata('taikhoan') && $this->session->has_userdata('matkhau') ){  ?>

		<div class="alert alert-primary" style="margin-bottom: 0px;" role="alert">
			<strong><?= $this->session->userdata('taikhoan'); ?></strong> đã đăng nhập ! <span><a href="<?php echo base_url() ?>Admin/dangxuat">Đăng xuất</a></span>
		</div>

	 	<?php } else { redirect('../admin','refresh') ?>

	 	<?php } ?>
	 	
	<?php require('adminmenu.php') ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<form action="<?php echo base_url(); ?>Product/addDanhmucmonan" method="post" enctype="multipart/form-data" >
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Thêm danh mục món ăn</label>
						<input type="text" name="danhmuc" id="danhmuc" class="form-control" id="formGroupExampleInput" placeholder="Nhập tên danh mục">
					</fieldset>
					<fieldset class="form-group">
						<input type="submit" id="nut1" class="btn-success text-center" value="Lưu lại thông tin">
					</fieldset>
				</form>
			</div>
			<div class="col-sm-6" ng-controller="controller3" ng-init="motdanhmuc.an = !true" >
				<div class="card text-white bg-success">
					<div class="card-header">Danh sách danh mục món ăn</div>
				</div>
				<div class="card text-center mt-1" ng-repeat="motdanhmuc in danhmucsp" ng-init="motdanhmuc.hienthi = true" ng-hide="motdanhmuc.an">
					<div class="card-body" >
						<span ng-show="motdanhmuc.hienthi">{{motdanhmuc.name}}</span>
						<input type="text" ng-show="!motdanhmuc.hienthi" ng-model="motdanhmuc.name" value="{{motdanhmuc.name}}">
						<input type="hidden" ng-model="motdanhmuc.id">
						<button class="btn btn-warning float-right" ng-show="motdanhmuc.hienthi" ng-click="suadanhmucsp(motdanhmuc)">Sửa</button>
						<button class="btn btn-success" ng-show="!motdanhmuc.hienthi" ng-click="luudanhmucsp(motdanhmuc)">Lưu</button>
			<button class="btn btn-danger float-right" ng-click="xoadanhmucsp(motdanhmuc)">Xóa</button>
					</div>
				</div>


			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url(); ?>css_server/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css_server/popper.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>css_server/bootstrap.min.js"></script>
   <script src="<?php echo base_url(); ?>vender/angular.min.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-animate.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-aria.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-messages.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-material.min.js"></script>
	<script src="<?php echo base_url(); ?>vender/ang1.js"></script>
</body>
</html>