<!doctype html>
<html lang="en">
  <head>
    <title>Thanh toán giỏ hàng</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="<?php echo base_url(); ?>fonts/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>css/1.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/form-validation.css">
    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 60%;
            box-sizing: border-box;
        }
    </style>

  </head>
  <body>
  
  
  
  <!-- checkout -->
  
<div class="container">






        <?php
if (isset($this->session->userdata['logged_in'])) {?>
<?php $username = ($this->session->userdata['logged_in']['username']);
 ?>
 <?php $email = ($this->session->userdata['logged_in']['email']);
 ?>
 <?php $phone = ($this->session->userdata['logged_in']['phone']);
 ?>
 <?php $id = ($this->session->userdata['logged_in']['id']);
 ?>
  <?php $address = ($this->session->userdata['logged_in']['address']);
 ?>

<?php
} else {
//header("location: login");

}
?>
        
              <div class="row">
        <div class="col-md-8 offset-sm-2 ">
            <div class="panel panel-default credit-card-box">
               
              <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Thanh toán đơn hàng</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" style="width: 50%;padding-top: 10px" src="<?php echo base_url(); ?>images/card12.png">
                        </div>
                    </div>                    
                </div>


                <div class="panel-body">
    
                    <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p><?php echo $this->session->flashdata('success'); ?></p>
                        </div>
                    <?php } ?>
                    <div>Tên khách hàng: <?= $ten ?></div>
                    <div>Mã đơn hàng: <?= $madon ?></div>
                    <div>Tổng giá trị đơn hàng: <?=  $this->cart->format_number($total); ?> VND</div>
     
                    <form role="form" action="<?php echo base_url(); ?>Cart/stripePost" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>" id="payment-form">
     
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> 
                                <input class='form-control' size='100' type='text'>
                            </div>
                        </div>
     
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Card Number</label> 
                                <input
                                    autocomplete='off' class='form-control card-number' size='100'
                                    type='text'>
                            </div>
                        </div>
      
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label>
                                 <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Month</label>
                                 <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Year</label>
                                 <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>
      
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide d-none'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
      
                        <div class="form-row row">
                            <div class="col-xs-12 form-group">
                              <input name="ten" type="hidden" value="<?= $ten ?>">
                              <input name="tongtien" type="hidden" value="<?= $total ?>">
                                <button class="btn btn-success text-center" type="submit">Pay Now</button>
                            </div>
                        </div>
                             
                    </form>
                </div>
            </div>        
        </div>
    </div>
              <!-- end -->







      
  </div>
  
   <!-- Optional JavaScript -->
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="<?php echo base_url(); ?>js/jquery.js"></script>
   <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/jquery.js"><\/script>')</script>
    <script src="<?php echo base_url(); ?>js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/isotope.pkgd.js"></script>
    <script src="<?php echo base_url(); ?>js/holder.min.js"></script>
    <script src="<?php echo base_url(); ?>js/1.js"></script> 
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>    
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
     
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
    
  });
      
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .removeClass('d-none')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
</script>
  
 </body>
</html>