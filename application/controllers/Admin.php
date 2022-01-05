<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		$this->load->view('admin_view');
		
	}
	function dangnhaptaikhoan()
	{
		$taikhoan=$this->input->post('taikhoan');
		$matkhau=$this->input->post('matkhau');
		//$matkhau=md5($matkhau);
		$dulieu=$this->admin_model->getdatataikhoan($taikhoan,$matkhau);
		//var_dump($dulieu);
        if ($dulieu == null ) {
        	
        	$this->session->set_flashdata('notice','Đăng nhập không thành công, vui lòng kiểm tra lại tài khoản hoặc mật khẩu');
        	redirect('../admin','refresh');

                	
                } 
         else{

         	$dulieutaikhoan = array(
         		'taikhoan' => $dulieu[0]['taikhoan'],
         		'matkhau' => $dulieu[0]['matkhau']
         	);
         	
         	$this->session->set_userdata($dulieutaikhoan);
         	redirect('../dash1','refresh');

         	

         }              

	}
	function dangxuat()
	{
		$this->session->sess_destroy();
		redirect('../admin','refresh');
	}
	function showdangki()
	{
		$this->load->view('admin_dangki');
	}
	function dangkitaikhoan()
	{
		$ten=$this->input->post('ten');
		$taikhoan=$this->input->post('taikhoan');
		$sdt=$this->input->post('sdt');
		$email=$this->input->post('email');
		$matkhau=$this->input->post('matkhau');
		//$matkhau=md5($matkhau);
		if ($this->admin_model->insertdulieuuser($ten,$taikhoan,$sdt,$email,$matkhau)) {
			$this->load->view('success_taikhoan');
		}

		
	}
	function getqladmin()
	{
		$dulieu=$this->admin_model->laydulieuadmin();
		$dulieu=json_encode($dulieu);
		echo $dulieu;
		// echo "<pre>";
		// print_r ($dulieu);
		// echo "</pre>";
	}
	function showadmin()
	{
		$this->load->view('quanly_admin.php');
		
	}
	function luuthaydoiadmin()
	{
		$id=$this->input->post('id');
		$ten=$this->input->post('ten');
		$taikhoan=$this->input->post('taikhoan');
		$sdt=$this->input->post('sdt');
		$email=$this->input->post('email');
                $this->admin_model->luudulieu($id,$ten,$taikhoan,$sdt,$email);
		
	}
	function xoataikhoan($id)
	{
		if ($this->admin_model->xoaadmin($id)) {
			$this->load->view('success_taikhoan');
		}
			
	}


}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */