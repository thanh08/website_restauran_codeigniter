<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quản lý thông tin liên hệ phản hồi</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/fonts/font-awesome.css">
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>css_server/bootstrap.min.css">
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

	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-sm-center ">
				<h3>Thông tin khách liên hệ phản hồi</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-12">
				<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ten</th>
      <th scope="col">Email</th>
      <th scope="col">Sđt</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">Nội dung</th>
      <th scope="col">Tình trạng</th>

    </tr>
  </thead>
  <tbody>
  	<?php $i=0;
  		 ?>
    	<?php foreach ($dulieucontact as $value): ?>
  	
    <tr>
    		
      <th scope="row"><?= $i=$i+1; ?></th>
      <td><?= $value['name'] ?></td>
      <td><?= $value['email'] ?></td>
      <td><?= $value['sdt'] ?></td>
      <td><?= $value['address'] ?></td>
      <td><textarea name=""><?= $value['content'] ?></textarea> </td>
    
      <td>
      	<?php if ($value['status']==0) {?>
      		<a type="button" class="btn btn-warning" href="<?php echo base_url() ?>contact/comfirm_contact/<?= $value['id'] ?>/<?= $value['status']?>/<?= $value['email'] ?>  ">Chưa xác nhận</a>
      	<input type="hidden" value="<?= $value['id'] ?>">
      	 <?php }
       else { ?>
      	<a type="button" class="btn btn-primary" href="">Đã xác nhận</a>
      	<input type="hidden" value="<?= $value['id'] ?>">
      	<?php } ?>

</td>
      
    </tr>
    	<?php endforeach ?>
    
  </tbody>
</table>
			</div>
		</div>
	</div>
	
	
</body>
</html>