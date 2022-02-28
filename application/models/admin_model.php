<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function insertdulieuuser($ten,$taikhoan,$sdt,$email,$matkhau){
		$dulieu = [
		    'ten' =>$ten,
		    'taikhoan'=>$taikhoan,
		    'sdt'=>$sdt,
		    'email'=>$email,
		    'matkhau'=>$matkhau,


		];
		return $this->db->insert('taikhoanadmin', $dulieu);
	}
	function getdatataikhoan($taikhoan,$matkhau)
	{
		$this->db->select('taikhoanadmin.taikhoan,taikhoanadmin.matkhau');
		$this->db->from('taikhoanadmin');
		$this->db->where('taikhoan', $taikhoan);
	    $this->db->where('matkhau ', $matkhau);
		$dulieu=$this->db->get();
		$dulieu=$dulieu->result_array();
		return $dulieu;
		// echo "<pre>";
		// var_dump($dulieu);
		// echo "</pre>";
		

		
	}
	function laydulieuadmin()
	{
		$this->db->select('*');
		$this->db->from('taikhoanadmin');
		$dulieu=$this->db->get();
		$dulieu=$dulieu->result_array();
		return $dulieu;


	}
	function luudulieu($id,$ten,$taikhoan,$sdt,$email)
	{
		$dulieu = [
			'id'=>$id,
		    'ten'=>$ten,
		    'taikhoan'=>$taikhoan,
		    'sdt'=>$sdt,
		    'email'=>$email
		];
		$this->db->where('id', $id);
		$this->db->update('taikhoanadmin', $dulieu);
		if ($this->db->affected_rows() > 0) {
			echo 'thanhcong';
		}
		else{
			echo 'thatbai';
		}
		
	}
	function xoaadmin($id)
	{
		$this->db->where('id', $id);
		$dulieu=$this->db->delete('taikhoanadmin');
		return $dulieu;

		
	}
	function getdulieuuser()
	{
		$this->db->select('*');
		$this->db->from('user_login');
		$dl=$this->db->get();
		$dl=$dl->result_array();
		return $dl;

	}
	function getblockuser($id)
	{
		$dl = [
		    'user_status' =>1 
		];
		$this->db->where('id', $id);
		$dl=$this->db->update('user_login', $dl);
		return $dl;
		
	}
	function getunblockuser($id)
	{
		$dl = [
		    'user_status' =>0 
		];
		$this->db->where('id', $id);
		$dl=$this->db->update('user_login', $dl);
		return $dl;
		
	}
	public function ForgotPassword($email)
{
    $this->db->select('email');
    $this->db->from('taikhoanadmin');
    $this->db->where('email', $email);
    $query=$this->db->get();
    return $query->row_array();
}


public function sendpassword($data)
{
    $email = $data['email'];

    $query1=$this->db->query("SELECT *  from taikhoanadmin where email = '".$email."' ");
    $row=$query1->result_array();
    // echo "<pre>";
    // print_r ($row);
    // echo "</pre>";
    if ($query1->num_rows()>0)
{
        $passwordplain = "";
        $passwordplain  = rand(999999999,9999999999);
        // $newpass['password'] = md5($passwordplain);
        $newpass['matkhau'] = $passwordplain;
        $this->db->where('email', $email);
        $this->db->update('taikhoanadmin', $newpass);
        $mail_message='Chào '.$row[0]['ten'].','. "\r\n";
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
	   	$this->load->view('xacnhantakepass');
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


}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */