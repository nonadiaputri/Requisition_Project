<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sidebar extends CI_Controller {
    
	public function __construct() {
        parent::__construct();
        //$this->load->library("Aauth");
		$this->load->database('db1');
		$this->load->model("Sidebar_model");
    }
	
	function index()
	{
		$this->load->view('v_sidebar');
	}

	function rule(){
        $sess = $this->session->userdata('new_id');

        $role = $this->Sidebar_model->role_access_hris($sess);
		var_dump($role);
		
    }
}
