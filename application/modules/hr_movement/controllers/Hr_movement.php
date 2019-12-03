<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Class Hr-movement.
	 * Fungsi
	 * 1. index, param null return 
	 * 2. ci, param null return Halo CI
	 *
	 */

class Hr_movement extends CI_Controller {
    
	public function __construct() {
        parent::__construct();
        $this->load->library('Aauth');
		$this->load->database('db1');
		$this->load->model('Promotion_model');

    }
	
	public function index()
	{
			$ID = $this->session->userdata('nik');
			$data['result'] = $this->Promotion_model->get_new_req();
			$data['person'] = $this->Promotion_model->get_related_per($ID);
			$data['org'] = $this->Promotion_model->choose_org();
			$data['type'] = $this->Promotion_model->choose_move_type($ID);
			// $data['req'] = $this->Promotion_model->choose_request_name($ID);
			$data['req'] = $this->Promotion_model->choose_request_name($ID);
			$data['pos'] = $this->Promotion_model->choose_move_position($ID);
			$data['tot'] = count($data['result']);
			$data["header"] = $this->load->view('header/v_header','',TRUE);
			$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
			//var_dump($data['person']);
			$this->load->view('hr_movement/v_form_movement',$data);			

	}

	
	public function hire_history()
	{
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$data['table'] = $this->Promotion_model->get_hire();
		
		//var_dump($data['table']);
		
		$this->load->view('hr/v_form',$data);		
	}

	function chs_dep(){
		$ID = $this->input->post('ID');
		$where = array('ParentID'=>$ID);
		$data = $this->Promotion_model->chs_dep($where);
		echo json_encode($data);
	  }
	
	  function search_position(){
		$ID = $this->input->get('ID');
		//$where = array('ID'=>$ID);
		$data = $this->Promotion_model-> choose_request_name($ID);
		echo json_encode($data);
	  }

	  function get_request(){
        $Request=$this->input->get('ID');
        $data=$this->Promotion_model->choose_request_name($Request);
        echo json_encode($data);
	}
	
	function search_requestor_pro(){
		$Request = $this->input->get('Request');
		$data = $this->Promotion_model->search_requestor_pro($Request);
		echo json_encode($data);
	}

	function request(){
		$json = [];
		$this->load->database();
		if(!empty($this->input->get("q"))){
				$compClue = $this->input->get("q");
				$data = $this->Promotion_model->get_search_request($compClue, 'FullName');
			}
			echo json_encode($data);
	  }

	//   function select2(){
	// 	$json = [];
	// 	$this->load->database();
	// 	if(!empty($this->input->get("q"))){
	// 			$compClue = $this->input->get("q");
	// 			$data = $this->Promotion_model->get_search_placement($compClue, 'Name');
				
	// 		}
	// 		echo json_encode($data);
	//   }
	
}