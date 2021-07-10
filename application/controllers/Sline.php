<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sline extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('updatesline_model');


	}

	public function index()
	{
	   $this->load->view('addsline_view');	
	}
	function updatesline()
	{
		$dulieu	=$this->updatesline_model->getdatasline();
		$dulieu =json_decode($dulieu,true);
		//do mới đầu dữ liệu đang trống (ở dạng null) nên phải khởi tạo mảng cho nó
		if ($dulieu == null) {
			$dulieu=array();
		}
		//lấy dữ liệu từ trường view addsline
		$title =$this->input->post('title');
		$description=$this->input->post('mota');
		$link=$this->input->post('linkbuton');
		$textbuton=$this->input->post('textbuton');


		//lấy dữ liệu hình ảnh
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["imagesline"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["imagesline"]["tmp_name"]);
		  if($check !== false) {
		    echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}

		// Check file size
		if ($_FILES["imagesline"]["size"] > 50000000) {
		  echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		 // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  //echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["imagesline"]["tmp_name"], $target_file)) {
		    //echo "The file ". htmlspecialchars( basename( $_FILES["imagesline"]["name"])). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}
	 $slineanh = basename( $_FILES["imagesline"]["name"]);
	 $slineanh = base_url().'uploads/'.basename( $_FILES["imagesline"]["name"]);
	 
	//biến dữ liệu lấy được từ view thành mảng phần tử sline(chứa đầy đủ các thuộc tính của một sline)
	//ko dùng vòng lặp for như phần mảng các thuộc tính vì đây chỉ post chỉ một thuộc tính thôi 
	 $motsline = [
	     'title' => $title,
	     'description' => $description,
	     'link' => $link,
	     'textbuton'=>$textbuton,
	     'image'=>$slineanh
	 ];
	 //push dữ liễu vào mảng trong sql
	 array_push($dulieu,$motsline);
	 
	 $dulieu = json_encode($dulieu);
	 
	 if ($this->updatesline_model->insertsline($dulieu)) {
	     $this->load->view('success');
	 }

	}
	function showsline()
	{
		$dulieusline =$this->updatesline_model->getdatasline();
		$dulieusline = json_decode($dulieusline,true);

		
		// echo "<pre>";
		// var_dump($dulieusline);
		// echo "</pre>";
		if ($dulieusline == null) {
			$this->load->view('notification');
			}
		else{
			$dulieusline = [
		    'dulieusline' => $dulieusline 
		];
			
			$this->load->view('editsline_view', $dulieusline, FALSE);
		}
		


		
	}
	//hàm xử lý edit dữ liệu
	function editsline()
	{
		$title=$this->input->post('title');
		$description=$this->input->post('mota');
		$link=$this->input->post('linkbuton');
		$buton=$this->input->post('textbuton');

		//lấy về dữ liệu file ảnh
		$cacanh=$_FILES["imagesline"]["name"];//lưu trữ tên file
		$filethat=$_FILES["imagesline"]["tmp_name"];//file thật
		$image=array();
		$image_old =$this->input->post('image_old');
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
		// echo "<pre>";
		// var_dump($image);
		// echo "</pre>";

		//tạo một mảng để duyệt dữ liệu của thuộc tính để thành một mảng chứa các phần tử có(đầy đủ các thuộc tính của sline)
		//ở đây ko thể khởi tạo một mảng đc vì các thuộc tính ở đây là đều là mảng thuộc tính 
		//vd:title[] nên phải dùng vòng lặp for để duyệt
		// //tạo một biến mản trong gian để lưu tạm thời sau đó push vào mảng $tatcacsline
		$tatcasline= array();
		for ($i = 0; $i < count($title) ; $i++) {
			$tg=array();
			$tg['title']=$title[$i];
			$tg['description']=$description[$i];
			$tg['link']=$link[$i];
			$tg['textbuton']=$buton[$i];
			$tg['image']=$image[$i];
            array_push($tatcasline,$tg);
		
		}
		
		$tatcasline=json_encode($tatcasline);

		
		$this->load->model('updatesline_model');
		if ($this->updatesline_model->insertsline($tatcasline)) {
			$this->load->view('success');
		}
		
	}
	//end hàm xử lý
	
	//hàm xóa xử lý dữ liệu
	function deletesline($t)
	{
		$this->load->model('updatesline_model');
		$ketqua=$this->updatesline_model->getdatasline();
		$ketqua=json_decode($ketqua,true);
		
		foreach ($ketqua as $key => $value) {
			if ($value['title']== $t) {
				unset($ketqua[$key]);
			}
			
		}

		$ketqua=json_encode($ketqua);
		// echo "<pre>";
		// var_dump($ketqua);
		// echo "</pre>";
		$this->load->model('updatesline_model');
		if ($this->updatesline_model->insertsline($ketqua)) {
			$this->load->view('success');
		}
		

		
	}








}

/* End of file Sline.php */
/* Location: ./application/controllers/Sline.php */