<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Danh muc</title>
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>css_server/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>css_server/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css_server/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css_server/bootstrap.min.js"></script>
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-8 offset-sm-2">
				<h3 class="text-center">Sửa tên danh mục</h3>
				<form action="<?php echo base_url(); ?>News/editdanhmuc" method="post" enctype="multipart/form-data" >
					<?php foreach ($dulieu as $key => $value): ?>
						
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Tên danh mục</label>
						<input type="hidden" name="id" value="<?= $value['id'] ?>">
						<input type="text" name="ten" value="<?= $value['tendanhmuc'] ?>" class="form-control" id="formGroupExampleInput">
					</fieldset>
					<?php endforeach ?>

					<fieldset class="form-group">
						<input type="submit" name="" value="Lưu tên danh mục" class="btn-success d-block m-auto">
					</fieldset>
				</form>
			</div>
			
		</div>
	</div>
	
</body>
</html>