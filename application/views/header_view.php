<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thông tin về nhà hàng</title>
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

		<div class="row">
			<div class="col-sm-8 offset-sm-2">
				<h3 class="text-sm-center">Thông tin về nhà hàng</h3>
				<form action="<?php echo base_url(); ?>Home/updateheader" method="post" enctype="multipart/form-data">
					<?php foreach ($dulieuheader as $key => $value): ?>
						<?php 
						if ($key == 'mangxahoi') {
							$mangxahoi=$value;
							
						}
						if ($key == 'hotline') {
							$hotline=$value;
						}
						if($key == 'giomocua'){
							$giomocua=$value;
						}
						if ($key == 'logo') {
							$logo=$value;
						}

						 ?>
					<?php endforeach ?>
					<div class="alert alert-primary" role="alert">Thông tin mạng xã hội</div>
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Facebook</label>
						<input type="text" class="form-control" name="linkfb" id="" value="<?= $mangxahoi['linkfb'] ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput2">Twitter</label>
						<input type="text" class="form-control" name="linktwitter" id="" value="<?= $mangxahoi['linktwitter'] ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput2">Sky</label>
						<input type="text" class="form-control" name="linksky" id=""value="<?= $mangxahoi['linksky'] ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput2">Tumbler</label>
						<input type="text" class="form-control" name="linktum" id=""value="<?= $mangxahoi['linktum'] ?>">
					</fieldset>
					<div class="alert alert-primary" role="alert">Thông tin hotline</div>
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Text hotline</label>
						<input type="text" class="form-control" name="texthost" id="" value="<?= $hotline['text'] ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput2">Số hotline</label>
						<input type="text" class="form-control" name="sdt" id="" value="<?= $hotline['sdt'] ?>">
					</fieldset>
					<div class="alert alert-primary" role="alert">Thông tin giờ mở cửa</div>
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Text</label>
						<input type="text" class="form-control" name="textgio" id="" value="<?= $giomocua['text'] ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput2">Giờ mở cửa</label>
						<input type="text" class="form-control" name="gio" id="" value="<?= $giomocua['gio'] ?>">
					</fieldset>
					<div class="alert alert-primary" role="alert">Thông tin logo</div>
					<fieldset class="form-group">
						<input type="hidden" class="form-control" name="logocu" id="" value="<?= $logo ?>">
						<img src="<?= $logo ?>" name = "" alt="">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput2">Logo</label>
						<input type="file" name="logo" class="form-control" id="">
					</fieldset>
					<fieldset>
						<input type="submit" class="btn-primary btn-block" value="Lưu thông tin">
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>