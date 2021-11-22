<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function insertdulieuuser($ten,$taikhoan,$sdt,$email,$matkhau){
		$dulieu = [
		    'ten' =>$ten,
		    'taikhoan'=>$taikhoan,
		    'sdt'=>$sdt,
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
	function laydulieuadmin()
	{
		$this->db->select('*');
		$this->db->from('taikhoankhachhang');
		$dulieu=$this->db->get();
		$dulieu=$dulieu->result_array();
		return $dulieu;


	}
	function luudulieu($id,$ten,$taikhoan,$sdt,$email,$matkhau)
	{
		$dulieu = [
			'id'=>$id,
		    'ten'=>$ten,
		    'taikhoan'=>$taikhoan,
		    'sdt'=>$sdt,
		    'email'=>$email,
		    'matkhau'=>$matkhau 
		];
		$this->db->where('id', $id);
		$this->db->update('taikhoankhachhang', $dulieu);
		if ($this->db->affected_rows() > 0) {
			echo 'thanhcong';
		}
		else{
			echo 'thatbai';
		}
		
	}
	function xoaadmin($id)
	{
		$this->db->where('id', $id);
		$dulieu=$this->db->delete('taikhoankhachhang');
		return $dulieu;

		
	}

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */