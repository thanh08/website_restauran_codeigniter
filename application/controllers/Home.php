<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	  $this->load->model('updatesline_model');
	  $this->load->model('product_model');
	  $this->load->model('danhmuc_model');
	 $this->load->model('Book_model');
	 $this->load->model('pagination_model');
	 $this->load->model('billing_model');
     $this->load->library('pagination');
     $this->load->library('form_validation');


	   $this->load->library('email');
	   $this->load->library('encryption');



	}

	public function index()
	{
	  $ketqua=$this->updatesline_model->getdatasline();
	  $dulieu =$this->updatesline_model->getdulieuheader();
	  $ketqua = json_decode($ketqua,true);
      $dulieuheader=json_decode($dulieu,true);
      $dulieudanhmuc=$this->product_model->getdanhmucsp();
	  $dulieumonan=$this->product_model->getdulieumonan();
	  $dulieumonan1=$this->product_model->getdulieumonan1();
	  $dulieutintuctrangchu=$this->danhmuc_model->laytintucloadtrangchu();

	  $ketqua = [
	      'dulieusline' => $ketqua,
		  'dulieuheader' => $dulieuheader,
		  'dulieudanhmuc' => $dulieudanhmuc,
		    'dulieumonan' => $dulieumonan,
		    'dulieumonan1' => $dulieumonan1,
		    'dulieunewstrangchu' => $dulieutintuctrangchu

	  ];
	  // echo "<pre>";
	  // var_dump($ketqua);
	  // echo "</pre>";
	  $this->load->view('Trangchu', $ketqua, FALSE);




	  
	}
	//in hoa don
	function inhoadon($id_giaodich)
	{
		echo $id_giaodich;
		$dl1=$this->billing_model->getdulieumondat($id_giaodich);
	    $dl3=$this->billing_model->gettransactiondulieu1($id_giaodich);
	    $dl2=[
	        'dulieumondat' =>$dl1,
	        'madon'=>$id_giaodich,
	        'dulieugiaodich'=>$dl3
	    ];
	    // echo "<pre>";
	    // var_dump ($dl2);
	    // echo "</pre>";
	    $this->load->view('hoadon', $dl2, FALSE);
		// $dulieu=$this->Book_model->getdatacontact(1);
		// $dl = [
		//     'dlbook' =>$dulieu
		// ];
		// $this->load->view('emailcontact',$dl,FALSE);
		
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
		$gioithieu=$this->input->post('gioithieu');
		$email=$this->input->post('email');
		$diachi=$this->input->post('diachi');

		//xu ly lay logo
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '1000000';
		
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

		//xu ly lay logo
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '1000000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('logofooter')){
			$error = array('error' => $this->upload->display_errors());
			$logofooter=$this->input->post('logofootercu');
			//echo $logo;
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			$filelogo=$data["upload_data"]["file_name"];
			$logofooter= base_url().'uploads/'.$filelogo;
			//echo $logo;
			
		}
		$dulieu = [
		    'mangxahoi' =>['linkfb'=>$linkfb,'linktwitter'=>$linktwitter,'linksky'=>$linksky,'linktum'=>$linktum],
		    'hotline' =>['text'=>$texthostline,'sdt'=>$sdt] ,
		    'giomocua' => ['text'=>$textgio,'gio'=>$gio],
		    'logo'=>$logo,
		    'gioithieu'=>$gioithieu,
		    'email'=>$email,
		    'logofooter'=>$logofooter,
		    'diachi'=>$diachi

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

	// function getdatabook()
	// {
	//    $ten =$this->input->post('ten');
	//    $email=$this->input->post('email');
	//    $ngaydat=$this->input->post('ngay');
	//    $ngaydat=strval( $ngaydat ) ;

	//    $giodat=$this->input->post('gio');
	//    $giodat=strval($giodat);
	//    $giodat=$ngaydat." ".$giodat;
	//    $sdt=$this->input->post('sdt');
	//    $songuoi=$this->input->post('songuoi');
	   
	//    $this->load->model('Book_model');
	//    if ($ketqua=$this->Book_model->insertdatabook($ten,$email,$sdt,$ngaydat,$giodat,$songuoi)) {
	//    	$this->load->view('thanhcongbook');
	//    }
	// }
	// function showbook()
	// {
	// 	$this->load->model('Book_model');
	// 	$dulieu=$this->Book_model->showdatabook();
	// 	$dulieu = [
	// 	    'dulieubook' =>$dulieu 
	// 	];
	// 	$this->load->view('book_view',$dulieu);

	// 	// echo "<pre>";
	// 	// var_dump($dulieu['dulieubook'][0]);
	// 	// echo "</pre>";
		
	// }
	// function comfirm_book($id,$tinhtrang,$email)
	// {
	// 	if ($tinhtrang==0) {
	// 		$tinhtrang=1;
	// 	}
	// 	$this->Book_model->comfirm_book($id,$tinhtrang);
	// 	$dulieu=$this->Book_model->getdatabook($id);
	// 	$dl = [
	// 	    'dlbook' =>$dulieu
	// 	];



	//     //Configure email library
	// 	$config['protocol'] = 'smtp';
	// 	$config['smtp_host'] = 'ssl://smtp.googlemail.com';
	// 	$config['smtp_port'] = 465;
	// 	$config['smtp_user'] = 'thanhpppp360@gmail.com';
	// 	$config['smtp_pass'] = '0367159124';
	// 	$config['smtp_timeout'] = 5;
	// 	$config['mailtype'] = 'html';
	// 	$config['newline'] = "\r\n";
	// 	$this->email->initialize($config);

	// 	// Sender email address
	// 	$this->email->from('thanhpppp360@gmail.com','Nhà hàng Artica');
	// 	// Receiver email address
	// 	$this->email->to($email);
	// 	$this->email->subject('Nhà hàng xác nhận đơn đặt bàn!');
	// 	$this->email->message($this->load->view('emailcomfirm',$dl, true));
	// 	if ($this->email->send()) {
	//    	$this->load->view('xacnhanbook');
	// 	} else {
	// 	      echo 'Invalid Gmail Account or Password !';
	// 	}


		
	// }
	// Set array for PAGINATION LIBRARY, and show view data according to page.
        public function don_info(){
        $config = array();
        $config["base_url"] = base_url() . "home/don_info";
        $total_row = $this->pagination_model->record_count();
        $config["total_rows"] = $total_row;
        $config["per_page"] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        if($this->uri->segment(3)){
        $page = ($this->uri->segment(3)) ;
        }
        else{
        $page = 1;
        }
        $dl=$this->input->post('luachon');
        if ($dl=='5don') {
            //echo '5don';
    
        	        $data["results"] = $this->pagination_model->fetch_data5day(5,$page);
        	        // echo "<pre>";
        	        // print_r ($data["results"]);
        	        // echo "</pre>";

        }elseif ($dl=='1thang') {
                $data["results"] = $this->pagination_model->fetch_data1thang();
        	        // echo "<pre>";
        	        // print_r ($data["results"]);
        	        // echo "</pre>";

        }elseif ($dl=='huy') {
                $data["results"] = $this->pagination_model->fetch_datahuy();
        	        // echo "<pre>";
        	        // print_r ($data["results"]);
        	        // echo "</pre>";

        }
        elseif ($dl=='hoanthanh') {
        	//echo 'hoan thanh';
                $data["results"] = $this->pagination_model->fetch_datathanhcong();
        	        // echo "<pre>";
        	        // print_r ($data["results"]);
        	        // echo "</pre>";

        }
        else{
<<<<<<< HEAD
        	        $data["results"] = $this->pagination_model->fetch_data($config["per_page"],$page);
=======
        	$data["results"] = $this->pagination_model->fetch_data($config["per_page"],$page);
>>>>>>> 7d99a79... new update

        }
        // echo "<pre>";
        // var_dump($data["results"]);
        // echo "</pre>";
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

        // echo "<pre>";
        // var_dump ($data);
        // echo "</pre>";
        
        // View data according to array.
        $this->load->view("dondat_view", $data);
        }

        // Set array for PAGINATION LIBRARY, and show view data according to page.
        public function don_info1(){
        $config = array();
        $config["base_url"] = base_url() . "home/don_info1";
        $total_row = $this->pagination_model->record_count1();
        $config["total_rows"] = $total_row;
        $config["per_page"] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        if($this->uri->segment(3)){
        $page = ($this->uri->segment(3)) ;
        }
        else{
        $page = 1;
        }

        $dl=$this->input->post('luachon1');

        if ($dl=='5don') {
            //echo '5don';
    
        	        $data["results"] = $this->pagination_model->fetch_data15day(5,$page);
        	        // echo "<pre>";
        	        // print_r ($data["results"]);
        	        // echo "</pre>";

        }elseif ($dl=='1thang') {
                	$data["results"] = $this->pagination_model->fetch_data11thang();
        	        // echo "<pre>";
        	        // print_r ($data["results"]);
        	        // echo "</pre>";

        }elseif ($dl=='huy') {
               		$data["results"] = $this->pagination_model->fetch_data1huy();
        	        // echo "<pre>";
        	        // var_dump ($data["results"]);
        	        // echo "</pre>";

        }
        elseif ($dl=='hoanthanh') {
        	        //echo 'hoan thanh';
               	 	$data["results"] = $this->pagination_model->fetch_data1hoanthanh();
        	        // echo "<pre>";
        	        // print_r ($data["results"]);
        	        // echo "</pre>";

        }
        else{
        	 $data["results"] = $this->pagination_model->fetch_data1($config["per_page"],$page);

        }

        // echo "<pre>";
        // var_dump($data["results"]);
        // echo "</pre>";
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

        // echo "<pre>";
        // var_dump ($data);
        // echo "</pre>";
        
        // View data according to array.
        $this->load->view("book_view", $data);
        }
	

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */