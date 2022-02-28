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
$this->load->model('product_model');
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
$resultstatus = $this->login_database->loginstatus($data);

if ($result == TRUE && $resultstatus == TRUE) {

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

elseif ($result == TRUE && $resultstatus == FALSE) {

    $dulieu1 =$this->updatesline_model->getdulieuheader();
    $dulieuheader=json_decode($dulieu1,true);
    $dulieutintuctrangchu=$this->danhmuc_model->laytintucloadtrangchu();
    $data = array(
    'error_message' => 'Tài khoản đã bị khóa!',
    'dulieuheader' => $dulieuheader,
    'dulieunewstrangchu' => $dulieutintuctrangchu
    );
    $this->load->view('login_form', $data);
}
else{
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
    $dl3=$this->product_model->getspyeuthich($id);
    // echo "<pre>";
    // var_dump ($dl3);
    // echo "</pre>";
    $dl=$this->input->post('luachon');
        if ($dl=='5don') {
            //echo '5don';
    $dl=$this->billing_model->getdulieugiaodich5day($id);
// echo "<pre>";
// var_dump($dl);
// echo "</pre>";
        }
        elseif ($dl=='huy') {
                $dl=$this->billing_model->getdulieugiaodichhuy($id);
                // echo 'huy';
                // echo "<pre>";
                // var_dump ($dl);
                // echo "</pre>";

        }
        elseif ($dl=='hoanthanh') {
                $dl=$this->billing_model->getdulieugiaodichhoanthanh($id);
                // echo 'hoanthanh';
                // echo "<pre>";
                // var_dump ($dl);
                // echo "</pre>";

        }
        elseif ($dl=='1thang') {
            $dl=$this->billing_model->getdulieugiaodich1thang($id);
                // echo '1thang';
                // echo "<pre>";
                // var_dump ($dl);
                // echo "</pre>";

        }
        else{
            $dl=$this->billing_model->getdulieugiaodich($id);
<<<<<<< HEAD
=======
            // echo "<pre>";
            // var_dump ($dl);
            // echo "</pre>";
>>>>>>> 7d99a79... new update

        }
    $dl1=$this->login_database->getuser($id);
    $dl4=$this->input->post('luachon1');
    if ($dl4 == '5don1') {
        echo '5don';
        $dl2=$this->billing_model->getdulieugiaodich15day($id);

    }elseif ($dl4 == 'huy1') {
        echo 'huy1';
        $dl2=$this->billing_model->getdulieugiaodich1huy($id);
                // echo 'huy';
                // echo "<pre>";
                // var_dump ($dl);
                // echo "</pre>";

        }
        elseif ($dl4 == 'hoanthanh1') {
        echo 'hoanthanh';
        $dl2=$this->billing_model->getdulieugiaodich1hoanthanh($id);
                // echo 'huy';
                // echo "<pre>";
                // var_dump ($dl);
                // echo "</pre>";

        }
        elseif ($dl4 == '1thang') {
        echo '1thang';
        $dl2=$this->billing_model->getdulieugiaodich11thang($id);
                // echo 'huy';
                // echo "<pre>";
                // var_dump ($dl);
                // echo "</pre>";

        }
    else{
    $dl2=$this->billing_model->getdulieugiaodich1($id);

<<<<<<< HEAD
=======
    }
    // echo "<pre>";
    // var_dump ($dl2);
    // echo "</pre>";

>>>>>>> 7d99a79... new update
            $dulieu = [
                'dulieuheader' => $dulieuheader,
                'dulieunewstrangchu' => $dulieutintuctrangchu,
                'dulieudonhang' => $dl,
                'user'=>$dl1,
                'dulieudonhang1'=>$dl2,
                'monyeuthich'=>$dl3

                
            ];

    	$this->load->view('admin_page',$dulieu,FALSE);
    }
    function locdulieu()
    {
        
        $dl=$this->input->post('luachon');
        if ($dl=='5don') {
            echo 'ok';
        }


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
    //danh gia
    function danhgia()
    {
        if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $phone = ($this->session->userdata['logged_in']['phone']);
    $id = ($this->session->userdata['logged_in']['id']);
    }
        $s=$this->input->post('rating');
<<<<<<< HEAD
        $noidung=htmlspecialchars($this->input->post('comment'));
        $dl = [
            'user_id' =>$id,
=======
        $idgiaodich=$this->input->post('idgiaodich');
        $noidung=htmlspecialchars($this->input->post('comment'));
        $dl = [
            'user_id' =>$id,
            'transaction_id' =>$idgiaodich,
>>>>>>> 7d99a79... new update
            'ratting' =>$s,
            'comment' =>$noidung 
        ];
       $dl =$this->product_model->danhgiasp($dl);
       if ($dl) {
<<<<<<< HEAD
           echo 'thanhcong';
=======
           echo 'Bạn đã đánh giá thành công!';
>>>>>>> 7d99a79... new update
           redirect('../user_authentication/xemuser', 'refresh');
       }
        
        
    }



    // Logout from admin page
     function logout() {

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
    'error_message' => 'Email không tồn tại!',
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
    function xoayeuthich($id)
    {
        $dl=$this->product_model->xoaspfavorite($id);
        if ($dl) {
            echo 'thanhcong';
        }
        
    }





    // Set array for PAGINATION LIBRARY, and show view data according to page.
        public function don_info(){
        $config = array();
        $config["base_url"] = base_url() . "user_authentication/don_info";
        $total_row = $this->pagination_model->record_count();
        // echo "<pre>";
        // print_r ($total_row);
        // echo "</pre>";
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