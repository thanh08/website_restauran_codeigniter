<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class billing_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	// Insert customer details in "customer" table in database.
	public function insert_customer($data)
	{
	$this->db->insert('customer_order', $data);
	$id = $this->db->insert_id();
	return (isset($id)) ? $id : FALSE;
	}


	public function insert_order($data)
	{
	$this->db->insert('orders', $data);
	$id = $this->db->insert_id();
	return (isset($id)) ? $id : FALSE;
	}


	public function insert_order_detail($data)
	{
	$this->db->insert('order_detail', $data);
	}


	public function insertgiaodich($id,$pay,$total)
	{
		$data = [
		    'user_id' =>$id,
		    'payment_info' =>$pay,
		    'total'=>$total 
		];
	$this->db->insert('transaction', $data);
	$id = $this->db->insert_id();
	return (isset($id)) ? $id : FALSE;
	}

	function insertproduct_order ($data)
	{

		$dl=$this->db->insert('order_product', $data);
		return $dl;
	}
	function getdulieugiaodich($id)
	{
		$this->db->select('*,transaction.id');
		$this->db->from('transaction');
		$this->db->join('user_login', 'transaction.user_id = user_login.id', 'left');
		$this->db->where('user_id', $id);
		$this->db->where('payment_info','COD');
		$this->db->or_where('payment_info','Credit Card');
		$this->db->order_by("ngaydat", "DESC");
		$dulieu=$this->db->get();
		$dulieu=$dulieu->result_array();
		return $dulieu;
		
	}
	function getdulieugiaodich5day($id)
	{
		$this->db->select('*,transaction.id');
		$this->db->from('transaction');
		$this->db->join('user_login', 'transaction.user_id = user_login.id', 'left');
		$this->db->where('user_id', $id);
		$this->db->where('payment_info','COD');
		$this->db->or_where('payment_info','Credit Card');
		$this->db->order_by("ngaydat", "DESC");
		$this->db->limit(5);
		$dulieu=$this->db->get();
		$dulieu=$dulieu->result_array();
		return $dulieu;
		
	}
	function getdulieugiaodichhuy($id)
	{
		$this->db->select('*,transaction.id');
		$this->db->from('transaction');
		$this->db->join('user_login', 'transaction.user_id = user_login.id', 'left');
		// $this->db->where('payment_info','COD');
		// $this->db->or_where('payment_info','Credit Card');
		// $w = "user_id='$id' AND status='0'";
		// $this->db->where($w);
		//$this->db->where('user_id', $id);
		//$this->db->where('status', 0);
		$wherecond = " ( payment_info ='COD' OR payment_info='Credit Card') AND (user_id='" . $id . "')   AND (status='0')  ";
        $this->db->where($wherecond);
		

		$this->db->order_by("ngaydat", "DESC");
		$dulieu=$this->db->get();
		$dulieu=$dulieu->result_array();
		return $dulieu;
		
	}
	function getdulieugiaodichhoanthanh($id)
	{
		$this->db->select('*,transaction.id');
		$this->db->from('transaction');
		$this->db->join('user_login', 'transaction.user_id = user_login.id', 'left');
		// $this->db->where('payment_info','COD');
		// $this->db->or_where('payment_info','Credit Card');
		// $w = "user_id='$id' AND status='1'";
		$wherecond = " ( payment_info ='COD' OR payment_info='Credit Card') AND (user_id='" . $id . "')   AND (status='1')  ";
        $this->db->where($wherecond);
		//$this->db->where($w);
		
		//$this->db->where('user_id', $id);
		//$this->db->where('status', 0);
		

		$this->db->order_by("ngaydat", "DESC");
		$dulieu=$this->db->get();
		$dulieu=$dulieu->result_array();
		return $dulieu;
		
	}
	function getdulieugiaodich1thang($id)
	{
		$this->db->select('*,transaction.id');
		$this->db->from('transaction');
		$this->db->join('user_login', 'transaction.user_id = user_login.id', 'left');
		//$this->db->where('user_id', $id);
		// $this->db->where('payment_info','COD');
		// $this->db->or_where('payment_info','Credit Card');
		$wherecond = " ( payment_info ='COD' OR payment_info='Credit Card') AND (user_id='" . $id . "') ";
        $this->db->where($wherecond);




		$d=strtotime("first day of this month");
		$d1=strtotime("last day of this month");
		$this->db->where("ngaydat BETWEEN '$d' AND '$d1'" );

		$this->db->order_by("ngaydat", "DESC");
		$dulieu=$this->db->get();
		$dulieu=$dulieu->result_array();
		return $dulieu;
		
	}
	function getdulieugiaodich1($id)
	{
		$this->db->select('*,transaction.id,transaction.ngaydat as ngaydattransaction ');
		$this->db->from('transaction');
		$this->db->join('user_login', 'transaction.user_id = user_login.id', 'left');
		$this->db->join('table_book', 'transaction.id = table_book.transaction_id', 'left');

		$this->db->where('user_id', $id);
		$this->db->where('payment_info','Thanh toán tại bàn');
		$this->db->order_by("transaction.ngaydat", "DESC");
		$dulieu=$this->db->get();
		$dulieu=$dulieu->result_array();
		return $dulieu;
		
	}
	function getdulieumondat($id)
	{
		$this->db->select('order_product.transaction_id as idgiaodich ,order_product.product_id,order_product.qty,product.name,order_product.amount,transaction.total,transaction.ngaydat');
		$this->db->from('order_product');
		$this->db->join('product','product.id = order_product.product_id', 'left');
		$this->db->join('transaction', 'transaction.id = order_product.transaction_id', 'left');
		$this->db->where('transaction_id', $id);
		$dl=$this->db->get();
		$dl=$dl->result_array();
		return $dl;





		
	}
	function gettransactiondulieu($id)
	{
		$this->db->select('*');
		$this->db->from('transaction');

		$this->db->where('id', $id);
		$dl=$this->db->get();
		$dl=$dl->result_array();
		return $dl;

		
	}
	function gettransactiondulieu1($id)
	{
		$this->db->select('*,transaction.id');
		$this->db->from('transaction');
		$this->db->join('user_login', 'transaction.user_id = user_login.id', 'left');
		$this->db->where('transaction.id', $id);
		$dl=$this->db->get();
		$dl=$dl->result_array();
		return $dl;

		
	}



	function huydulieudon($id,$dl)
	{
		$this->db->where('id', $id);
		$this->db->update('transaction', $dl);
		
	}
	function gettotalbymonth()
	{
		$this->db->select('sum(total) as doanhthuthang');
		$this->db->from('transaction');
		$this->db->where('status', 1);
		$d=strtotime("first day of this month");
		$d1=strtotime("last day of this month");
		$this->db->where("ngaydat BETWEEN '$d' AND '$d1'" );
		$dl=$this->db->get();
		$dl=$dl->result_array();
		return $dl;
		
		
	}
	
	function getmonths()
	{
		$this->db->select('sum(total)as doanhthu');
		$this->db->from('transaction');
		$this->db->where('status', 1);
		$d=strtotime("first day of previous month");
		$d1=strtotime("last day of previous month");
		$this->db->where("ngaydat BETWEEN '$d' AND '$d1'" );
		$dl=$this->db->get();
		$dl=$dl->result_array();
  		return $dl;
		
	}





	function gettotalbyyear()
	{
		$this->db->select('sum(total) as doanhthunam');
		$this->db->from('transaction');
		$this->db->where('status', 1);
		$d=strtotime("first day of previous year");
		$d1=strtotime("last year December 31st");
		$this->db->where("ngaydat BETWEEN '$d' AND '$d1'" );
		$dl=$this->db->get();
		$dl=$dl->result_array();
		return $dl;
		
		
	}
	function gettiledon()
	{
		$this->db->select('count(id)');
		$this->db->from('transaction');
		$this->db->where('status', 1);
		$dl=$this->db->get();
		$dl=$dl->result_array();
		return $dl;
		
		
	}
	function gettong()
	{
		$this->db->select('count(id)');
		$this->db->from('transaction');
		$this->db->where('status', 0);
		$this->db->or_where('status', 1);
		$dl=$this->db->get();
		$dl=$dl->result_array();
		return $dl;
	}
	function getdondangxuly()
	{
		$this->db->select('count(id)');
		$this->db->from('transaction');
		$this->db->where('status', NULL);
		$dl=$this->db->get();
		$dl=$dl->result_array();
		return $dl;
	}





}

/* End of file billing_model.php */
/* Location: ./application/models/billing_model.php */