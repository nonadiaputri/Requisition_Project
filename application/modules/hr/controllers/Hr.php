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
	
	public function index()
	{
    $data['result'] = $this->Hire_model->get_new_req();
    $data['org'] = $this->Hire_model->choose_org();
    $data['tot'] = count($data['result']);
    //$data['sidebar']='level4/sidebar';
    $this->load->view('hr/v_form',$data);
	}

	
	public function hire_history()
	{
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$data['table'] = $this->Hire_model->get_hire();
		
		var_dump($data['table']);
		
		$this->load->view('hr/v_form',$data);		
	}

	function chs_dep(){
		$ID = $this->input->post('ID');
		$where = array('ParentID'=>$ID);
		$data = $this->Hire_model->chs_dep($where);
		echo json_encode($data);
	  }
	
	  function search_position(){
		$ID = $this->input->post('ID');
		//$where = array('ID'=>$ID);
		$data = $this->Hire_model->search_PosInOrg($ID);
		echo json_encode($data);
	  }

	  function select2(){
		$json = [];
		$this->load->database();
		if(!empty($this->input->get("q"))){
				$compClue = $this->input->get("q");
				$data = $this->Hire_model->get_search_placement($compClue, 'Name');
				
			}
			echo json_encode($data);
	  }
	
}