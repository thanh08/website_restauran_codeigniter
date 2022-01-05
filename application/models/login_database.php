<?php

Class Login_Database extends CI_Model {
	public function __construct()
	{
		parent::__construct();
			   $this->load->library('email');

	}

// Insert registration data in database
public function registration_insert($data) {

// Query to check whether username already exist or not
$condition = "user_name =" . "'" . $data['user_name'] . "'";
$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 0) {

// Query to insert data in database
$this->db->insert('user_login', $data);
if ($this->db->affected_rows() > 0) {
return true;
}
} else {
return false;
}
}

// Read data using username and password
public function login($data) {

$condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return true;
} else {
return false;
}
}

// Read data from database to show data in admin page
public function read_user_information($username) {

$condition = "user_name =" . "'" . $username . "'";
$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}



function updatethongtin($id,$dl)
{
	$this->db->where('id', $id);
	$dl=$this->db->update('user_login', $dl);
	return $dl;
	
}
function getuser($id)
{
	$this->db->select('*');
	$this->db->where('id', $id);
	$dl=$this->db->get('user_login');
	$dl=$dl->result_array();
	return $dl;
	
}

public function ForgotPassword($email)
{
    $this->db->select('user_email');
    $this->db->from('user_login');
    $this->db->where('user_email', $email);
    $query=$this->db->get();
    return $query->row_array();
}


public function sendpassword($data)
{
    $email = $data['user_email'];

    $query1=$this->db->query("SELECT *  from user_login where user_email = '".$email."' ");
    $row=$query1->result_array();
    // echo "<pre>";
    // print_r ($row);
    // echo "</pre>";
    if ($query1->num_rows()>0)
{
        $passwordplain = "";
        $passwordplain  = rand(999999999,9999999999);
        // $newpass['password'] = md5($passwordplain);
        $newpass['user_password'] = $passwordplain;
        $this->db->where('user_email', $email);
        $this->db->update('user_login', $newpass);
        $mail_message='Chào '.$row[0]['user_name'].','. "\r\n";
        $mail_message.='Cảm ơn bạn đã liên hệ về việc quên mật khẩu
,<br><b>Mật khẩu</b> của bạn là: <b>'.$passwordplain.'</b>'."\r\n";
        $mail_message.='<br>Vui lòng cập nhật mật khẩu của bạn.';
        $mail_message.='<br>Xin cảm ơn!';
        $mail_message.='<br>Nhà hàng Artica';
        //Configure email library
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'thanhpppp360@gmail.com';
		$config['smtp_pass'] = '0367159124';
		$config['smtp_timeout'] = 5;
		$config['mailtype'] = 'html';
		$config['newline'] = "\r\n";
		$this->email->initialize($config);

		// Sender email address
		$this->email->from('thanhpppp360@gmail.com','Nhà hàng Artica');
		// Receiver email address
		$this->email->to($email);
		$this->email->subject('Nhà hàng xác nhận thay đổi mật khẩu!');
		$this->email->message($mail_message);
		if ($this->email->send()) {
	   	$this->load->view('xacnhanbook');
		//echo 'thanh cong';
		} else {
		      echo 'Invalid Gmail Account or Password !';
		}

        // require 'PHPMailerAutoload.php';
        // require 'class.phpmailer.php';
        // $mail = new PHPMailer;
        // $mail->IsSendmail();
        // $mail->isSMTP();
        // $mail->SMTPAuth = true;
        // $mail->Host = "hostname";
        // $subject = 'Testing Email';
        // $mail->AddAddress($email);
        // $mail->IsMail();
        // $mail->From = 'thanhpppp360@gmail.com';
        // $mail->FromName = 'admin';
        // $mail->IsHTML(true);
        // $mail->Subject = $subject;
        // $mail->Body    = $mail_message;
        // $mail->Send();
        // if (!$mail->send()) {

        //     echo "<script>alert('msg','Failed to send password, please try again!')</script>";
        // } else {

        //     echo "<script>alert('msg','Password sent to your email!')</script>";
        // }
        // redirect(base_url().'Jobseeker/index','refresh');
    }
    else
    {

        echo "<script>alert('msg','Email not found try again!')</script>";
        //redirect(base_url().'Jobseeker/index','refresh');
    }
}






	function getUserPassword($session_id)
	{
	$getUserPassword=$this->db->query("select * from user_login where id='$session_id'");
	$res=$getUserPassword->result_array();
	return $res;
	}


	function update_new_set_password($session_id,$freshpassword)
	{
	$update_pass=$this->db->query("UPDATE user_login set user_password='$freshpassword'  where id='$session_id'");
	}








}

?>