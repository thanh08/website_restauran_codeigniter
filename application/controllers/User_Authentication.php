<?php

//session_start(); //we need to start session in order to access it through CI

Class User_Authentication extends CI_Controller {

public function __construct() {

parent::__construct();

// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');
//load pagination
$this->load->library('pagination');

$this->load->model('billing_model');
// Load database
$this->load->model('login_database');
//load header and footer
$this->load->model('updatesline_model');
$this->load->model('danhmuc_model');
$this->load->model('pagination_model');
}

// Show login page
public function index() {
$dulieu1 =$this->updatesline_model->getdulieuheader();
        $dulieuheader=json_decode($dulieu1,true);
        $dulieutintuctrangchu=$this->danhmuc_model->laytintucloadtrangchu();



        $dulieu = [
            'dulieuheader' => $dulieuheader,
            'dulieunewstrangchu' => $dulieutintuctrangchu
            
        ];
$this->load->view('login_form',$dulieu,FALSE);
}

// Show registration page
public function user_registration_show() {
    $dulieu1 =$this->updatesline_model->getdulieuheader();
    $dulieuheader=json_decode($dulieu1,true);
    $dulieutintuctrangchu=$this->danhmuc_model->laytintucloadtrangchu();



        $dulieu = [
            'dulieuheader' => $dulieuheader,
            'dulieunewstrangchu' => $dulieutintuctrangchu
            
        ];
$this->load->view('registration_form',$dulieu,FALSE);
}

// Validate and store registration data in database
public function new_user_registration() {

// Check validation for user input in SignUp form
//$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
//$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
//$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
//if ($this->form_validation->run() == FALSE) {
//$this->load->view('registration_form');
//} else {
$data = array(
'user_name' => $this->input->post('username'),
'user_email' => $this->input->post('email_value'),
'user_phone' => $this->input->post('sdt'),
'user_password' => $this->input->post('password'),
'user_address' => $this->input->post('diachi')
);
$result = $this->login_database->registration_insert($data);
if ($result == TRUE) {
//$data['message_display'] = ' Đăng kí thành công !';
//$this->load->view('login_form', $data);
 $this->load->view('dktaikhoanthanhcong');
} else {
$data['message_display'] = 'Tên tài khoản đã tồn tại !';
$this->load->view('registration_form', $data);
}
//}
}

// Check for user login process
public function user_login_process() {

//$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
//$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

//if ($this->form_validation->run() == FALSE) {
// if(isset($this->session->userdata['logged_in'])){
// $this->load->view('admin_page');
// }else{
// $this->load->view('login_form');
// }
//} else {
$data = array(
'username' => $this->input->post('username'),
'password' => $this->input->post('password')
);
$result = $this->login_database->login($data);
if ($result == TRUE) {

$username = $this->input->post('username');
$result = $this->login_database->read_user_information($username);
if ($result != false) {
$session_data = array(
'username' => $result[0]->user_name,
'email' => $result[0]->user_email,
'phone' => $result[0]->user_phone,
'id' => $result[0]->id,
'address'=>$result[0]->user_address
);

// Add user data in session
$this->session->set_userdata('logged_in', $session_data);
redirect('../home','refresh');
}
} 

else

 {
    $dulieu1 =$this->updatesline_model->getdulieuheader();
    $dulieuheader=json_decode($dulieu1,true);
    $dulieutintuctrangchu=$this->danhmuc_model->laytintucloadtrangchu();
    $data = array(
    'error_message' => 'Tài khoản hoặc mật khẩu không đúng!',
    'dulieuheader' => $dulieuheader,
    'dulieunewstrangchu' => $dulieutintuctrangchu
    );
    $this->load->view('login_form', $data);
}


//}
}
function xemuser()
{
    $dulieu1 =$this->updatesline_model->getdulieuheader();
    $dulieuheader=json_decode($dulieu1,true);
    $dulieutintuctrangchu=$this->danhmuc_model->laytintucloadtrangchu();
    if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $phone = ($this->session->userdata['logged_in']['phone']);
    $id = ($this->session->userdata['logged_in']['id']);
    }
    $dl=$this->billing_model->getdulieugiaodich($id);
    $dl1=$this->login_database->getuser($id);
    $dl2=$this->billing_model->getdulieugiaodich1($id);
            $dulieu = [
                'dulieuheader' => $dulieuheader,
                'dulieunewstrangchu' => $dulieutintuctrangchu,
                'dulieudonhang' => $dl,
                'user'=>$dl1,
                'dulieudonhang1'=>$dl2

                
            ];
    	$this->load->view('admin_page',$dulieu,FALSE);
    }
    function xemchitietdon($id)
    {
    $dl1=$this->billing_model->getdulieumondat($id);
    $dl=json_encode($dl1);
    echo $dl;
    // echo "<pre>";
    // var_dump ($dl1);
    // echo "</pre>";
        
    }



    // Logout from admin page
    public function logout() {

    // Removing session data
    $sess_array = array(
    'username' => ''
    );
    $this->session->unset_userdata('logged_in', $sess_array);
    //$data['message_display'] = 'Đăng xuất thành công';
    //$this->load->view('login_form');
    redirect('../user_authentication','refresh');


}
function takepass()
{
     $dulieu1 =$this->updatesline_model->getdulieuheader();
    $dulieuheader=json_decode($dulieu1,true);
    $dulieutintuctrangchu=$this->danhmuc_model->laytintucloadtrangchu();



        $dulieu = [
            'dulieuheader' => $dulieuheader,
            'dulieunewstrangchu' => $dulieutintuctrangchu
            
        ];
$this->load->view('takepass',$dulieu,FALSE);
    
}



 function ForgotPassword()
{
    $email = $this->input->post('email');
    $findemail = $this->login_database->ForgotPassword($email);
    if ($findemail) {
        $this->login_database->sendpassword($findemail);
    } else {
        $dulieu1 =$this->updatesline_model->getdulieuheader();
    $dulieuheader=json_decode($dulieu1,true);
    $dulieutintuctrangchu=$this->danhmuc_model->laytintucloadtrangchu();
    $data = array(
    'error_message' => 'Tài khoản hoặc mật khẩu không đúng!',
    'dulieuheader' => $dulieuheader,
    'dulieunewstrangchu' => $dulieutintuctrangchu
    );
    $this->load->view('takepass', $data);
    }
}




    function suathongtinuser()
    {
        $name=$this->input->post('ten');
        $sdt=$this->input->post('sdt');
        $email=$this->input->post('email');
        $diachi=$this->input->post('diachi');
        $id=$this->input->post('id');
        $dl = [
            'user_name' =>$name,
            'user_email' =>$email,
            'user_phone' =>$sdt,
            'user_address'=>$diachi

        ];

        $dulieu=$this->login_database->updatethongtin($id,$dl);
        if ($dulieu) {
            $this->load->view('success_thongtinuser');
            
        }
        
    }


//thay đổi mật khẩu user
    public function update_new_set_password()
    {
        
        if (isset($this->session->userdata['logged_in'])) {
 
 
  $id = ($this->session->userdata['logged_in']['id']);


} else {
//header("location: login");

}
            $password_old=$this->input->post('password_old');
            $freshpassword=$this->input->post('freshpassword');
            $second_time_verify_password=$this->input->post('second_time_verify_password');
            $session_id=$id;
            $que=$this->login_database->getUserPassword($session_id);
            // echo "<pre>";
            // print_r ($que[0]['user_password']);
            // echo "</pre>";
            if((!strcmp($password_old,$que[0]['user_password']))&& (!strcmp($freshpassword, $second_time_verify_password))){
                $this->login_database->update_new_set_password($session_id,$freshpassword);
                echo "Bạn đã thay đổi mật khẩu thành công !";
                redirect('../user_authentication/xemuser','refresh');


                }
                else{
                    echo "Lỗi!Vui thử lại";
                }
       
    }





    // Set array for PAGINATION LIBRARY, and show view data according to page.
        public function don_info(){
        $config = array();
        $config["base_url"] = base_url() . "user_authentication/don_info";
        $total_row = $this->pagination_model->record_count();
        echo "<pre>";
        print_r ($total_row);
        echo "</pre>";
        $config["total_rows"] = $total_row;
        $config["per_page"] = 4;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        if($this->uri->segment(3)){
        $page = ($this->uri->segment(3)) ;
        }
        else{
        $page = 1;
        }
        $data["results"] = $this->pagination_model->fetch_data($config["per_page"],$page);
        // echo "<pre>";
        // var_dump($data["results"]);
        // echo "</pre>";
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );
        // echo "<pre>";
        // var_dump($data["links"]);
        // echo "</pre>";

        // View data according to array.
       // $this->load->view("pagination_view", $data);
        }







 }

?>