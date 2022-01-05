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
		$this->db->select('product.catalog_id');	
		$this->db->from('product');
		$this->db->join('catalog_product', 'product.catalog_id = catalog_product.id', 'inner');
		$this->db->where('catalog_product.id', $id);
		$dulieu=$this->db->get();
		$dulieu=$dulieu->result_array();
		// echo "<pre>";
		// print_r ($dulieu);
		// echo "</pre>";
		$dulieu[0]['catalog_id']='13';
		$dulieu = [
		    'catalog_id' => $dulieu[0]['catalog_id'] 
		];
		$this->db->where('catalog_id', $id);
		$this->db->update('product', $dulieu);
		//sau khi chuyển cac tin thuộc danh mục cần xóa sang danh muc chưa xác định
		//tiếp đến ta sẽ xóa danh mục đó
		$this->db->where('id', $id);
		$dulieu = $this->db->delete('catalog_product');
		return $dulieu;


		
	}

	//thêm xóa sửa món ăn ở model
	function insertmonan($tieude,$iddanhmuc,$mota,$noidungtin,$hinhanh,$giagoc,$giasaugiam,$hinhanhlist)
	{
		$dulieu = [ 
			    'name' =>$tieude,
			    'catalog_id'=>$iddanhmuc,
			    'discount'=>$giasaugiam,
			    'price'=>$giagoc,
			    'image_link'=>$hinhanh,
			    'image_list'=>$hinhanhlist,
			    'description'=>$noidungtin,
			    'description_short'=>$mota

			    
			];

		return $this->db->insert('product', $dulieu);


		
	}
	function updatedulieumonan($id,$tieude,$iddanhmuc,$mota,$noidungtin,$hinhanh,$giagoc,$giasaugiam,$hinhanhlist,$status)
	{
		$dulieu = [ 
				'id'=>$id,
			    'name' =>$tieude,
			    'catalog_id'=>$iddanhmuc,
			    'discount'=>$giasaugiam,
			    'price'=>$giagoc,
			    'image_link'=>$hinhanh,
			    'image_list'=>$hinhanhlist,
			    'status'=>$status,
			    'description'=>$noidungtin,
			    'description_short'=>$mota

			    
			];

		$this->db->where('id', $id);
		$dulieu=$this->db->update('product', $dulieu);
		return $dulieu;
	}
	function getdulieumonan()
	{

		$this->db->select('*,product.id,product.name,catalog_product.name as tendanhmuc');
		$this->db->from('product');
		$this->db->join('catalog_product', 'catalog_product.id = product.catalog_id','left');
		$dulieu=$this->db->get();
		$dulieu=$dulieu->result_array();
		return $dulieu;
		// echo "<pre>";
		// print_r ($dulieu);
		// echo "</pre>";

		
	}
	function getdulieumonan1()
	{
		$this->db->select('*');
		$this->db->order_by('rand()');
		$dulieu=$this->db->get('product',4);
		$dulieu=$dulieu->result_array();
		return $dulieu;
		// echo "<pre>";
		// print_r ($dulieu);
		// echo "</pre>";

		
	}
	function getdulieumonanchitiet($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('product');
		$dulieu=$this->db->get();
		$dulieu=$dulieu->result_array();
		return $dulieu;
	}
	function laydatamonan($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$dulieu=$this->db->get('product');
		$dulieu=$dulieu->result_array();
		return $dulieu;

		
	}
	function deletemonan($id)
	{
		$this->db->where('id', $id);
		$dulieu=$this->db->delete('product');
		return $dulieu;
		
	}
	function getmonankhac($id)
	{
		$this->db->select('*');
		$this->db->from('product');
		//$this->db->join('danhmucnews', 'danhmucnews.id = news.iddanhmuc', 'left');
		//$this->db->where('news.iddanhmuc', $iddanhmuc);
		$this->db->where('product.id !=', $id);
		$dulieu=$this->db->get('', 2, 0);
		$dulieu = $dulieu ->result_array();
		// echo "<pre>";
		// var_dump($dulieu);
		// echo "</pre>";
		
		return $dulieu;


	}





}

/* End of file product_model.php */
/* Location: ./application/models/product_model.php */