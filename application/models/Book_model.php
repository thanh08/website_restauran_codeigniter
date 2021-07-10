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
	

}

/* End of file Book_model.php */
/* Location: ./application/models/Book_model.php */