<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
	}

	public function index()
	{


	}
	function showqlsanpham()
	{
		$this->load->view('qlsanpham');

		
	}
	function showqldanhmucsp()
	{
		$this->load->view('danhmucmonan');
		
	}
	function addDanhmucmonan()
	{
		$tendanhmuc=$this->input->post('danhmuc');
		// echo "<pre>";
		// print_r ($tendanhmuc);
		// echo "</pre>";
		if ($dulieu=$this->product_model->luudanhmuc($tendanhmuc)) {
			$this->load->view('success_danhmucmonan');
		}
		
	}
	function getdanhmuc()
	{
	   $dulieu=$this->product_model->getdanhmucsp();
	   $dulieu=json_encode($dulieu);
	   echo $dulieu;

		
	}
	function savedanhmucsp()
	{
	   $id=$this->input->post('id');
	   $name=$this->input->post('name');
	   $this->product_model->savedmsp($id,$name);
		
	}
	function deletedanhmucsp()
	{
		$id=$this->input->post('id');
		$dulieu =$this->product_model->deletedmsp($id);
		if ($dulieu) {
			echo 'thanhcong';
		}
		
	}
	function themmonan()
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
		$giagoc= $this->input->post('giagoc');
		$giasaugiam=$this->input->post('giasaugiam');
		$iddanhmuc = $this->input->post('iddanhmuc');
		$noidungtin = $this->input->post('noidungtin');
		// echo "<pre>";
		// print_r ($iddanhmuc);
		// echo "</pre>";
		$dulieu=$this->product_model->insertmonan($tieude,$mota,$iddanhmuc,$noidungtin,$hinhanh,$giagoc,$giasaugiam);
		if ($dulieu) {
  			$this->load->view('success_monan');
			
		}
		

		
	}

}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */