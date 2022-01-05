<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dash1 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('billing_model');
		$this->load->model('pagination_model');
	}

	public function index()
	{
		$d1=$this->billing_model->gettiledon();
		$d2=$this->billing_model->gettong();
		$d1 = (int)$d1[0]['count(id)'];
		$d2 = (int)$d2[0]['count(id)'];
		$d3=($d1/$d2)*100;
		$d3=(int)$d3;
		$totalpending=$this->billing_model->getdondangxuly();
		$totalpending= (int)$totalpending[0]['count(id)'];
		$totalmonth=$this->billing_model->gettotalbymonth();
		$totalyear=$this->billing_model->gettotalbyyear();
		$m12=$this->billing_model->getmonths();
		$m12= (int)$m12[0]['doanhthu'];
		$dl = [
		    'totalmonth' => $totalmonth,
		    'totalyear' => $totalyear,
		    'd3'=>$d3,
		    'totalpending'=>$totalpending,
		    'm12'=>$m12
		];

		$this->load->view('dashboard',$dl,FALSE);
	}
	function getdata()
	{
		$all=$this->pagination_model->record_count();
		$dat=$this->pagination_model->record_count1();
		$tiledat=($dat/$all)*100;
		$t=(int)$tiledat;
		$t=json_encode($t);
		echo $t;
		
	}
	


}

/* End of file dash.php */
/* Location: ./application/controllers/dash.php */