<html>
<?php
if (isset($this->session->userdata['logged_in'])) {

header("location: http://localhost/006/user_authentication/user_login_process");
}
?>
<head>
<title>Đăng nhập</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<link rel="preconnect" href="https://fonts.gstatic.com">
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
<?php
if (isset($logout_message)) {
echo "<div class='message'>";
echo $logout_message;
echo "</div>";
}
?>
<?php
if (isset($message_display)) {
echo "<div class='message'>";
echo $message_display;
echo "</div>";
}
?>
<div class="container">
	<div class="row">
<div class="col-sm-6 offset-sm-3">
		
	
<div id="main">
<div id="login">
<h2>Đăng nhập</h2>
<hr/>
<?php echo form_open('../user_authentication/user_login_process'); ?>
<?php
echo "<div class='error_msg'>";
if (isset($error_message)) {
echo $error_message;
}
echo validation_errors();
echo "</div>";
?>
<label>Tài khoản :</label>
<input type="text" name="username" id="name" placeholder="username"/><br /><br />
<label>Mật khẩu :</label>
<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
<input type="submit" value=" Đăng nhập " name="submit"/><br />
<a href="<?php echo base_url() ?>user_authentication/user_registration_show">Đăng kí tại đây</a>
<?php echo form_close(); ?>
<a href="<?php echo base_url() ?>user_authentication/takepass">Lấy lại mật khẩu tại đây</a>
<?php echo form_close(); ?>
</div>
</div>
</div>
	</div>
</div>
<!-- endfooter1 -->
  <?php include('footer.php') ?>

  <script src="<?php echo base_url(); ?>js/jquery.js"></script>
   <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/jquery.js"><\/script>')</script>
    <script src="<?php echo base_url(); ?>js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/isotope.pkgd.js"></script>
    <script src="<?php echo base_url(); ?>js/holder.min.js"></script>
    <script src="<?php echo base_url(); ?>js/1.js"></script> 
</body>
</html>