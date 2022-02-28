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
<div class="container">
	<div class="row">
<div class="col-sm-8 offset-sm-2" style="height: 500px;">
  <h3 class="text-sm-center" style="padding-top: 100px; padding-bottom: 20px;">Lấy lại mật khẩu</h3>
		
<form id="resetPassword" name="resetPassword" method="post" action="<?php echo base_url();?>user_authentication/ForgotPassword" onsubmit ='return validate()'>
  <?php
echo "<div class='error_msg'>";
if (isset($error_message)) {
echo $error_message;
}
echo validation_errors();
echo "</div>";
?>
                    <table class="table table-bordered table-hover table-striped">
                        <tbody>
                        <tr>
                            <td>Nhập email đã dùng đăng kí tài khoản: </td>
                            <td>
                                <input type="email" name="email" id="email" style="width:250px" required>
                            </td>
                            <td><input type = "submit" value="Gửi đi" class="button"></td>
                        </tr>

                        </tbody>               

                      </table>

                  </form>
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