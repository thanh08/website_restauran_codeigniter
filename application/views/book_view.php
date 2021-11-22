<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quản lý thông tin đặt bàn</title>
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
				<h3>Thông tin khách đặt hàng</h3>
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
      <th scope="col">Ngày đặt</th>
      <th scope="col">Giờ đặt</th>
      <th scope="col">Số người</th>
      <th scope="col">Tình trạng</th>

    </tr>
  </thead>
  <tbody>
  	<?php $i=0;
  		 ?>
  	<?php foreach ($dulieubook as $key => $value): ?>
    <tr>
      <th scope="row"><?= $i=$i+1; ?></th>
      <td><?= $value['ten'] ?></td>
      <td><?= $value['email'] ?></td>
      <td><?= $value['sdt'] ?></td>
      <td><?= $value['ngaydat'] ?></td>
      <td><?= $value['giodat'] ?></td>
      <td><?= $value['songuoi'] ?></td>
      <?php if ($value['tinhtrang']==0) {?>
      <td><a type="button" class="btn btn-warning" href="<?php echo base_url() ?>home/comfirm_book/<?= $value['id'] ?>/<?= $value['tinhtrang']?>  ">Chưa xác nhận</a>
      	<input type="hidden" value="<?= $value['id'] ?>">
      </td>
      <?php } else { ?>
      	<td><a type="button" class="btn btn-primary" href="">Đã xác nhận</a>
      	<input type="hidden" value="<?= $value['id'] ?>">

</td>
      <?php } ?>
      
    </tr>
  	<?php endforeach ?>
    
  </tbody>
</table>
			</div>
		</div>
	</div>
	
	
</body>
</html>