<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
	   $this->load->model('updatesline_model');
	   $this->load->model('danhmuc_model');
	   $this->load->model('product_model');
	   $this->load->model('billing_model');
	   $this->load->model('Book_model');
	   $this->load->helper(array('url', 'form'));
	   $this->load->library('form_validation');
	   $this->load->library('email');






	}

	public function index()
	{

		$dulieu1 =$this->updatesline_model->getdulieuheader();
        $dulieuheader=json_decode($dulieu1,true);
	    $dulieutintuctrangchu=$this->danhmuc_model->laytintucloadtrangchu();



		$dulieu = [
		    'dulieuheader' => $dulieuheader,
		    'dulieunewstrangchu' => $dulieutintuctrangchu
		    
		];
		
		$this->load->view('cart',$dulieu,FALSE);
		

	}
	function add()
	{
		$data = array(
			'id'      => $this->input->post('id'),
			'qty'     => $this->input->post('soluong'),
			'price'   => $this->input->post('discount'),
			'name'    => $this->input->post('namemon')
		);
		
		$this->cart->insert($data);
		

	}
	function addfavorite()
	{
		$id_user=$this->input->post('id_user');
		$id_product=$this->input->post('id_product');
		$dl = [
		    'id_user' =>$id_user,
		    'id_product'=>$id_product 
		];
		$this->product_model->getfavoritesp($dl);
		
		
	}
	function remove($rowid) {
	// Check rowid value.
	if ($rowid==="all"){
	// Destroy data which store in session.
	$this->cart->destroy();
	}else{
	// Destroy selected rowid in session.
	$data = array(
	'rowid' => $rowid,
	'qty' => 0
	);
	// Update cart data, after cancel.
	$this->cart->update($data);
	}

	// This will show cancel data in cart.
	redirect('../cart');
	}



		function update_cart1(){

		// Recieve post values,calcute them and update

		
		$sl=$this->input->post('soluong');
		// echo "<pre>";
		// var_dump ($sl);
		// echo "</pre>";
			
		
		foreach( $this->cart->contents() as $id => $cart)
		{
		$rowid = $cart['rowid'];
		$price = $cart['price'];
		$amount = $price * $cart['qty'];
		$qty = $sl;

		$data = array(
		'rowid' => $rowid,
		// 'price' => $price,
		// 'amount' => $amount,
		'qty' => $qty
		);

		$this->cart->update($data);
		}
		redirect('../cart');
		}




	function checkout()
	{
		$dulieu1 =$this->updatesline_model->getdulieuheader();
        $dulieuheader=json_decode($dulieu1,true);
	    $dulieutintuctrangchu=$this->danhmuc_model->laytintucloadtrangchu();



		$dulieu = [
		    'dulieuheader' => $dulieuheader,
		    'dulieunewstrangchu' => $dulieutintuctrangchu
		    
		];
		
		$this->load->view('checkout',$dulieu,FALSE);
		
	}
	//ordertable cho user
	function savetable ()
	{
		$userid=$this->input->post('id');
		$email=$this->input->post('email');
		$ten=$this->input->post('name');
		$ngaydat=$this->input->post('ngay');
	   $ngaydat=strval( $ngaydat ) ;
	   $giodat=$this->input->post('gio');
	   $giodat=strval($giodat);
	   $giodat=$ngaydat." ".$giodat;
		   
		$songuoi=$this->input->post('songuoi');
		$total = $this->cart->total();
		$pay="Thanh toán tại bàn";
	    $id_giaodich =$this->billing_model->insertgiaodich($userid,$pay,$total);
		if ($cart = $this->cart->contents()):
		foreach ($cart as $item):
		$order_detail = array(
		'transaction_id' => $id_giaodich,
		'product_id' => $item['id'],
		'qty' => $item['qty'],
		'amount' => $totalmon=$item['qty']*$item['price']
		);
		$dl=$this->billing_model->insertproduct_order($order_detail);
		$this->Book_model->insertdatabook($id_giaodich,$ngaydat,$giodat,$songuoi);

		if ($dl) {
		$this->cart->destroy();
		}
		endforeach;
				$this->load->view('xacnhandatmonthanhcong');

		endif;

	}
	//saveorder cho user
	function save_oderuser()
	{
		$userid=$this->input->post('id');
		$email=$this->input->post('email');
		$ten=$this->input->post('name');

		if (isset($_POST['submit'])) {
        if(!empty($_POST['paymentMethod'])) {
            $pay=$_POST['paymentMethod'];
            //echo $pay;
                                    }}
                                    
        $total = $this->cart->total();

	    $id_giaodich =$this->billing_model->insertgiaodich($userid,$pay,$total);
		if ($cart = $this->cart->contents()):
		foreach ($cart as $item):
		$order_detail = array(
		'transaction_id' => $id_giaodich,
		'product_id' => $item['id'],
		'qty' => $item['qty'],
		'amount' => $totalmon=$item['qty']*$item['price']
		);
		$dl=$this->billing_model->insertproduct_order($order_detail);

		if ($dl) {
		$this->cart->destroy();
		}


		endforeach;
	    $dl1=$this->billing_model->getdulieumondat($id_giaodich);
	    $dl3=$this->billing_model->gettransactiondulieu($id_giaodich);
	    $dl2=[
	        'dulieumondat' =>$dl1,
	        'ten'=> $ten,
	        'total'=>$total,
	        'madon'=>$id_giaodich,
	        'dulieugiaodich'=>$dl3
	    ];
		//Configure email library
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'thanhpppp360@gmail.com';
		$config['smtp_pass'] = '0367159124';
		$config['smtp_timeout'] = 5;
		$config['mailtype'] = 'html';
		$config['newline'] = "\r\n";
		$this->email->initialize($config);

		// Sender email address
		$this->email->from('thanhpppp360@gmail.com','Nhà hàng Artica');
		// Receiver email address
		$this->email->to($email);
		$this->email->subject('Nhà hàng xác nhận đơn đặt món!');
		$this->email->message($this->load->view('emailcomfirmdonhang',$dl2,true));
		if ($this->email->send()) {
	   	//$this->load->view('xacnhanbook');
		//echo 'thanh cong';
		} else {
		     // echo 'Invalid Gmail Account or Password !';
		}
		


		//phần thanh toán credit
		if ($pay=='Credit Card') {

			$this->load->view('paycard',$dl2,FALSE);

			
		}
		else{
		$this->load->view('xacnhandatmonthanhcong');

		}
		 endif;




	}


		public function stripePost()
    {
    	$total = $this->input->post('tongtien');
        require_once('application/libraries/stripe-php/init.php');
    
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
     
        \Stripe\Charge::create ([
                "amount" => $total,
                "currency" => "VND",
                "source" => $this->input->post('stripeToken'),
                "description" => "Thanh toán từ trang Artica"
     
        ]);
            
        $this->session->set_flashdata('success', 'Payment made successfully.');
             
        redirect('../home', 'refresh');
    }
    



	function huydon($id)
    {
        $dl = [
            'status' => 0 
        ];
        $this->billing_model->huydulieudon($id,$dl);
    	redirect('../home/don_info','refresh');

        
    }
    function hoanthanh($id)
    {
    	$dl = [
    	    'status' => 1
    	];
    	$this->billing_model->huydulieudon($id,$dl);
    	redirect('../home/don_info','refresh');

    	
    }




	function save_oder()
	{
		// This will store all values which inserted from user.
$customer = array(
'name' => $this->input->post('name'),
'email' => $this->input->post('email'),
'address' => $this->input->post('address'),
'phone' => $this->input->post('phone')


);

// And store user information in database.

$cust_id = $this->billing_model->insert_customer($customer);
// $order = array(
// 'date' => date('Y-m-d'),
// 'customerid' => $cust_id
// );

// $ord_id = $this->billing_model->insert_order($order);

// if ($cart = $this->cart->contents()):
// foreach ($cart as $item):
// $order_detail = array(
// 'orderid' => $ord_id,
// 'productid' => $item['id'],
// 'quantity' => $item['qty'],
// 'price' => $item['price']
// );

// Insert product imformation with order detail, store in cart also store in database.

// $cust_id = $this->billing_model->insert_order_detail($order_detail);
// endforeach;
// endif;

// After storing all imformation in database load "billing_success".
//$this->load->view('xacnhanbook');


	}

	
	

}

/* End of file Cart.php */
/* Location: ./application/controllers/Cart.php */