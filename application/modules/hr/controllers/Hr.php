<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Class Hr-hire.
	 * Fungsi
	 * 1. index, param null return 
	 * 2. ci, param null return Halo CI
	 *
	 */

class Hr extends CI_Controller {
    
	public function __construct() {
        parent::__construct();
        $this->load->library('Aauth');
		$this->load->database('db1');
		$this->load->model('Hire_model');

    }
	
	function index()
	{
		echo "Halo HR Hire ".CI_VERSION;
	}
	
	public function hire_history()
	{
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$data['table'] = $this->Hire_model->get_hire();
		
		var_dump($data['table']);
		
		$this->load->view('halo/v_table',$data);		
	}
	
}