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
<body>

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
				<h3>Thông tin tài khoản khách hàng</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-12">
				<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tài khoản</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Email</th>
      <th scope="col">Tình trạng</th>
      <th scope="col">Thay đổi</th>

    </tr>
  </thead >
  <tbody>
  	<?php $i=0 ?>
  	<?php foreach ($dluser as $key => $value): ?>
  		
    <tr>
      <td><?= $i=$i+1 ?></td>
      <td><?= $value['user_name'] ?></td>
      <td><?= $value['user_phone'] ?></td>
      <td><?= $value['user_email'] ?></td>
      <td><?php if ($value['user_status']==0) {
      	echo 'Đang hoạt động';
      } else {
      	echo 'Đang bị chặn';
      	
      } ?></td>
      <td>
      	<?php if ($value['user_status']==0): ?>
      		<a style="text-decoration: none;" class="btn-danger ml-1 p-1" href="<?php echo base_url(); ?>/admin/blockuser/<?= $value['id'] ?>">Chặn người dùng</a>
      	<?php else: ?>
      		<a style="text-decoration: none;" class="btn-success ml-1 p-1" href="<?php echo base_url(); ?>/admin/unblockuser/<?= $value['id'] ?>">Hủy chặn</a>
      	<?php endif ?>
      	


      </td>

    </tr>
  	<?php endforeach ?>
    

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