<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quản lý thông tin đặt bàn</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/fonts/font-awesome.css">
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>css_server/bootstrap.min.css">
	<style>
		ul.tsc_pagination li a
{
border:solid 1px;
border-radius:3px;
-moz-border-radius:3px;
-webkit-border-radius:3px;
padding:6px 9px 6px 9px;
}
ul.tsc_pagination li
{
padding-bottom:1px;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{
color:#FFFFFF;
box-shadow:0px 1px #EDEDED;
-moz-box-shadow:0px 1px #EDEDED;
-webkit-box-shadow:0px 1px #EDEDED;
}
ul.tsc_pagination
{
margin:4px 0;
padding:0px;
overflow:hidden;
font:12px 'Tahoma';
list-style-type:none;
width: fit-content;
margin: auto;
}
ul.tsc_pagination li
{
float:left;
margin:0px;
padding:0px;
margin-left:5px;
display: -webkit-inline-box;
}
ul.tsc_pagination li a
{
color:black;
display:block;
text-decoration:none;
padding:7px 10px 7px 10px;
}
ul.tsc_pagination li a img
{
border:none;
}
ul.tsc_pagination li a
{
color:#333;
/*border-color:#333;*/
background:#fff;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{
text-shadow:0px 1px #388DBE;
/*border-color:#fff;*/
background:#feb72e;
background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #feb72e);

}
	</style>
	<script type="text/javascript" src="<?php echo base_url(); ?>css_server/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css_server/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css_server/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>css_server/bootstrap.min.js"></script>
    
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
			<div class="col-sm-12 text-sm-center ">
				<h3>Thông tin khách đặt giao tận nhà</h3>
			</div>
			<div class="ml-3">    
       <form method="POST" class="d-flex" action="<?php echo base_url(); ?>home/don_info" enctype="multipart/form-data" >
        <div class="form-group">
          <select class="form-control" name="luachon" id="">
            <option value="" selected="selected">Tất cả</option>
            <option value="5don" <?php echo set_select('luachon','5don'); ?>>5 đơn hàng gần đây</option>
            <option value="1thang" <?php echo set_select('luachon','1thang'); ?> >1 tháng gần đây</option>
            <option value="huy" <?php echo set_select('luachon','huy'); ?> >Đơn hàng hủy</option>
            <option value="hoanthanh" <?php echo set_select('luachon','hoanthanh'); ?> >Đơn hàng hoàn thành</option>
          </select>
        </div>
          <button type="submit" class="btn btn-primary ml-2 ">Lọc</button>
        
      </form>
    </div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-12">
				<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã đơn</th>
      <th scope="col">Tài khoản</th>
      <th scope="col">Tổng tiền</th>
      <th scope="col">Hình thức thanh toán</th>
      <th scope="col">Ngày đặt</th>
      <th scope="col">Tình trạng</th>
      <th scope="col">Hành động</th>
      <th scope="col">Thông tin</th>


    </tr>
  </thead>
  <tbody >
  	<?php $i=0;
  		 ?>
  	<?php foreach ($results as $key => $value): ?>
<tbody ng-controller="controller7">
    <tr >
      <th scope="row"><?= $i=$i+1; ?></th>
      <td><?= $value['id'] ?></td>
      <td><?= $value['user_name'] ?></td>
      <td><?= $value['total'] ?> VND</td>
      <td><?= $value['payment_info'] ?></td>
      <?php $time = gmdate('d-m-Y',$value['ngaydat']); ?>
      <td><?= $time ?></td>
      <td><?php if ($value['status']==NULL) {
      	echo 'Đang xử lý';
      } elseif($value['status']==0) {
      	echo 'Đơn đã bị hủy';
      }elseif ($value['status']==1) {
        echo 'Hoàn thành';
      } ?></td>
      <td>
      	<?php if ($value['status']==NULL) { ?>

      		<a class="btn-danger p-1" style="text-decoration: none;" href="<?php echo base_url(); ?>cart/huydon/<?= $value['id'] ?>">Hủy đơn hàng</a>

<a class="btn-success p-1" style="text-decoration: none;" href="<?php echo base_url(); ?>cart/hoanthanh/<?= $value['id'] ?>">Xác nhận hoàn thành</a>

      	<?php } elseif ($value['status']==1) { ?>

      		<a class="btn-info p-1" style="text-decoration: none;" href="#">In đơn hàng</a>
    <input type="hidden" class="tengiaodich" value="<?= $value['id'] ?>">


      	<?php } ?>
      </td>
      <td>
      	<button class="pl-1 pr-1 btn-primary xemchitiet" ng-click="xemchitiet()" ng-init="id = '<?php echo $value['id']; ?>' " >Xem chi tiết</button>
      </td>
      <tr class="thongtindon">
    	<td colspan="9">

<div class="col-sm-8 offset-sm-2" >
		<div class="text-center" style="font-size: 20px;font-weight: bolder;">Thông tin chi tiết</div>
		<li class="list-group-item justify-content-between">
            <div>Họ tên: <?= $value['user_name'] ?></div>
            <div>Số điện thoại: <?= $value['user_phone'] ?></div>
            <div>Địa chỉ: <?= $value['user_address'] ?></div>
            <div>Email: <?= $value['user_email'] ?></div>


          </li>
		 <li class="list-group-item d-flex justify-content-between lh-condensed" ng-repeat="motdon in donchitiet">
            <div>
              <h6 class="my-0">{{motdon.name}}</h6>
              <small class="text-muted">Sl: {{motdon.qty}}</small>
            </div>
            <span class="text-muted">{{motdon.amount}} VND</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Tổng tiền</span>
            <strong><?= $value['total'] ?> VND</strong>
          </li>
		
	</div>	
    		
    	</td>
  	
  	</tr>

      
      
    </tr>
    </tbody>
  	<?php endforeach ?>
    
  </tbody>
</table>

			<div id="pagination">
<ul class="tsc_pagination">

<!-- Show pagination links -->
<?php foreach ($links as $link) {?>
	<li><?= $link ?></li>
<?php } ?>
</ul>
</div>
			</div>
		</div>
	</div>
   <script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script>
	$(document).ready(function() {
		$('.thongtindon').slideUp();
		$('.xemchitiet').click(function (){
			
			$(this).parent().parent().next().slideToggle();
			if ($(this).text() == "Xem chi tiết") {
                $(this).text("Đóng");
                $(this).css({
                	background: 'red'                });
        }
        else {
             $(this).text("Xem chi tiết");
             $(this).css({
             	background: '#007bff'             });        
        }



		});
		//
		$('.btn-info').click(function(event) {
			console.log('tada');
			/* Act on the event */
			var id=$(this).next().val();
			console.log(id);

var w = window.open('inhoadon/'+id,'name','width=800,height=500');
w.onload = w.print;
w.focus();

		});
		
		
	});
</script>
<script src="<?php echo base_url(); ?>vender/angular.min.js"></script>
<script src="<?php echo base_url(); ?>vender/angular-animate.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-aria.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-messages.js"></script>
	<script src="<?php echo base_url(); ?>vender/angular-material.min.js"></script>
<script src="<?php echo base_url(); ?>vender/ang1.js"></script>


</body>
</html>