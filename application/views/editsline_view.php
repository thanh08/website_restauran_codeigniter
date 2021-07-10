<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thêm sline</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/fonts/font-awesome.css">
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>css_server/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>css_server/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css_server/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css_server/bootstrap.min.js"></script>
</head>
<body>
	
	<?php require('adminmenu.php') ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-sm-center ">
				<h3>Thêm sline</h3>
				<a href="<?php echo base_url(); ?>sline" class="btn-warning btn-lg float-left"><i class="fa fa-arrow-left" style="width: 20px !important;"></i>Quay lại</a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8 offset-sm-2">
				<?php $dem = 0 ?>
				<form action="<?php echo base_url(); ?>index.php/sline/editsline" method="post" enctype="multipart/form-data">

					<?php foreach ($dulieusline as $key => $value): ?>
						<?php $dem++ ?>
						<h3>Sline <?= $dem ?></h3>
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Title</label>
						<input type="text" name="title[]" class="form-control" id="formGroupExampleInput" placeholder="Vui lòng nhập nội dung vào" value="<?= $value['title'] ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput2">Description</label>
						<input type="text" name="mota[]" class="form-control" id="formGroupExampleInput2" placeholder="Vui lòng nhập nội dung vào" value="<?= $value['description'] ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput2">Link buton</label>
						<input type="text" name="linkbuton[]" class="form-control" id="formGroupExampleInput2" placeholder="Vui lòng nhập nội dung vào" value="<?= $value['link'] ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput2">Text buton</label>
						<input type="text" name="textbuton[]" class="form-control" id="formGroupExampleInput2" placeholder="Vui lòng nhập nội dung vào" value="<?= $value['textbuton'] ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput2">Image Sline</label>
						<img src="<?= $value['image'] ?>" alt="" width="50%" class="img-thumbnail mb-3">
						<input type="hidden" value="<?= $value['image'] ?>" name="image_old[]"  >
						<input type="file" name="imagesline[]" class="form-control" id="formGroupExampleInput2" placeholder="Vui lòng nhập nội dung vào" >
					</fieldset>
					<fieldset>
						<a href="<?php echo base_url(); ?>sline/deletesline/<?= $value['title'] ?>" class="btn-warning btn-lg float-right">Xóa</a>
					</fieldset>

					<div style="height: 3px; background: black; width: 100%; margin-top: 10px;"></div>
					<?php endforeach ?>


					<input type="submit" value="lưu lại dữ liệu" class="btn-success btn-block mt-3">
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>