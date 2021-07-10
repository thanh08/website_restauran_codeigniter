<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('danhmuc_model');
	   $this->load->model('updatesline_model');

	}

	public function index()
	{

		$dulieutrang=$this->danhmuc_model->laysotrang();
		$dulieu =$this->danhmuc_model->laytintucload();
		$dulieucuadanhmuc=$this->danhmuc_model->getdanhmuc();
	    $dulieu1 =$this->updatesline_model->getdulieuheader();
        $dulieuheader=json_decode($dulieu1,true);


		$dulieu = [
		    'dulieuloadnews' => $dulieu,
		    'dulieusotrang' =>$dulieutrang,
		    'dulieucuadanhmuc' =>$dulieucuadanhmuc,
		    'dulieuheader' => $dulieuheader
		];
	    $this->load->view('header', $dulieu, FALSE);
		$this->load->view('blognews', $dulieu, FALSE);


	}
	function addDanhmuc()
	{

		$danhmuc=$this->input->post('danhmuc');
		//var_dump($danhmuc);
		$this->load->model('danhmuc_model');
		if ($this->danhmuc_model->insertdanhmuc($danhmuc)) {
			$this->load->view('success_danhmuc');
		}
	}
	function showdanhmuc()
	{
		$this->session->userdata('taikhoan');
		$this->session->userdata('matkhau');

		$dulieu=$this->danhmuc_model->getdanhmuc();
		$dulieu = [
		    'dulieu' =>$dulieu 
		];
		$this->load->view('danhmuc_view', $dulieu, FALSE);
		// echo "<pre>";
		// print_r ($dulieu);
		// echo "</pre>";
		
	}
	//LOAD DANH MỤC CẦN SỬA BẰNG ID
	function suaDanhmuc($id)
	{
		$dulieu=$this->danhmuc_model->getdanhmucbyid($id);
		$dulieu = [
		    'dulieu' => $dulieu 
		];
		// echo "<pre>";
		// var_dump($dulieu);
		// echo "</pre>";
		$this->load->view('editdanhmuc_view1', $dulieu, FALSE);
		
		
	}
	function editdanhmuc ()
	{
		//lấy du lieu cần thay đoi từ view editdanhmuc_view1

		$id=$this->input->post('id');
		$danhmuc=$this->input->post('ten');
		//gọi model để update du lieu
		if ($this->danhmuc_model->updatedanhmucbyid($id,$danhmuc)) {
			$this->load->view('success_editdanhmuc');
		}
		
	}
	function xoaDanhmuc($id)
	{
		// if ($this->danhmuc_model->removedanhmucbyId($id)) {
		// 	$this->load->view('success_xoadanhmuc');
		// }
		$this->danhmuc_model->removedanhmucbyId($id);
		

		
	}
	function addDanhmucbyajax()
	{
		$danhmuc=$this->input->post('danhmuc');
		//var_dump($danhmuc);
		$this->load->model('danhmuc_model');
		$this->danhmuc_model->insertdanhmuc($danhmuc);
		echo json_encode($this->db->insert_id());
		
	}
	function addnews()
	{
		
		//upload hinh anh
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["hinhanh"]["tmp_name"]);
		  if($check !== false) {
		   // echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    //echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}

		// Check if file already exists
		// if (file_exists($target_file)) {
		//   echo "Sorry, file already exists.";
		//   $uploadOk = 0;
		// }

		// Check file size
		if ($_FILES["hinhanh"]["size"] > 5000000) {
		  //echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  //echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file)) {
		    // echo "The file ". htmlspecialchars( basename( $_FILES["hinhanh"]["name"])). " has been uploaded.";
		  } else {
		    //echo "Sorry, there was an error uploading your file.";
		  }
		}
		$duongdan= base_url();
		$hinhanh = $duongdan.'uploads/'.basename( $_FILES["hinhanh"]["name"]);
		$tieude = $this->input->post('tieude');
		$mota = $this->input->post('mota');
		$iddanhmuc = $this->input->post('iddanhmuc');
		$noidungtin = $this->input->post('noidungtin');
  		if ($this->danhmuc_model->insertnews($tieude,$iddanhmuc,$noidungtin,$mota,$hinhanh)) {
  			$this->load->view('success_tintuc');
  		}
  		//var_dump($iddanhmuc);
		
	}
	function showtintuc()
	{
		$dulieu = $this->danhmuc_model->getdanhmuc();
		$dulieutintuc = $this->danhmuc_model->gettintuc();
		$dulieu = [
		    'dulieu' => $dulieu,
		    'dulieutintuc' => $dulieutintuc
		];
		// echo "<pre>";
		// var_dump($dulieu);
		// echo "</pre>";
		$this->load->view('tin_view', $dulieu, FALSE);
		
	}
	function loadedittintuc($id=0,$iddanhmuc=0)
	{
		//$this->danhmuc_model->laydanhmuceditview($id,$iddanhmuc);
		$dulieu1=$this->danhmuc_model->laydanhmuceditview($id,$iddanhmuc);
		$dulieu2=$this->danhmuc_model->getdanhmuc();
		$dulieu = [
		    'dulieutinedit' => $dulieu1,
		    'dulieudanhmucedit' => $dulieu2
		];
		// echo "<pre>";
		// //var_dump($dulieu['dulieutinedit'][0]['tendanhmuc']);
		// var_dump($dulieu['dulieutinedit']);
		// echo "</pre>";
		$this->load->view('suatin_new', $dulieu, FALSE);

	}
	function suatintuc()
	{
		//lay du lieu tu view
		$id=$this->input->post('id');
		$tieude = $this->input->post('tieude');
		$mota=$this->input->post('mota');
		$iddanhmuc=$this->input->post('iddanhmuc');
		$noidungtin=$this->input->post('noidungtin');
		//lay du lieu anh
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["hinhanh"]["tmp_name"]);
		  if($check !== false) {
		   // echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    //echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}

		// Check if file already exists
		// if (file_exists($target_file)) {
		//   echo "Sorry, file already exists.";
		//   $uploadOk = 0;
		// }

		// Check file size
		if ($_FILES["hinhanh"]["size"] > 5000000) {
		  //echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  //echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file)) {
		    // echo "The file ". htmlspecialchars( basename( $_FILES["hinhanh"]["name"])). " has been uploaded.";
		  } else {
		    //echo "Sorry, there was an error uploading your file.";
		  }
		}
		$duongdan= base_url();
		$file=basename( $_FILES["hinhanh"]["name"]);
		$hinhanh = 'uploads/'.basename( $_FILES["hinhanh"]["name"]);
		if (empty($file)) {
			$hinhanh=$this->input->post('anhcu');
		} else {
			$hinhanh = $duongdan.'uploads/'.basename( $_FILES["hinhanh"]["name"]);
		}
		// echo "<pre>";
		// var_dump($hinhanh);
		// echo "</pre>";
		if ($this->danhmuc_model->updatetin($id,$tieude,$iddanhmuc,$noidungtin,$mota,$hinhanh)) {
			$this->load->view('success_tintuc');
		} 
		
	}
	function xoatintuc($id)
	{  if ($this->danhmuc_model->deletetintuc($id))
	    {
    	$this->load->view('success_tintuc');		
	    }
		
	}
	//load du lieu cho từng trang
	function page($trang)
	{
		$sotrang1tin=2;
		$dulieu=$this->danhmuc_model->laysotin($trang,$sotrang1tin);
		$dulieutrang=$this->danhmuc_model->laysotrang();
		$dulieucuadanhmuc=$this->danhmuc_model->getdanhmuc();

		$dulieu = [
		    'dulieuloadnews' => $dulieu,
		    'dulieusotrang' =>$dulieutrang,
		    'dulieucuadanhmuc' =>$dulieucuadanhmuc

		];
		$this->load->view('blognews', $dulieu, FALSE);




		
	}
	//load dữ liệu chi tiết cho từng bài 
	function loadnewschitiet($id)
	{
		$dulieuiddanhmuc=$this->danhmuc_model->layiddanhmucbangidtin($id);
		$iddanhmuc=$dulieuiddanhmuc[0]['iddanhmuc'];
		$dulieutinkhac=$this->danhmuc_model->laytinkhac($id,$iddanhmuc);
		$dulieu=$this->danhmuc_model->laytinchitiet($id);
		$dulieucuadanhmuc=$this->danhmuc_model->getdanhmuc();
		// echo "<pre>";
		// var_dump($dulieu);
		// echo "</pre>";
		$dulieu = [
		    'dulieutinchitiet' =>$dulieu,
		    'dulieucuadanhmuc' =>$dulieucuadanhmuc,
		    'dulieutinkhac'=>$dulieutinkhac
		];
		$this->load->view('blogsingle', $dulieu, FALSE);
	}
	function loadtintheodanhmuc($id)
	{
		$dulieu=$this->danhmuc_model->laydulieutintheoiddanhmuc($id);
		$dulieutrang=$this->danhmuc_model->laysotrangtheoiddanhmuc($id);
		$dulieucuadanhmuc=$this->danhmuc_model->getdanhmuc();
		$dulieu = [
		    'dulieuloadnews' => $dulieu,
		    'dulieusotrang' =>$dulieutrang,
		    'dulieucuadanhmuc' =>$dulieucuadanhmuc
		];
		$this->load->view('blognews', $dulieu, FALSE);
		// echo "<pre>";
		// var_dump($dulieu);
		// echo "</pre>";
	}







}

/* End of file News.php */
/* Location: ./application/controllers/News.php */