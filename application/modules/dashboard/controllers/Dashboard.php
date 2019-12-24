<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
	public function __construct() {
        parent::__construct();
		$this->load->library('Aauth');
		$this->load->database('db2');
		$this->load->model('Dashboard_model');

    }
	
	function index()
	{
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$this->load->view('v_dashboard_staf',$data);
	}

	function profile(){
		$nik = $this->session->userdata('nik');
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$data['person'] = $this->Dashboard_model->profile($nik);
		$this->load->view('v_dashboard_profile', $data);
	}
	
}