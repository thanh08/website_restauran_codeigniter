<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Đăng nhập</title>
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>css_server/bootstrap.css">
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
		<div class="row mt-5">
			<div class="col-sm-12">
			<h4 class="text-sm-center">Đăng kí tài khoản</h4>
				
			</div>
		</div>
			<div class="row">
				<div class="col-sm-6 offset-3 ">
					<form action="<?php echo base_url(); ?>Admin/dangkitaikhoan" method="post" enctype="multipart/form-data" >
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Tên</label>
							<input type="text" name="ten" class="form-control" id="formGroupExampleInput" placeholder="Nhập nhập tài khoản">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Tài khoản</label>
							<input type="text" name="taikhoan" class="form-control" id="formGroupExampleInput" placeholder="Nhập nhập tài khoản">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Số điện thoại</label>
							<input type="number" name="sdt" class="form-control" id="formGroupExampleInput" placeholder="Nhập nhập tài khoản">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Email</label>
							<input type="Email" name="email" class="form-control" id="formGroupExampleInput" placeholder="Nhập nhập tài khoản">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput2">Mật khẩu</label>
							<input type="password" name="matkhau" class="form-control" id="formGroupExampleInput2" placeholder="Nhập nhập mật khẩu">
						</fieldset>
						<fieldset>
							<input type="submit" class="btn-primary btn-block" value="Đăng kí">
						</fieldset>
					</form>
				</div>
		</div>
	</div>
	

</body>
</html>