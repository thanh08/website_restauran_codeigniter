<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	function insertdatabook($id_giaodich,$ngaydat,$giodat,$songuoi)
	{
		$dulieu = [
			'transaction_id'=>$id_giaodich,
		    'ngaydat' => $ngaydat,
		    'giodat' => $giodat,
		    'songuoi' => $songuoi

		];
		$dl=$this->db->insert('table_book', $dulieu);
		return $dl;

	}
	function showdatabook()
	{
		$this->db->select('*');
		$dulieu = $this->db->get('customer_book');
		$dulieu = $dulieu->result_array();
		return $dulieu;
		// echo "<pre>";
		// var_dump($dulieu);
		// echo "</pre>";
	}
	function getdatabook($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$dulieu = $this->db->get('customer_book');
		$dulieu = $dulieu->result_array();
		return $dulieu;
		// echo "<pre>";
		// var_dump($dulieu);
		// echo "</pre>";
	}
	function comfirm_book($id,$tinhtrang)
	{
		$dulieu = [
		    'id' =>$id,
		    'tinhtrang' =>$tinhtrang  
		];
		$this->db->where('id', $id);
		$dulieu = $this->db->update('customer_book', $dulieu);
		return $dulieu;
	}
	function comfirm_contact($id,$status)
	{
		$dulieu = [
		    'id' =>$id,
		    'status' =>$status 
		];
		$this->db->where('id', $id);
		$dulieu = $this->db->update('customer_contact', $dulieu);
		return $dulieu;
	}
	function insertdatacontact($dulieu)
	{
		return $this->db->insert('customer_contact', $dulieu);
		
	}
	function getcontact()
	{
		$this->db->select('*');
		$dulieu=$this->db->get('customer_contact');
		$dulieu=$dulieu->result_array();
		return $dulieu;
		
	}
	function getdatacontact($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$dulieu = $this->db->get('customer_contact');
		$dulieu = $dulieu->result_array();
		return $dulieu;
		// echo "<pre>";
		// var_dump($dulieu);
		// echo "</pre>";
	}
	

}

/* End of file Book_model.php */
/* Location: ./application/models/Book_model.php */