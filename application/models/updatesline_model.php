<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class updatesline_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function getdatasline ()
	{
		$this->db->select('*');
		$this->db->where('tenthuoctinh', 'sline_page');
		$dulieu = $this->db->get('restaurant');
		$dulieu=$dulieu->result_array();
		foreach ($dulieu as $value) {
			$dulieulayra = $value['giatrithuoctinh'];
			//tạo biến tạm thời dể duyệt mảng dữ liệu có key giatrithuoctinh dể lấy ra giá trị của key đó
		}
		return $dulieulayra;
		// echo '<pre>';
		// var_dump($dulieulayra);


		
	}
	function insertsline($dulieu)
	{
		$dulieus = [
		    'tenthuoctinh' => 'sline_page',
		    'giatrithuoctinh' => $dulieu 
		];
		$this->db->where('tenthuoctinh', 'sline_page');
		return $this->db->update('restaurant', $dulieus);

		
	}
	function updatedulieuheader($dulieu)
	{
		$dulieu = [
		    'tenthuoctinh' =>'dulieu_header',
		    'giatrithuoctinh'=>$dulieu 
		];
		$this->db->where('tenthuoctinh','dulieu_header');
	    return $this->db->update('restaurant', $dulieu);

		
	}
	function getdulieuheader()
	{
		$this->db->select('*');
		$this->db->where('tenthuoctinh', 'dulieu_header');
		$dulieu =$this->db->get('restaurant');
		$dulieu=$dulieu->result_array();
	    return $dulieuheader=$dulieu[0]['giatrithuoctinh'];
		// echo "<pre>";
		// var_dump($dulieu[0]['giatrithuoctinh']);
		// echo "</pre>";

		
	}
	

}

/* End of file updatesline_model.php */
/* Location: ./application/models/updatesline_model.php */