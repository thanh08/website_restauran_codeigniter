<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Đăng nhập</title>
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>css_server/bootstrap.css">
	<style>
		.error_msg{
color:red;
font-size: 16px;
}
	</style>

</head>
<body>
	
	<div class="container">
		<div class="row mt-5">
			<div class="col-sm-12 ">
			<h4 class="text-center">Lấy lại mật khẩu</h4>

			</div>
		</div>
			<div class="row">
				<div class="col-sm-6 offset-sm-3 col-6 offset-3 mt-5">
					<form action="<?php echo base_url(); ?>Admin/takepassadmin" method="post" enctype="multipart/form-data" >
						<?php
							echo "<div class='error_msg'>";
							if (isset($error_message)) {
							echo $error_message;
							}
							echo "</div>";
						?>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Email đăng kí tài khoản</label>
							<input type="text" name="email" class="form-control" id="formGroupExampleInput" placeholder="Nhập nhập email đăng kí tài khoản!">
						</fieldset>
						
						<fieldset>
							<input type="submit" class="btn-primary btn-block" value=" Gửi đi">
						</fieldset>
					</form>
					<div class="dangki mt-5"><span><a href="<?php echo base_url(); ?>admin">Nhấp</a></span> vào tại đây để đăng nhập!</div>
				</div>
		</div>
	</div>
	

</body>
</html>