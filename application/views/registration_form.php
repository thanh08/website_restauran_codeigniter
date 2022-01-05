<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
header("location: http://localhost/006/user_authentication/user_login_process");
}
?>
<head>
<title>Đăng kí</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/font-awesome.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/1.css">
</head>
<body>
	<!-- topheader -->
  <?php include('header.php') ?>
   <!-- end topheader -->
<div id="main">
<div id="login">
<h2>Đăng kí</h2>
<hr/>
<?php
echo "<div class='error_msg'>";
echo validation_errors();
echo "</div>";
echo form_open('../user_authentication/new_user_registration');

echo form_label('Tài khoản : ');
echo"<br/>";
echo form_input('username');
echo "<div class='error_msg'>";
if (isset($message_display)) {
echo $message_display;
}
echo "</div>";
echo"<br/>";
echo form_label('Email : ');
echo"<br/>";
$data = array(
'type' => 'email',
'name' => 'email_value'
);
echo form_input($data);
echo"<br/>";
echo"<br/>";
echo form_label('Số điện thoại : ');
echo"<br/>";
echo form_input('sdt');
echo"<br/>";
echo"<br/>";
echo form_label('Địa chỉ : ');
echo"<br/>";
echo form_input('diachi');
echo"<br/>";
echo"<br/>";
echo form_label('Mật khẩu : ');
echo"<br/>";
echo form_password('password');
echo"<br/>";
echo"<br/>";
echo form_submit('submit', 'Đăng kí');
echo form_close();
?>
<a href="<?php echo base_url() ?>/user_authentication ">Đăng nhập tại đây</a>
</div>
</div>
	
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
   <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/jquery.js"><\/script>')</script>
    <script src="<?php echo base_url(); ?>js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/isotope.pkgd.js"></script>
    <script src="<?php echo base_url(); ?>js/holder.min.js"></script>
    <script src="<?php echo base_url(); ?>js/1.js"></script> 
</body>
</html>