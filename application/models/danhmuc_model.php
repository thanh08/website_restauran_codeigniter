<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class danhmuc_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function insertdanhmuc($danhmuc)
	{
		$dulieu = [
		    'tendanhmuc' =>$danhmuc 
		];
		return $this->db->insert('danhmucnews', $dulieu);
		
	}
	function getdanhmuc()
	{
		$this->db->select('*');
		$dl=$this->db->get('danhmucnews');
		$dulieu=$dl->result_array();
		return $dulieu;		
	}
	function getdanhmucbyid($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$dl=$this->db->get('danhmucnews');
		$dulieu= $dl->result_array();
		return $dulieu;

	}
	function updatedanhmucbyid($id,$danhmuc)
	{
		$dulieu = [
		    'tendanhmuc'=>$danhmuc 
		];
		$this->db->where('id', $id);
		return $this->db->update('danhmucnews', $dulieu);
	}

	function removedanhmucbyId($id=0)
	{

		$this->db->select('news.iddanhmuc');	
		$this->db->from('news');
		$this->db->join('danhmucnews', 'news.iddanhmuc = danhmucnews.id', 'inner');
		$this->db->where('danhmucnews.id', $id);
		$dulieu=$this->db->get();
		$dulieu=$dulieu->result_array();
		$dulieu[0]['iddanhmuc']='54';
		$dulieu = [
		    'iddanhmuc' => $dulieu[0]['iddanhmuc'] 
		];
		$this->db->where('iddanhmuc', $id);
		$this->db->update('news', $dulieu);
		//sau khi chuyển cac tin thuộc danh mục cần xóa sang danh muc chưa xác định
		//tiếp đến ta sẽ xóa danh mục đó
		$this->db->where('id', $id);
		return $this->db->delete('danhmucnews');

		
	}

	function insertnews($tieude,$iddanhmuc,$noidungtin,$mota,$hinhanh)
	{
		$dulieu = [
			    'tieude' =>$tieude,
			    'iddanhmuc'=>$iddanhmuc,
			    'noidungtin'=>$noidungtin,
			    'mota'=>$mota,
			    'hinhanh'=>$hinhanh

			];	
		return $this->db->insert('news', $dulieu);

	}
	function gettintuc()
	{
		$this->db->select('*');
		$dulieu=$this->db->get('news');
		$dulieu=$dulieu->result_array();
		return $dulieu;
		

		
	}
	function laydanhmuceditview($id,$iddanhmuc)
	{
		$this->db->select('*');
		$this->db->from('danhmucnews');
		$this->db->join('news', 'danhmucnews.id = news.iddanhmuc','inner');
		$this->db->where('news.id', $id);
		$this->db->where('iddanhmuc', $iddanhmuc);
		$dulieu=$this->db->get();
		$dulieu=$dulieu->result_array();
		return $dulieu;

		
		
	}
	function updatetin($id,$tieude,$iddanhmuc,$noidungtin,$mota,$hinhanh)
	{
		$dulieu = [
		    'tieude' =>$tieude,
		    'iddanhmuc' =>$iddanhmuc,
		    'noidungtin'=>$noidungtin,
		    'mota'=>$mota,
		    'hinhanh'=>$hinhanh 
		];
		$this->db->where('id', $id);
		return $this->db->update('news', $dulieu);

		
	}
	function deletetintuc($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('news');
		
	}
	function laytintucload()
	{
		$sotintrongpage=2;
		$this->db->select('*');
		$this->db->from('danhmucnews');
		$this->db->join('news', 'news.iddanhmuc = danhmucnews.id', 'left');
		$this->db->order_by('news.ngaytao', 'desc');
		$dulieu =$this->db->get('',$sotintrongpage, 0);
		$dulieu = $dulieu ->result_array();
		// echo "<pre>";
		// var_dump($dulieu);
		// echo "</pre>";
		return $dulieu;

	}
	function laysotrang()
	{   
		$sotintrongpage=2;
		$this->db->select ('*');
		$this->db->from('news');
		$dulieu =$this->db->get();
		$dulieu=$dulieu->result_array();
		$sotrang=count($dulieu)/$sotintrongpage;
		$sotrang=ceil($sotrang);
		return $sotrang;
		// echo "<pre>";
		// var_dump($sotrang);
		// echo "</pre>";
		// die();

		
	}
	function laysotin($trang,$sotrang1tin)
	{
		$this->db->select('*');
		$this->db->from('danhmucnews');
		$this->db->join('news', 'news.iddanhmuc = danhmucnews.id', 'left');
		$this->db->order_by('news.ngaytao', 'desc');
		$vt=($trang-1)*2;
		$dulieu =$this->db->get('',$sotrang1tin,$vt);
		$dulieu = $dulieu ->result_array();
		// echo "<pre>";
		// var_dump($dulieu);
		// echo "</pre>";
		return $dulieu;
	}
	function laytinchitiet($id)
	{
		$this->db->select('*');
		$this->db->from('danhmucnews');
		$this->db->join('news', 'news.iddanhmuc = danhmucnews.id', 'left');
		$this->db->where('news.id', $id);
		$dulieu=$this->db->get();
		$dulieu=$dulieu->result_array();
		return $dulieu;
		
	}
	function laydulieutintheoiddanhmuc($id)
	{
		$this->db->select('*');
		$this->db->from('danhmucnews');
		$this->db->join('news', 'danhmucnews.id = news.iddanhmuc', 'left');
		$this->db->where('news.iddanhmuc', $id);
		$this->db->order_by('news.ngaytao', 'desc');
		$dulieu=$this->db->get('',2,0);
		$dulieu=$dulieu->result_array();
		// echo "<pre>";
		// var_dump($dulieu);
		// echo "</pre>";
		return $dulieu;
	}
	function laysotrangtheoiddanhmuc($id)
	{   
		$sotintrongpage=2;
		$this->db->select ('*');
		$this->db->from('news');
		$this->db->where('news.iddanhmuc', $id);
		$dulieu =$this->db->get();
		$dulieu=$dulieu->result_array();
		$sotrang=count($dulieu)/$sotintrongpage;
		$sotrang=ceil($sotrang);
		return $sotrang;

		
	}
	function layiddanhmucbangidtin($id)
	{
		$this->db->select('news.iddanhmuc');
		$this->db->where('id', $id);
		$dulieu =$this->db->get('news');
		$dulieu= $dulieu->result_array();
		return $dulieu;
		// echo "<pre>";
		// var_dump($dulieu);
		// echo "</pre>";
		
	}
	function laytinkhac($id,$iddanhmuc)
	{
		$this->db->select('*');
		$this->db->from('news');
		//$this->db->join('danhmucnews', 'danhmucnews.id = news.iddanhmuc', 'left');
		$this->db->where('news.iddanhmuc', $iddanhmuc);
		$this->db->where('news.id !=', $id);
		$dulieu=$this->db->get('', 3, 0);
		$dulieu = $dulieu ->result_array();
		// echo "<pre>";
		// var_dump($dulieu);
		// echo "</pre>";
		
		return $dulieu;


	}
	

}

/* End of file danhmuc_model.php */
/* Location: ./application/models/danhmuc_model.php */