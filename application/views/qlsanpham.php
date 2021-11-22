<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quản lý sản phẩm</title>
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>css_server/bootstrap.css">
	<script src="<?php echo base_url() ?>ckeditor/ckeditor.js"></script>
	<script src="<?php echo base_url() ?>ckeditor/ckfinder/ckfinder.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css_server/jquery.min.js"></script>

</head>
<body ng-app="myApp">
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
				<h2 class="text-center">Thêm món ăn</h2>
				<form action="<?php echo base_url(); ?>product/themmonan" method="post" enctype="multipart/form-data" ng-controller="controller3">
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Tiêu đề món ăn</label>
						<input type="text" name="tieude" class="form-control" id="formGroupExampleInput" placeholder="">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Mô tả món ăn</label>
						<input type="text" name="mota" class="form-control" id="formGroupExampleInput" placeholder="">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Ảnh của món ăn</label>
						<input type="file" name="hinhanh" class="form-control">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Giá gốc</label>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text">VND</span>
						  </div>
						  <input type="text" name="giagoc" class="form-control" aria-label="Amount (to the nearest dollar)">
						  <div class="input-group-append">
						    <span class="input-group-text">.00</span>
						  </div>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Giá sau giảm</label>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text">VND</span>
						  </div>
						  <input type="text" name="giasaugiam" class="form-control" aria-label="Amount (to the nearest dollar)">
						  <div class="input-group-append">
						    <span class="input-group-text">.00</span>
						  </div>
						</div>
					</fieldset>
					<fieldset class="form-group" >
						<label for="exampleFormControlSelect1">Chọn danh mục món ăn</label>
                        <select class="form-control" id="danhmucsp" name="iddanhmuc"
                        >
                        	<option ng-repeat="motdanhmuc in danhmucsp" value="{{motdanhmuc.id}}">{{motdanhmuc.name}}</option>
                           
                           </select>
					</fieldset>
					<fieldset class="form-group">
						<label for="exampleFormControlTextarea1">Mô tả chi tiết món ăn</label>
                        <textarea class="form-control" id="noidungtin" rows="5" name="noidungtin"></textarea>
					</fieldset>
					<input type="submit" value="lưu thông tin " class="btn-success d-block m-auto">

				</form>
			</div><!--  end thêm món -->

		   <div class="col-sm-6">
			<h2 class="text-center">Chỉnh sửa món ăn</h2>
			<div class="card-deck">
					
				  <div class="card mt-2" style="flex: none; width: 200px;">
				    <img class="card-img-top" src="" alt="Card image cap">
				    <div class="card-body">
				      <h5 class="card-title">Tiêu đề món ăn</h5>
				      <p class="card-text" style="font-size: 14px;font-style: italic;">thông tin</p>
				    </div>
				    <div class="card-footer">
				      <small class="text-muted">thông tin</small>
				    </div>
				    <div class="card-footer">
				    	<a href="" class="btn-warning btn-lg">Sửa</a>

				    	<a href="" class="btn-danger btn-lg">xóa</a>

				    </div>

				  </div>

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


	</script>
	<script src="<?php echo base_url(); ?>vender/angular.min.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-animate.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-aria.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-messages.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-material.min.js"></script>
	<script src="<?php echo base_url(); ?>vender/ang1.js"></script>
</body>
</html>