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


public function fetch_data5day($limit,$trang) {
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
public function fetch_data1thang() {
$this->db->select('*,transaction.id');
$this->db->from('transaction');
$this->db->join('user_login', 'transaction.user_id = user_login.id', 'left');
<<<<<<< HEAD



//$this->db->where('payment_info','COD');
//$this->db->or_where('payment_info','Credit Card');
$d=strtotime("first day of this month");
		$d1=strtotime("last day of this month");
		$this->db->where("ngaydat BETWEEN '$d' AND '$d1'" );
=======
//$this->db->where('payment_info','COD');
//$this->db->or_where('payment_info','Credit Card');
$d=strtotime("first day of this month");
$d1=strtotime("last day of this month");
$this->db->where("ngaydat BETWEEN '$d' AND '$d1'" );
>>>>>>> 7d99a79... new update
$this->db->order_by("ngaydat", "DESC");
$query = $this->db->get();
if ($query->num_rows() > 0) {
foreach ($query->result_array() as $row) {
$data[] = $row;
}

return $data;
}
return false;
}
public function fetch_datathanhcong() {
$this->db->select('*,transaction.id');
$this->db->from('transaction');
$this->db->join('user_login', 'transaction.user_id = user_login.id', 'left');
$this->db->where('status', 1);
//$this->db->where('payment_info','COD');
//$this->db->or_where('payment_info','Credit Card');
$this->db->order_by("ngaydat", "DESC");
$query = $this->db->get();
if ($query->num_rows() > 0) {
foreach ($query->result_array() as $row) {
$data[] = $row;
}

return $data;
}
return false;
}

public function fetch_datahuy() {
$this->db->select('*,transaction.id');
$this->db->from('transaction');
$this->db->join('user_login', 'transaction.user_id = user_login.id', 'left');
$this->db->where('status', 0);
//$this->db->where('payment_info','COD');
//$this->db->or_where('payment_info','Credit Card');
$this->db->order_by("ngaydat", "DESC");
//$vt=($trang-1)*5;
$query = $this->db->get();
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


public function fetch_data15day($limit,$trang) {
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


public function fetch_data1huy() {
$this->db->select('*,transaction.id,transaction.ngaydat as ngaydattransaction ');
$this->db->from('transaction');
$this->db->join('user_login', 'transaction.user_id = user_login.id', 'left');
$this->db->join('table_book', 'transaction.id = table_book.transaction_id', 'left');
$wherecond = " ( payment_info ='Thanh toán tại bàn') AND (transaction.status='0')  ";
$this->db->where($wherecond);
$this->db->order_by("transaction.ngaydat", "DESC");

//$this->db->where('payment_info','Thanh toán tại bàn');
//$this->db->where('transaction.status', 0);
//$vt=($trang-1)*10;
$query = $this->db->get();
$data=$query->result_array();
// if ($query->num_rows() > 0) {
// foreach ($query->result_array() as $row) {
// $data[] = $row;
// }

return $data;
//}
//return false;
}


public function fetch_data1hoanthanh() {
$this->db->select('*,transaction.id,transaction.ngaydat as ngaydattransaction ');
$this->db->from('transaction');
$this->db->join('user_login', 'transaction.user_id = user_login.id', 'left');
$this->db->join('table_book', 'transaction.id = table_book.transaction_id', 'left');
$this->db->order_by("transaction.ngaydat", "DESC");
$this->db->where('payment_info','Thanh toán tại bàn');
$this->db->where('status', 1);
//$vt=($trang-1)*10;
 $query = $this->db->get();
$data=$query->result_array();
 
// if ($query->num_rows() > 0) {
// foreach ($query->result_array() as $row) {
// $data[] = $row;
// }

return $data;
//}
//return false;
}

public function fetch_data11thang() {
$this->db->select('*,transaction.id,transaction.ngaydat as ngaydattransaction ');
$this->db->from('transaction');
$this->db->join('user_login', 'transaction.user_id = user_login.id', 'left');
$this->db->join('table_book', 'transaction.id = table_book.transaction_id', 'left');
$this->db->order_by("transaction.ngaydat", "DESC");
$this->db->where('payment_info','Thanh toán tại bàn');
$d=strtotime("first day of this month");
$d1=strtotime("last day of this month");
$this->db->where("transaction.ngaydat BETWEEN '$d' AND '$d1'" );
//$vt=($trang-1)*10;
$query = $this->db->get();
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