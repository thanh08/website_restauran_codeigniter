<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	  $this->load->model('updatesline_model');

	}

	public function index()
	{
	  //$this->load->view('home_view');
	  $ketqua=$this->updatesline_model->getdatasline();
	  $dulieu =$this->updatesline_model->getdulieuheader();
	  $ketqua = json_decode($ketqua,true);
      $dulieuheader=json_decode($dulieu,true);

	  $ketqua = [
	      'dulieusline' => $ketqua,
		  'dulieuheader' => $dulieuheader

	  ];
	  // echo "<pre>";
	  // var_dump($ketqua);
	  // echo "</pre>";
	  $this->load->view('Trangchu', $ketqua, FALSE);
	  //$this->load->view('header', $ketqua, FALSE);




	  
	}
	
	function editdulieuheader()
	{
		$this->load->model('updatesline_model');
		$dulieu =$this->updatesline_model->getdulieuheader();
		$dulieuheader=json_decode($dulieu,true);
		
		$dulieus = [
		    'dulieuheader' => $dulieuheader
		];
		
		// echo "<pre>";
		// var_dump($dulieus['dulieuheader']['mangxahoi']['linksky']);
		// echo "</pre>";
		// die();
		$this->load->view('header_view', $dulieus, FALSE);
		
	}
	function updateheader()
	{
		$linkfb=$this->input->post('linkfb');
		$linktwitter = $this->input->post('linktwitter');
		$linksky=$this->input->post('linksky');
		$linktum = $this->input->post('linktum');
		$texthostline =$this->input->post('texthost');
		$sdt = $this->input->post('sdt');
		$textgio=$this->input->post('textgio');
		$gio = $this->input->post('gio');

		//xu ly lay logo
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '1000000';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('logo')){
			$error = array('error' => $this->upload->display_errors());
			$logo=$this->input->post('logocu');
			//echo $logo;
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			$filelogo=$data["upload_data"]["file_name"];
			$logo= base_url().'uploads/'.$filelogo;
			//echo $logo;
			
		}
		$dulieu = [
		    'mangxahoi' =>['linkfb'=>$linkfb,'linktwitter'=>$linktwitter,'linksky'=>$linksky,'linktum'=>$linktum],
		    'hotline' =>['text'=>$texthostline,'sdt'=>$sdt] ,
		    'giomocua' => ['text'=>$textgio,'gio'=>$gio],
		    'logo'=>$logo
		];
		// echo "<pre>";
		// var_dump($dulieu);
		// echo "</pre>";
		// die();
		$dulieu=json_encode($dulieu);
		$this->load->model('updatesline_model');
		if ($this->updatesline_model->updatedulieuheader($dulieu)) {
			$this->load->view('success_header');
		}


		
	}

	function getdatabook()
	{
	   $ten =$this->input->post('ten');
	   $email=$this->input->post('email');
	   $ngaydat=$this->input->post('ngay');
	   $ngaydat=strval( $ngaydat ) ;

	   $giodat=$this->input->post('gio');
	   $giodat=strval($giodat);
	   $giodat=$ngaydat." ".$giodat;
	   $sdt=$this->input->post('sdt');
	   $songuoi=$this->input->post('songuoi');
	   
	   $this->load->model('Book_model');
	   if ($ketqua=$this->Book_model->insertdatabook($ten,$email,$sdt,$ngaydat,$giodat,$songuoi)) {
	   	$this->load->view('thanhcongbook');
	   }
	}
	function showbook()
	{
		$this->load->model('Book_model');
		$dulieu=$this->Book_model->showdatabook();
		$dulieu = [
		    'dulieubook' =>$dulieu 
		];
		$this->load->view('book_view',$dulieu);

		// echo "<pre>";
		// var_dump($dulieu['dulieubook'][0]);
		// echo "</pre>";
		
	}
	function comfirm_book($id,$tinhtrang)
	{
		if ($tinhtrang==0) {
			$tinhtrang=1;
		}

		$this->load->model('Book_model');
		if ($this->Book_model->comfirm_book($id,$tinhtrang)) {
	   	$this->load->view('xacnhanbook');
	   }


		
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */