<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tin tức</title>
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>css_server/bootstrap.css">
	<script src="<?php echo base_url() ?>ckeditor/ckeditor.js"></script>
	<script src="<?php echo base_url() ?>ckeditor/ckfinder/ckfinder.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css_server/jquery.min.js"></script>

</head>
<body>
			<?php if ($this->session->has_userdata('taikhoan') && $this->session->has_userdata('matkhau') ){  ?>

		<div class="alert alert-primary" style="margin-bottom: 0px;" role="alert">
			<strong><?= $this->session->userdata('taikhoan'); ?></strong> đã đăng nhập ! <span><a href="<?php echo base_url() ?>Admin/dangxuat">Đăng xuất</a></span>
		</div>

	 	<?php } else { redirect('../admin','refresh') ?>

	 	<?php } ?>


	<?php require('adminmenu.php') ?>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6">
				<h2 class="text-center">Thêm tin tức</h2>
				<form action="<?php echo base_url(); ?>News/addnews" method="post" enctype="multipart/form-data">
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Tiêu đề tin</label>
						<input type="text" name="tieude" class="form-control" id="formGroupExampleInput" placeholder="">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Mô tả tin</label>
						<input type="text" name="mota" class="form-control" id="formGroupExampleInput" placeholder="">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Ảnh của tin</label>
						<input type="file" name="hinhanh" class="form-control">
					</fieldset>
					<fieldset class="form-group">
						<label for="exampleFormControlSelect1">Chọn danh mục tin tức</label>
                        <select class="form-control" id="danhmuctin" name="iddanhmuc">
                        	<?php foreach ($dulieu as $value): ?>
                        		
                           <option value="<?= $value['id'] ?>"><?= $value['tendanhmuc'] ?></option>
                        	<?php endforeach ?>
                           
                           </select>
					</fieldset>
					<fieldset class="form-group">
						<label for="exampleFormControlTextarea1">Thêm nội dung tin tức</label>
                        <textarea class="form-control" id="noidungtin" rows="5" name="noidungtin"></textarea>
					</fieldset>
					<input type="submit" value="lưu thông tin " class="btn-success d-block m-auto">

				</form>
			</div><!--  endphanthêm tin tuc -->

		   <div class="col-sm-6">
			<h2 class="text-center">Chỉnh sửa tin tức</h2>
			<div class="card-deck">
				<?php foreach ($dulieutintuc as $key => $value): ?>
					
				  <div class="card mt-2" style="flex: none; width: 200px;">
				    <img class="card-img-top" src="<?= $value['hinhanh'] ?>" alt="Card image cap">
				    <div class="card-body">
				      <h5 class="card-title"><?= $value['tieude'] ?></h5>
				      <p class="card-text" style="font-size: 14px;font-style: italic;"><?= $value['mota'] ?></p>
				    </div>
				    <div class="card-footer">
				    	
				    	<?php $time = gmdate('H:i:s A \o\n l jS F Y',$value['ngaytao']); ?>
				      <small class="text-muted"><?= $time ?></small>
				    </div>
				    <div class="card-footer">
				    	<a href="./loadedittintuc/<?= $value['id'] ?>/<?= $value['iddanhmuc'] ?>" class="btn-warning btn-lg">Sửa</a>

				    	<a href="./xoatintuc/<?= $value['id'] ?>" class="btn-danger btn-lg">xóa</a>

				    </div>

				  </div>
				<?php endforeach ?>

			</div>
		   </div>



		</div>

	</div>
	<script>
		var editor = CKEDITOR.replace( 'noidungtin',{
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserWindowWidth: '1000',
    filebrowserWindowHeight: '700'
} );
      CKFinder.setupCKEditor( editor );

// 	CKEDITOR.replace( 'noidungtin', {
//     filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
//     filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
//     filebrowserWindowWidth: '1000',
//     filebrowserWindowHeight: '700'
// } );

	</script>
</body>
</html>