<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagination_Model extends CI_Model {
function __construct() {
parent::__construct();
}
// Count all record of table "contact_info" in database.
public function record_count() {
return $this->db->count_all("transaction");
}
public function record_count1() {
	$this->db->where('payment_info','Thanh toán tại bàn');
$this->db->from('transaction');
return $this->db->count_all_results();
 
}
// Fetch data according to per_page limit.
public function fetch_data($limit,$trang) {
$this->db->select('*,transaction.id');
$this->db->from('transaction');
$this->db->join('user_login', 'transaction.user_id = user_login.id', 'left');
$this->db->where('payment_info','COD');
$this->db->or_where('payment_info','Credit Card');
$this->db->order_by("ngaydat", "DESC");

$vt=($trang-1)*10;
$query = $this->db->get("",$limit,$vt);
if ($query->num_rows() > 0) {
foreach ($query->result_array() as $row) {
$data[] = $row;
}

return $data;
}
return false;
}
//Fetch data order at restaurant according to per_page limit
public function fetch_data1($limit,$trang) {
$this->db->select('*,transaction.id,transaction.ngaydat as ngaydattransaction ');
$this->db->from('transaction');
$this->db->join('user_login', 'transaction.user_id = user_login.id', 'left');
$this->db->join('table_book', 'transaction.id = table_book.transaction_id', 'left');
$this->db->order_by("transaction.ngaydat", "DESC");
$this->db->where('payment_info','Thanh toán tại bàn');

$vt=($trang-1)*10;
$query = $this->db->get("",$limit,$vt);
if ($query->num_rows() > 0) {
foreach ($query->result_array() as $row) {
$data[] = $row;
}

return $data;
}
return false;
}


}
?>