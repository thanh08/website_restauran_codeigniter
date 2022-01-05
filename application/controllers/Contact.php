<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	   $this->load->model('updatesline_model');
	   $this->load->model('Book_model');
	   $this->load->model('danhmuc_model');
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
		$this->load->view('contact', $dulieu, FALSE);
		
	}
	function insertlienhe()
	{
		$name=$this->input->post('name');
		$sdt=$this->input->post('sdt');
		$email=$this->input->post('email');
		$diachi=$this->input->post('address');
		$noidung=htmlspecialchars($this->input->post('content'));
		$dulieu = [
		    'name' =>$name,
		    'email' =>$email,
		    'sdt'=>$sdt,
		    'address'=>$diachi,
		    'content'=>$noidung

		];
		$dulieu=$this->Book_model->insertdatacontact($dulieu);
		if ($dulieu) {
	   	$this->load->view('thanhcongcontact');
			
		}
		// echo "<pre>";
		// var_dump($noidung);
		// echo "</pre>";
		

	}
	function showcontact()
	{
		$dulieu=$this->Book_model->getcontact();
		$dulieu = [
		    'dulieucontact' =>$dulieu 
		];
		
		$this->load->view('contact_view', $dulieu, FALSE);
	}
	function comfirm_contact($id,$status,$email)
	{
		if ($status==0) {
			$status=1;
		}

		$this->Book_model->comfirm_contact($id,$status);
	    $dulieu=$this->Book_model->getdatacontact($id);
		$dl = [
		    'dlbook' =>$dulieu
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
		$this->email->subject('Nhà hàng nhận được phản hồi của bạn!');
		$this->email->message($this->load->view('emailcontact',$dl, true));
		if ($this->email->send()) {
	   	$this->load->view('xacnhanbook');
		} else {
		      echo 'Invalid Gmail Account or Password !';
		}



		
	}

}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */