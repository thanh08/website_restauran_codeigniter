<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thêm slice</title>
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
				<h3>Thêm slice</h3>
				<a href="<?php echo base_url(); ?>sline/showsline" class="btn-warning btn-lg float-right">Chỉnh sửa slice <i class="fa fa-arrow-right" style="width: 20px !important;"></i> </a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8 offset-sm-2">
				<form action="<?php echo base_url(); ?>index.php/sline/updatesline" method="post" enctype="multipart/form-data">
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Title</label>
						<input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Vui lòng nhập nội dung vào">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput2">Description</label>
						<input type="text" name="mota" class="form-control" id="formGroupExampleInput2" placeholder="Vui lòng nhập nội dung vào">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput2">Link buton</label>
						<input type="text" name="linkbuton" class="form-control" id="formGroupExampleInput2" placeholder="Vui lòng nhập nội dung vào">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput2">Text buton</label>
						<input type="text" name="textbuton" class="form-control" id="formGroupExampleInput2" placeholder="Vui lòng nhập nội dung vào">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput2">Image Slice</label>
						<input type="file" name="imagesline" class="form-control" id="formGroupExampleInput2" placeholder="Vui lòng nhập nội dung vào">
					</fieldset>
					<input type="submit" value="lưu lại dữ liệu" class="btn-success btn-block">
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>