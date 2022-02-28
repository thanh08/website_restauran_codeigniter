<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sửa tin tuc</title>
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>css_server/bootstrap.css">
	<script src="<?php echo base_url() ?>ckeditor/ckeditor.js"></script>
	<script src="<?php echo base_url() ?>ckeditor/ckfinder/ckfinder.js"></script>
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
			<div class="col-sm-12 text-center">
				<h3>Sửa tin tức</h3>
			</div>
		</div>
		<div class="row">
			
			<div class="col-sm-8 offset-sm-2">
				<form class="mb-5" action="../../suatintuc" method="post" enctype="multipart/form-data" >

					<?php foreach ($dulieutinedit as $value): ?>
						
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Tiêu đề tin</label>
			            <input type="hidden" name="id" value="<?= $value['id'] ?>">
						<input type="text" name="tieude" value="<?= $value['tieude'] ?>"  class="form-control" id="formGroupExampleInput" >
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput2">Mô tả tin</label>
						<input type="text" name = "mota" value="<?= $value['mota'] ?>" class="form-control" id="formGroupExampleInput2" >
					</fieldset>

					<fieldset class="form-group">
						<label for="formGroupExampleInput2">Ảnh tin</label>
						<img src="<?= $value['hinhanh'] ?>" alt="" width="50%" class="img-thumbnail">
						<input type="hidden" name="anhcu" value="<?= $value['hinhanh'] ?>">
						<input type="file" name="hinhanh"class="form-control" id="formGroupExampleInput2" >
					</fieldset>
						<fieldset class="form-group">
						<label for="formGroupExampleInput2">Danh mục tin</label>
						<select class="form-control" id="danhmuctin" name="iddanhmuc">
							<?php $t= $value['iddanhmuc'] ?>
						<?php foreach ($dulieudanhmucedit as $key => $value): ?>
                        		
                                <option <?php if($t ==  $value['id']  ){ echo'selected'; } ?>  value="<?= $value['id'] ?>"><?= $value['tendanhmuc'] ?></option>

						<?php endforeach ?>
					<?php endforeach ?>
                           
                           </select>
					</fieldset>
					<?php foreach ($dulieutinedit as $key => $value): ?>

					<fieldset class="form-group">
						<label for="exampleFormControlTextarea1">Thêm nội dung tin tức</label>
                        <textarea class="form-control" id="noidungtin" rows="5" name="noidungtin"><?= $value['noidungtin'] ?></textarea>
					</fieldset>
					
					<?php endforeach ?>
					<fieldset>
						<input type="submit" class="btn-success btn-block" value="Lưu lại dữ liệu">
					</fieldset>

				</form>
			</div>
		</div>

	</div>
	<script>
	var editor = CKEDITOR.replace( 'noidungtin' );
    CKFinder.setupCKEditor( editor );
	CKEDITOR.replace( 'noidungtin', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserWindowWidth: '1000',
    filebrowserWindowHeight: '700'
} );

	</script>
</body>
</html>