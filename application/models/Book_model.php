<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	function insertdatabook($ten,$email,$sdt,$ngaydat,$giodat,$songuoi)
	{
		$dulieu = [
		    'ten' => $ten,
		    'email' => $email,
		    'sdt' => $sdt,
		    'ngaydat' => $ngaydat,
		    'giodat' => $giodat,
		    'songuoi' => $songuoi

		];
		return $this->db->insert('customer_book', $dulieu);

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
	

}

/* End of file Book_model.php */
/* Location: ./application/models/Book_model.php */