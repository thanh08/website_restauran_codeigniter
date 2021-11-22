<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Danh muc</title>
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
			<div class="col-sm-6">
				<!-- <form action="<?php echo base_url(); ?>News/addDanhmuc" method="post" enctype="multipart/form-data" > -->
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Thêm danh mục tin tức</label>
						<input type="text" name="danhmuc" id="danhmuc" class="form-control" id="formGroupExampleInput" placeholder="Nhập tên danh mục">
					</fieldset>
					<fieldset class="form-group">
						<input type="button" id="nut1" class="btn-success text-center" value="Lưu lại thông tin">
					</fieldset>
				<!-- </form> -->
			</div>
			<div class="col-sm-6 them">
				<div class="card text-white bg-success">
					<div class="card-header">Danh sách danh mục tin tức</div>
				</div>


				  	<?php foreach ($dulieu as $key => $value): ?>
				  		
				<div class="card mt-3">

				  <div class="card-header ">
				  	<span class="vtdanhmuc"><?= $value['tendanhmuc'] ?></span> 
				    <a class=" sua btn-warning p-2 float-right <?php if ($value['id'] == 54 ) {echo "d-none";} ?>"  data-href="<?php echo base_url(); ?>News/suaDanhmuc/<?= $value['id'] ?>" >Sửa</a>
				    <a data-href="<?php echo base_url(); ?>News/xoaDanhmuc/<?= $value['id'] ?>"  class=" xoa btn-danger p-2 float-right <?php if ($value['id'] == 54 ) {echo "d-none";} ?>">Xóa</a>
				  </div>
				  <div class="khoiedit d-none">
				  	<input type="hidden" value="<?= $value['id'] ?>">
				  	<input type="text" name="danhmucsua" value="<?= $value['tendanhmuc'] ?>">
				  	<a data-href="" class="btn-success p-1 float-right luuedit">Lưu</a>

				  </div>

				</div>
				  	<?php endforeach ?>




			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url(); ?>css_server/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css_server/popper.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>css_server/bootstrap.min.js"></script>
	<script>
		$(function () {
			duongdan='<?php echo base_url(); ?>';
			//phần thêm danh mục bằng ajax
			$('#nut1').click(function () {
				$.ajax({
					url: duongdan+'News/addDanhmucbyajax',
					type: 'post',
					dataType: 'json',
					data: {danhmuc:$('#danhmuc').val()},
				})
				.done(function() {
					//console.log("success");
				})
				.fail(function() {
					//console.log("error");
				})
				.always(function(res) {
					//console.log(res);
					noidung ='<div class="card mt-3">';
					noidung +='<div class="card-header ">';
					noidung += '<span class="vtdanhmuc" >'+$('#danhmuc').val()+'</span> ';
					noidung +='<a data-href="<?php echo base_url(); ?>News/suaDanhmuc/'+res+'" class="sua btn-warning p-2 float-right ">Sửa</a>';
					noidung +='<a data-href="<?php echo base_url(); ?>News/xoaDanhmuc/'+res+'" class="xoa btn-danger p-2 float-right ">Xóa</a>';
					noidung +='</div>';
					noidung +='<div class="khoiedit d-none">';
					noidung +='<input type="text" name="danhmucsua" class="" value="'+$('#danhmuc').val()+'">';
					noidung +='<a data-href="" class="btn-success p-1 float-right luuedit">Lưu</a>';
					noidung +='</div>'

					noidung +=' </div>';	
					$('.them').append(noidung);
					$('#danhmuc').val('');
					
				});
				
			});

			//phan xoa bằng ajax
			$('body').on('click', '.xoa', function(event) {
				link=$(this).data('href');
				doituongxoa=$(this).parent().parent();
				$.ajax({
					url: link ,
					type: 'post',
					dataType: 'json',
				})
				.done(function() {
					//console.log("success");
				})
				.fail(function() {
					//console.log("error");
				})
				.always(function() {
					console.log("complete");
					doituongxoa.remove();

				});
				

			});
			//phần edit bằng ajax
			$('body').on('click', '.sua', function(event) {
				//console.log('click');
				$(this).parent().addClass('d-none');
				$(this).parent().next().removeClass('d-none');


			});
			//xu ly sau khi thay doi noi dung
			$('body').on('click', '.luuedit', function(event) {
				//console.log('click');
				noidungsua=$(this).prev().val();
				idsua=$(this).prev().prev().val();
				//console.log(idsua);
				$(this).parent().addClass('d-none');
				$(this).parent().prev().removeClass('d-none');
				$(this).parent().prev().children('.vtdanhmuc').html(noidungsua);




				$.ajax({
					url: duongdan+'News/editdanhmuc',
					type: 'post',
					dataType: 'json',
					data: {id:idsua,
							ten:noidungsua
						},
				})
				.done(function() {
					//console.log("success");
				})
				.fail(function() {
					//console.log("error");
				})
				.always(function() {
					//console.log("complete");

				});
				
			});
			
    
});
   </script>
</body>
</html>