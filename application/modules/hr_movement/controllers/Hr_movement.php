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
		$this->load->model('Movement_model');

    }
	
	public function index()
	{
		// $ID = $this->session->userdata('nik');
		$nik = $this->session->userdata('nik');

		$check = $this->Movement_model->check_personnel($nik);
		$sess = $this->Movement_model->make_session($nik);
		$object = json_decode(json_encode($sess));

		if ($sess != '') {
			$data = array(
			  'Name2'    => $object->FullName,
			  'NIK2'     => $object->PersonnelNumber,
			  'ID2'    => $object->ID,
			  'Position'   => $object->Postion,
			  'PositionID' => $object->PostionID,
			  'Organization' =>$object->Organization,
			  'OrganizationID' =>$object->OrganizationID,
			  'ParentOrganization' =>$object->ParentOrganization,
			  'ParentOrganizationID' => $object->ParentOrganizationID,
			  'ParentPosition' =>$object->ParentPosition,
			  'ParentPositionID'=>$object->ParentPositionID,
			  'ParentPersonnel' => $object->ParentPersonnel,
			  'ParentPersonnelID' => $object->ParentPersonnelID
			);
			//var_dump($data);
			
	  
		  $this->session->set_userdata($data);
		  
		  }
		  
	  
		  //var_dump($check);
		  $per_id = $check[0]['ID'];
		  //var_dump($per_id);
		  if ($check == 0) {
			$data["header"] = $this->load->view('header/v_header','',TRUE);
				$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
			$this->load->view('hr_movement/v_error_movement', $data);
		  }else{
			$check2 = $this->Movement_model->auto_register($nik);
			//var_dump($check2);
			$dt = $check2['ID'];
			//var_dump($dt);
			$check3 = $this->Movement_model->auto_register2($dt, $per_id);
			$data['person'] = $this->Movement_model->get_related_per($dt);
			//var_dump($data['person']);
			$ID = $this->session->userdata('ID2');
			$req_dep = $this->session->userdata('OrganizationID');
			$data['result'] = $this->Movement_model->get_new_req($ID, $req_dep);
			$data['tot'] = count($data['result']);
		   
			$data['type'] = $this->Movement_model->choose_move_type($ID);
			$data['pos'] = $this->Movement_model->choose_move_position($ID);
			$data['org'] = $this->Movement_model->choose_org();  
			$data["header"] = $this->load->view('header/v_header','',TRUE);
			$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
			$this->load->view('hr_movement/v_form_movement',$data);
	
		// $data['result'] = $this->Movement_model->get_new_req();
		// $data['person'] = $this->Movement_model->get_related_per($ID);
		// $data['org'] = $this->Movement_model->choose_org();
		 
		// // $data['req'] = $this->Movement_model->choose_request_name($ID);
		// $data['req'] = $this->Movement_model->choose_request_name($ID);
		 
		// $data['tot'] = count($data['result']);
		// $data["header"] = $this->load->view('header/v_header','',TRUE);
		// $data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		// //var_dump($data['person']);
		// $this->load->view('hr_movement/v_form_movement',$data);			

	}
}

		function position(){
			$json = [];
			$this->load->database();
			if(!empty($this->input->get("q"))){
					$compClue = $this->input->get("q");
					$data = $this->Movement_model->get_search_position($compClue, 'Name');
				}
				echo json_encode($data);
		}

	
	public function movement_history()
	{
	// 	$requestor_id = $this->session->userdata('PersonnelIDList');
	// 	$data['hire'] = $this->Hire_model->get_new_req();
	// 	$data['prom'] = $this->Movement_model->get_new_promotion();
	// 	$data['all'] = count($data['prom']);
	// 	$data['tot'] = count($data['hire']);
	//   $data['res'] = $this->Movement_model->get_promotion($requestor_id);
	// 	 $data['myreq'] = $this->Movement_model->get_your_request($requestor_id);
	// 	$data['myreq'] = $this->Movement_model->get_your_request();
	// 	$data["header"] = $this->load->view('header/v_header','',TRUE);
	// 	$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
	// 	$data['table'] = $this->Movement_model->get_hire();
		
	// 	var_dump($data['table']);

		$requestor_id = $this->session->userdata('ID2');
	    $data['myreq'] = $this->Movement_model->get_your_request($requestor_id);
  		$data["header"] = $this->load->view('header/v_header','',TRUE);
  		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		
		$this->load->view('hr_movement/v_movement_history',$data);		
	}

	function chs_dep(){
		$ID = $this->input->post('ID');
		$where = array('ParentID'=>$ID);
		$data = $this->Movement_model->chs_dep($where);
		echo json_encode($data);
	  }
	
	  function search_position(){
		$ID = $this->input->get('ID');
		//$where = array('ID'=>$ID);
		$data = $this->Movement_model-> choose_request_name($ID);
		echo json_encode($data);
	  }

	  function get_request(){
        $Request=$this->input->get('ID');
        $data=$this->Movement_model->choose_request_name($Request);
        echo json_encode($data);
	}
	
	function search_requestor_pro(){
		$Request = $this->input->get('Request');
		$data = $this->Movement_model->search_requestor_pro($Request);
		echo json_encode($data);
	}

	function request(){
		$json = [];
		$this->load->database();
		if(!empty($this->input->get("q"))){
				$compClue = $this->input->get("q");
				$data = $this->Movement_model->get_search_request($compClue, 'FullName');
			}
			echo json_encode($data);
	  }

	  function select2(){
		$json = [];
		$this->load->database();
		if(!empty($this->input->get("q"))){
				$compClue = $this->input->get("q");
				$data = $this->Movement_model->get_search_request($compClue, 'FullName');
				
			}
			echo json_encode($data);
	  }

	function need_approval(){
		$requestor_id = $this->session->userdata('ID2');
		$data['need_app'] = $this->Movement_model->need_approval_req($requestor_id);
		//var_dump($data['need_app']);
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$this->load->view('hr_movement/v_need_approval',$data);
	  }
	
}