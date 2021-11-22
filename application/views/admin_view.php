<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Đăng nhập</title>
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>css_server/bootstrap.css">
</head>
<body>
	
	<div class="container">
		<div class="row mt-5">
			<div class="col-sm-12">
			<h4 class="text-sm-center">Đăng nhập tài khoản</h4>

			</div>
		</div>
			<div class="row">
				<div class="col-sm-6 offset-3 mt-5">
					<form action="<?php echo base_url(); ?>Admin/dangnhaptaikhoan" method="post" enctype="multipart/form-data" >
						<?php 
							if ($this->session->has_userdata('notice')) { ?>

							<fieldset>
							<div class="alert alert-warning" role="alert">
								<strong><?= $this->session->flashdata("notice") ?></strong>
							</div>
						   </fieldset>

							<?php }

						 ?>
							
							
						


						<fieldset class="form-group">
							<label for="formGroupExampleInput">Tài khoản</label>
							<input type="text" name="taikhoan" class="form-control" id="formGroupExampleInput" placeholder="Nhập nhập tài khoản">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput2">Mật khẩu</label>
							<input type="password" name="matkhau" class="form-control" id="formGroupExampleInput2" placeholder="Nhập nhập mật khẩu">
						</fieldset>
						<fieldset>
							<input type="submit" class="btn-primary btn-block" value="Đăng nhập">
						</fieldset>
					</form>
					<div class="dangki mt-5">Nếu bạn quên mật khẩu hoặc tài khoản thì có thể <span><a href="#">Nhấp</a></span> tại đây để lấy lại!</div>
				</div>
		</div>
	</div>
	

</body>
</html>