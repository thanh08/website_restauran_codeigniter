<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
	   $this->load->model('updatesline_model');
	   $this->load->model('danhmuc_model');

	}

	public function index()
	{
		$dulieudanhmuc=$this->product_model->getdanhmucsp();
		$dulieumonan=$this->product_model->getdulieumonan();
		$dulieu1 =$this->updatesline_model->getdulieuheader();
        $dulieuheader=json_decode($dulieu1,true);
	  $dulieutintuctrangchu=$this->danhmuc_model->laytintucloadtrangchu();


		$dulieu = [
		    'dulieudanhmuc' => $dulieudanhmuc,
		    'dulieumonan' => $dulieumonan,
		    'dulieuheader' => $dulieuheader,
		    'dulieunewstrangchu' => $dulieutintuctrangchu

		];
		// echo "<pre>";
		// var_dump ($dulieu);
		// echo "</pre>";
		$this->load->view('menu',$dulieu,FALSE);


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

		//lấy về dữ liệu file ảnh list
		$cacanh=$_FILES["hinhanhlist"]["name"];//lưu trữ tên file
		$filethat=$_FILES["hinhanhlist"]["tmp_name"];//file thật
		$image=array();
		$image_old =$this->input->post('anhlistcu');
		//duyệt mảng để lấy từng phần tử
		for ($i = 0; $i < count($cacanh) ; $i++) {
			if (empty($cacanh[$i])) {
				$image[$i] =$image_old[$i];
			}
			else{
				$duongdan = 'uploads/'.$cacanh[$i];
				move_uploaded_file($filethat[$i], $duongdan);
				$image[$i] = base_url()."uploads/".$cacanh[$i];
			}

		}
		
		$hinhanhlist= array();
		for ($i = 0; $i < count($image) ; $i++) {
			$tg=array();
			$tg['image_link']=$image[$i];
            array_push($hinhanhlist,$tg);
		
		}
		$hinhanhlist=json_encode($hinhanhlist);
		
		$dulieu=$this->product_model->insertmonan($tieude,$iddanhmuc,$mota,$noidungtin,$hinhanh,$giagoc,$giasaugiam,$hinhanhlist);
		if ($dulieu) {
  			$this->load->view('success_monan');
			
		}
			
	}
	function laythongtinmonan($id)
	{
		$dulieu=$this->product_model->laydatamonan($id);
		$dulieumonanchitiet=$this->product_model->getdulieumonanchitiet($id);
		 $dulieuanhlist=json_decode($dulieumonanchitiet[0]['image_list'],true);
		$dulieu = [
		    'dulieumonan' =>$dulieu,
		    'dulieuanhlist' => $dulieuanhlist

		];
		$this->load->view('edit_product', $dulieu, FALSE);

		// echo "<pre>";
		// print_r ($dulieu);
		// echo "</pre>";
		
	}
	function getmonan()
	{
		$dulieu=$this->product_model->getdulieumonan();
		$dulieu=json_encode($dulieu);
		echo $dulieu;
		// echo "<pre>";
		// print_r ($dulieu);
		// echo "</pre>";	
	}

	function suamonan()
	{
		$id=$this->input->post('id');
		$tieude = $this->input->post('tieude');
		$mota = $this->input->post('mota');
		$giagoc= $this->input->post('giagoc');
		$giasaugiam=$this->input->post('giasaugiam');
		$iddanhmuc = $this->input->post('iddanhmuc');
		$noidungtin = $this->input->post('noidungtin');

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


		
		//lấy về dữ liệu file ảnh list
		$cacanh=$_FILES["hinhanhlist"]["name"];//lưu trữ tên file
		$filethat=$_FILES["hinhanhlist"]["tmp_name"];//file thật
		$image=array();
		$image_old =$this->input->post('anhlistcu');
		//duyệt mảng để lấy từng phần tử
		for ($i = 0; $i < count($cacanh) ; $i++) {
			if (empty($cacanh[$i])) {
				$image[$i] =$image_old[$i];
			}
			else{
				$duongdan = 'uploads/'.$cacanh[$i];
				move_uploaded_file($filethat[$i], $duongdan);
				$image[$i] = base_url()."uploads/".$cacanh[$i];
			}

		}
		
		$hinhanhlist= array();
		for ($i = 0; $i < count($image) ; $i++) {
			$tg=array();
			$tg['image_link']=$image[$i];
            array_push($hinhanhlist,$tg);
		
		}
		$hinhanhlist=json_encode($hinhanhlist);
		//
		$status=$this->input->post('themnew');
		$tonkho=$this->input->post('tonkho');
		// echo "<pre>";
		// var_dump($status);
		// echo "</pre>";

		$dulieu=$this->product_model->updatedulieumonan($id,$tieude,$iddanhmuc,$mota,$noidungtin,$hinhanh,$giagoc,$giasaugiam,$hinhanhlist,$status,$tonkho);
		if ($dulieu) {
  			$this->load->view('success_monan');
			
		}
		
	}
	function xoathongtinmonan($id)
	{
		$dulieu=$this->product_model->deletemonan($id);
		if ($dulieu) {
  			$this->load->view('success_monan');
			
		}
		
	}
	function chitietmonan($id)
	{
		 $dulieudanhmuc=$this->product_model->getdanhmucsp();
		 $dulieumonan=$this->product_model->getdulieumonan();
		 $dulieumonanchitiet=$this->product_model->getdulieumonanchitiet($id);
		 $dulieuanhlist=json_decode($dulieumonanchitiet[0]['image_list'],true);
		 $dulieu1 =$this->updatesline_model->getdulieuheader();
         $dulieuheader=json_decode($dulieu1,true);
         $dulieumonankhac=$this->product_model->getmonankhac($id);
	  $dulieutintuctrangchu=$this->danhmuc_model->laytintucloadtrangchu();
	  $d1=$this->product_model->laydulieudanhgia();
	  

		 $dulieu = [
		     'dulieudanhmuc' => $dulieudanhmuc,
		    'dulieumonan' => $dulieumonan,
		    'dulieumonanchitiet'=> $dulieumonanchitiet,
		     'dulieuheader' => $dulieuheader,
		     'dulieumonankhac' => $dulieumonankhac,
		     'dulieuanhlist' => $dulieuanhlist,
		    'dulieunewstrangchu' => $dulieutintuctrangchu,
		    'dulieudanhgia' => $d1
		     
		 ];
		// echo "<pre>";
		// var_dump ($dulieuanhlist);
		// echo "</pre>";
		$this->load->view('food',$dulieu,FALSE);
		
	}


	


}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */