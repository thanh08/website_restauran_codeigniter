<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function insertdulieuuser($ten,$taikhoan,$sdt,$diachi,$email,$matkhau){
		$dulieu = [
		    'ten' =>$ten,
		    'taikhoan'=>$taikhoan,
		    'sdt'=>$sdt,
		    'diachi'=>$diachi,
		    'email'=>$email,
		    'matkhau'=>$matkhau,


		];
		return $this->db->insert('taikhoankhachhang', $dulieu);
	}
	function getdatataikhoan($taikhoan,$matkhau)
	{
		$this->db->select('taikhoankhachhang.taikhoan,taikhoankhachhang.matkhau');
		$this->db->from('taikhoankhachhang');
		$this->db->where('taikhoan', $taikhoan);
	    $this->db->where('matkhau ', $matkhau);
		$dulieu=$this->db->get();
		$dulieu=$dulieu->result_array();
		return $dulieu;
		// echo "<pre>";
		// var_dump($dulieu);
		// echo "</pre>";
		

		
	}

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */