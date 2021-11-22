<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function luudanhmuc($tendanhmuc)
	{
		$dulieu= [
		    'name' =>$tendanhmuc 
		];
		$dulieu=$this->db->insert('catalog_product', $dulieu);
		return $dulieu;

		
	}
	function getdanhmucsp()
	{
		$this->db->select('*');
		$dulieu=$this->db->get('catalog_product');
		$dulieu=$dulieu->result_array();
		return $dulieu;
		
	}
	function savedmsp($id,$name)
	{
		$dulieu = [
		    'id' =>$id,
		    'name' =>$name 
		];
		$this->db->where('id', $id);
		$this->db->update('catalog_product', $dulieu);
		if ($this->db->affected_rows() > 0) {
			echo 'thanhcong';
		}
		else{
			echo 'thatbai';
		}

	}
	function deletedmsp($id)
	{
		$this->db->where('id', $id);
		$dulieu = $this->db->delete('catalog_product');
		return $dulieu;


		
	}
	//thêm xóa sửa món ăn ở model
	function insertmonan($tieude,$iddanhmuc,$noidungtin,$mota,$hinhanh,$giagoc,$giasaugiam)
	{
		$dulieu = [
			    'catalog_id'=>$iddanhmuc,
			    'name' =>$tieude,
			    'discount'=>$giasaugiam,
			    'price'=>$giagoc,
			    'image_link'=>$hinhanh,
			    'description'=>$noidungtin,
			    'description_short'=>$mota

			    
			];

		return $this->db->insert('product', $dulieu);


		
	}





}

/* End of file product_model.php */
/* Location: ./application/models/product_model.php */