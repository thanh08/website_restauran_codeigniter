<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	   $this->load->model('updatesline_model');
	   $this->load->model('danhmuc_model');

	}

	public function index()
	{
		$dulieu1 =$this->updatesline_model->getdulieuheader();
        $dulieuheader=json_decode($dulieu1,true);
	  $dulieutintuctrangchu=$this->danhmuc_model->laytintucloadtrangchu();



		$dulieu = [
		    'dulieuheader' => $dulieuheader,
		    'dulieunewstrangchu' => $dulieutintuctrangchu
		    
		];
		$this->load->view('about', $dulieu, FALSE);
	}

}

/* End of file About.php */
/* Location: ./application/controllers/About.php */