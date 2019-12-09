<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hr extends CI_Controller {
  
	public function __construct() {
        parent::__construct();
        // $this->load->library('Aauth');
		$this->load->database('db1');
		$this->load->model('Hire_model');
    }
	
	public function index()
	{
		$ID = $this->session->userdata('nik');
		$no = $this->session->userdata('ID');
		//var_dump($no);
		$email = $this->session->userdata('email');
		$name = $this->session->userdata('name');
		$nik = $this->session->userdata('nik');
		$Password = $this->session->userdata('password');
		$dept_id = $this->session->userdata('dept_id');
    $position = $this->session->userdata('position');
		$data1 = array(
	      'Email' => $email,
	      'Name' => $name,
	      'PersonnelNumber' => $nik,
	      'OrganizationID' => $dept_id,
	      'Password'=>$Password
	      );

		
		// $data['result'] = $this->Hire_model->get_new_req();
		// $data['tot'] = count($data['result']);
		$last_id = $this->Hire_model->auto_register($data1, $nik);
		// $id_personnel = $this->Hire_model->get_id_personnel($name);
		//var_dump($last_id);
		$dt = $last_id[0]['ID'];
		//var_dump($dt);
		$data2 = array(
			'UserID' => $no,
			'PersonnelID' => $last_id
		);
		if ($last_id != '') {
			$this->Hire_model->auto_register2($data2, $no);
      $res = $this->Hire_model->auto_regist_position($dt, $position);
		}
    $new_sess = array(
        'new_id'    => $dt);
    $this->session->set_userdata($new_sess);
		$data['person'] = $this->Hire_model->get_related_per($ID);
		$data['org'] = $this->Hire_model->choose_org();	
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
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

	public function hire_history(){
	    $requestor_id = $this->session->userdata('new_id');

	    //notif
	    //$data['hire'] = $this->Hire_model->get_new_req();
	    //$data['prom'] = $this->Promotion_model->get_new_promotion();
	    // $data['all'] = count($data['prom']);
	    // $data['tot'] = count($data['hire']);
	    //$data['res'] = $this->Hire_model->get_hire();
	    //var_dump($requestor_id);
	    $data['myreq'] = $this->Hire_model->get_your_request($requestor_id);
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$this->load->view('hr/v_hire_history',$data);
	}
	
	public function submit_hire(){
	    $requestor_id = $this->input->post('requestor_id');
	    $req_position_id = $this->input->post('req_position_id');
	    $org_id = $this->input->post('org_id');
	    $position = $this->input->post('position');
	    $total = $this->input->post('total');
	    $placement = $this->input->post('placement');
	    $status = $this->input->post('status');
	    $workdate = $this->input->post('workdate');
	    $ReplacementName = $this->input->post('ReplacementName');
	    $requirement = $this->input->post('requirement');
	    $responsibility = $this->input->post('responsibility');

	    $data = array(
	      'RequestorID' => $requestor_id,
	      'RequestorPositionID' => $req_position_id,
	      'RequestorDepartmentID' => $org_id,
	      'RequestedPositionID' => $position,
	      'ReplacementPersonnelID' => $ReplacementName,
	      'NumberOfPlacement' => $total,
	      'ExpectedWorkStartDate' => $workdate,
	      'RequisitionTypeID' => $status,
	      'RequirementDescription' => $requirement,
	      'DuttiesAndResponsibilities' => $responsibility,
	      'PlacementID' => $placement
	      );

	    $this->load->model('Hire_model');
	    $last_id = $this->Hire_model->Insert_data($data);
	    if ($last_id > 0) {

	      $data1 = array(
	        'EmployeeID' => $requestor_id,
	        'PositionID' => $req_position_id,
	        'RequisitionID' => $last_id );
	      $res = $this->Hire_model->Insert_to_Approval($data1);

	      if ($res > 0 ) {
	        echo json_encode(array('status'=>true));
	        
	      }else{
	      echo json_encode(array('status'=>false));
	    }
	    }
	}

	

	function save_data(){
	    $requestor_id = $this->input->post('requestor_id');
	    $req_position_id = $this->input->post('req_position_id');
	    $org_id = $this->input->post('org_id');
	    $position = $this->input->post('position');
	    $total = $this->input->post('total');
	    $placement = $this->input->post('placement');
	    $status = $this->input->post('status');
	    $workdate = $this->input->post('workdate');
	    $ReplacementName = $this->input->post('ReplacementName');
	    $requirement = $this->input->post('requirement');
	    $responsibility = $this->input->post('responsibility');
	    $IsProcessedToHire = '2';

	    $data = array(
	      'RequestorID' => $requestor_id,
	      'RequestorPositionID' => $req_position_id,
	      'RequestorDepartmentID' => $org_id,
	      'RequestedPositionID' => $position,
	      'ReplacementPersonnelID' => $ReplacementName,
	      'NumberOfPlacement' => $total,
	      'ExpectedWorkStartDate' => $workdate,
	      'RequisitionTypeID' => $status,
	      'RequirementDescription' => $requirement,
	      'DuttiesAndResponsibilities' => $responsibility,
	      'PlacementID' => $placement,
	      'IsProcessedToHire' => $IsProcessedToHire
	      );

	    //print_r($data);

	    $this->load->model('Hire_model');
	    $res = $this->Hire_model->Save_data($data);
	      if ($res > 0 ) {
	        $this->hire_history();
	      }else{
	      echo json_encode(array('status'=>false));
	      }
	}

	

	public function View($ID){
    //notif
    // $data['hire'] = $this->Hire_model->get_new_req();
    // $data['prom'] = $this->Promotion3_model->get_new_promotion();
    // $data['all'] = count($data['prom']);
    // $data['tot'] = count($data['hire']);
    //$where = array('a.ID' => $ID);
    $data['req'] = $this->Hire_model->get_hire_id($ID);
    $data['info'] = $this->Hire_model->get_apv_info($ID);
    $data['latest'] = $this->Hire_model->get_latest_apv($ID);
    
    //$data['requestor'] = $this->Hire_model->get_req($ID);
    //var_dump($data['latest']);
    $data["header"] = $this->load->view('header/v_header','',TRUE);
	$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
	$this->load->view('hr/v_view',$data);
 	}

 	function edit($ID){
	 	$ID2 = $this->session->userdata('nik');
		$data['person'] = $this->Hire_model->get_related_per($ID2);
	    // $data['hire'] = $this->Hire_model->get_new_req();
	    // $data['prom'] = $this->Promotion3_model->get_new_promotion();
	    // $data['all'] = count($data['prom']);
	    // $data['tot'] = count($data['hire']);
	    $data['row']= $this->Hire_model->get_hire_id($ID);
	    //var_dump($data['row']);
	    $data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$this->load->view('hr/v_edit_hire',$data);
	}

  function delete($ID){
  $this->Hire_model->hapus($ID);
  return $this->hire_history();
  }

  function do_update(){
    $ID = $this->input->post('id_req');
    $req_id = $this->input->post('req_id');
    $req_position_id = $this->input->post('req_position_id');
    $org_id = $this->input->post('org_id');
    $position = $this->input->post('position');
    $total = $this->input->post('total');
    $placement = $this->input->post('placement');
    $status = $this->input->post('status');
    $workdate = $this->input->post('workdate');
    $ReplacementName = $this->input->post('ReplacementName');
    $requirement = $this->input->post('requirement');
    $responsibility = $this->input->post('responsibility');
    $IsProcessedToHire = '0';

    $data = array(
      'RequestedPositionID' => $position,
      'ReplacementPersonnelID' => $ReplacementName,
      'NumberOfPlacement' => $total,
      'ExpectedWorkStartDate' => $workdate,
      'RequisitionTypeID' => $status,
      'RequirementDescription' => $requirement,
      'DuttiesAndResponsibilities' => $responsibility,
      'PlacementID' => $placement,
      'IsProcessedToHire' => $IsProcessedToHire
      );

    $data1 = array(
        'RequisitionID' => $ID,
        'EmployeeID' => $req_id,
        'PositionID' => $req_position_id,
        'OrganizationID' => $org_id);

    print_r($data1);
    //echo $data['IsProcessedToHire'];
    $res =$this->Hire_model->Update_data($data, $ID);
    $res2 = $this->Hire_model->Insert_to_Approval($data1);
    if ($res > 0 && $res2 > 0 ) {
       echo json_encode(array('status'=>true));
      }else{
      echo json_encode(array('status'=>false));
      }
  }

  function save_data2(){
    $ID = $this->input->post('id_req');
    $req_position_id = $this->input->post('req_position_id');
    $req_org_id = $this->input->post('req_org_id');
    $position = $this->input->post('position');
    $total = $this->input->post('total');
    $placement = $this->input->post('placement');
    $status = $this->input->post('status');
    $workdate = $this->input->post('workdate');
    $ReplacementName = $this->input->post('ReplacementName');
    $requirement = $this->input->post('requirement');
    $responsibility = $this->input->post('responsibility');
    $IsProcessedToHire = '2';
    

    $data = array(
      // 'RequestorPositionID' => $req_position_id,
      // 'RequestorDepartmentID' => $req_org_id,
      'RequestedPositionID' => $position,
      'ReplacementPersonnelID' => $ReplacementName,
      'NumberOfPlacement' => $total,
      'ExpectedWorkStartDate' => $workdate,
      'RequisitionTypeID' => $status,
      'RequirementDescription' => $requirement,
      'DuttiesAndResponsibilities' => $responsibility,
      'PlacementID' => $placement,
      'IsProcessedToHire' => $IsProcessedToHire
      );
    var_dump($data);
    //.var_dump($data);

    // $res = $this->Hire_model->update_saved_data($data, $ID);
    // //var_dump($res);
    //   if ($res > 0 ) {
    //     $this->hire_history();
    //   }else{
    //   echo json_encode(array('status'=>false));
    //   }
  }

  public function process($ID){
    $process = $this->input->post('process');
    $apv_id = $this->input->post('ApprovalStatusID');
    $where = array('ID' => $ID);
    $where1 = array('RequisitionID' => $ID);
    $status = '1';
    $apv_id_new = $apv_id + 1 ;

    $data = array(
      'ProcessStartDate' => $process,
      'IsProcessedToHire' => $status
      );

    $data1 = array(
      'ProcessStartDate' => $process,
      'IsProcessedToHire' => $status,
      'ApprovalStatusID' => $apv_id_new,
      'EmployeeID' => $this->session->userdata('new_id'),
      'RequisitionID' => $ID,
      'OrganizationID' => $this->session->userdata('dept_id'),
      'PositionID' => $this->session->userdata('id_position')
    );
    //var_dump($data1);
    $res = $this->Hire_model->process_data($data, $where);
    $res1 = $this->Hire_model->process_data_approval($data1);
      if ($res > 0 & $res1 > 0) {
        echo json_encode(array('status'=>true));
      }else{
      echo json_encode(array('status'=>false));
    }
  }

  public function hold($ID){
    $hold = $this->input->post('hold');
    $apv_id = $this->input->post('ApprovalStatusID');
    $where = array('ID' => $ID);
    $where1 = array('RequisitionID' => $ID);
    $status = '1';
    $apv_id_new = $apv_id + 1 ;

    $data = array(
      'HoldEndDate' => $hold,
      'IsHold' => $status
      );

    $data1 = array(
      'HoldEndDate' => $hold,
      'IsHold' => $status,
      'ApprovalStatusID' => $apv_id_new,
      'EmployeeID' => $this->session->userdata('new_id'),
      'RequisitionID' => $ID,
      'OrganizationID' => $this->session->userdata('dept_id'),
      'PositionID' => $this->session->userdata('id_position')
      );

    $res = $this->Hire_model->hold_data($data, $where);
    $res1 = $this->Hire_model->hold_data_approval($data1);
      if ($res > 0 & $res1 > 0) {
        echo json_encode(array('status'=>true));
      }else{
      echo json_encode(array('status'=>false));
    }

  }

  public function reject($ID){
    $reject = $this->input->post('reason_reject');
    $apv_id = $this->input->post('ApprovalStatusID');
    $where = array('ID' => $ID);
    $where1 = array('RequisitionID' => $ID);
    $status = '1';
    $apv_id_new = $apv_id + 1 ;

    $data = array(
      'RejectReason' => $reject,
      'IsRejected' => $status
      );

    $data1 = array(
      'RejectReason' => $reject,
      'IsRejected' => $status,
      'ApprovalStatusID' => $apv_id_new,
      'EmployeeID' => $this->session->userdata('new_id'),
      'RequisitionID' => $ID,
      'OrganizationID' => $this->session->userdata('dept_id'),
      'PositionID' => $this->session->userdata('id_position')
      );

    $res = $this->Hire_model->reject_data($data, $where);
    $res1= $this->Hire_model->reject_data_approval($data1);
      if ($res > 0 & $res1 > 0) {
        echo json_encode(array('status'=>true));
      }else{
      echo json_encode(array('status'=>false));
    }
  }

  function hire_status(){
    $requestor_id = $this->session->userdata('new_id');
    $data['row']= $this->Hire_model->get_hire_id($requestor_id);
    $data["header"] = $this->load->view('header/v_header','',TRUE);
    $data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
    $this->load->view('hr/v_hire_status',$data);
  }

}
?>

