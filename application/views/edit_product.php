<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sửa món ăn</title>
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>css_server/bootstrap.css">
	<script src="<?php echo base_url() ?>ckeditor/ckeditor.js"></script>
	<script src="<?php echo base_url() ?>ckeditor/ckfinder/ckfinder.js"></script>
</head>
<body ng-app="myApp">
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
				<h3>Sửa món ăn</h3>
			</div>
		</div>
		<div class="row">
			
			<div class="col-sm-8 offset-sm-2">
				<form class="mb-5" action="../suamonan" method="post" enctype="multipart/form-data" >

					<?php foreach ($dulieumonan as $value): ?>
						
					<fieldset class="form-group card p-4">
						<label for="formGroupExampleInput">Tiêu đề món ăn</label>
			            <input type="hidden" name="id" value="<?= $value['id'] ?>">
						<input type="text" name="tieude" value="<?= $value['name'] ?>"  class="form-control" id="formGroupExampleInput" >
					</fieldset>
					<fieldset class="form-group card p-4">
						<label for="formGroupExampleInput2">Mô tả món ăn</label>
						<input type="text" name = "mota" value="<?= $value['description_short'] ?>" class="form-control" id="formGroupExampleInput2" >
						<select class="form-control mt-2" name="themnew">

							<option value="1">Món mới</option>
							<option value="0">Món cũ</option>

						</select>
						<select class="form-control mt-2" name="tonkho">

							<option value="0">Có hàng</option>
							<option value="1">Hết hàng</option>

						</select>
					</fieldset>


					<fieldset class="form-group card p-4">
						<label for="formGroupExampleInput2">Ảnh món ăn</label>
						<img src="<?= $value['image_link'] ?>" alt="" width="50%" class="img-thumbnail">
						<input type="hidden" name="anhcu" value="<?= $value['image_link'] ?>">
						<input type="file" name="hinhanh"class="form-control" id="formGroupExampleInput2" >
					</fieldset>
             <?php endforeach ?>


					<fieldset class="form-group card p-4">
						<label for="formGroupExampleInput2">Ảnh list món ăn</label>

             <?php foreach ($dulieuanhlist as $value): ?>
						<img src="<?= $value['image_link'] ?>" alt="" width="50%" class="img-thumbnail">
						<input type="hidden" name="anhlistcu[]" value="<?= $value['image_link'] ?>">
						<input type="file" name="hinhanhlist[]"class="form-control" id="formGroupExampleInput2" >
             <?php endforeach ?>

					</fieldset>
					<?php foreach ($dulieumonan as $value): ?>

					<fieldset class="form-group">
						<label for="formGroupExampleInput">Giá gốc</label>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text">VND</span>
						  </div>
						  <input type="text" name="giagoc" value="<?= $value['price'] ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
						  
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Giá sau giảm</label>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text">VND</span>
						  </div>
						  <input type="text" name="giasaugiam" value="<?= $value['discount'] ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
						 
						</div>
					</fieldset>
					<fieldset class="form-group" >
						<label for="formGroupExampleInput2">Danh mục món ăn</label>
						<select class="form-control" id="danhmuctin" name="iddanhmuc">
							<?php $t= $value['catalog_id'] ?>
                        		<?php foreach ($dulieudm as $key => $value): ?>
                        			
                                <option value="<?= $value['id'] ?>"<?php if($t== $value['id']){ echo'selected'; } ?> ><?= $value['name'] ?></option>
                        		<?php endforeach ?>

                           
                           </select>
					</fieldset>
					<?php endforeach ?>

					<?php foreach ($dulieumonan as $key => $value): ?>

					<fieldset class="form-group">
						<label for="exampleFormControlTextarea1">Thêm nội dung món ăn</label>
                        <textarea class="form-control" id="noidungtin" rows="5" name="noidungtin"><?= $value['description'] ?></textarea>
					</fieldset>
					
					<?php endforeach ?>
					<fieldset>
						<input type="submit" class="btn-success btn-block" value="Lưu thông tin món ăn">
					</fieldset>

				</form>
			</div>
		</div>

	</div>
	<script>
	var editor = CKEDITOR.replace( 'noidungtin', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserWindowWidth: '1000',
    filebrowserWindowHeight: '700'
} );
    CKFinder.setupCKEditor( editor );

	</script>
	<script src="<?php echo base_url(); ?>vender/angular.min.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-animate.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-aria.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-messages.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-material.min.js"></script>
	<script src="<?php echo base_url(); ?>vender/ang1.js"></script>
</body>
</html>