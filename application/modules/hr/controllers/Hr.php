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
		
      $dat = $this->check();
      if ($dat == '') {
        $data["header"] = $this->load->view('header/v_header','',TRUE);
        $data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
        $this->load->view('hr/v_error_hris', $data);
      }else{
        //var_dump($dat);
        $data['person'] = $this->Hire_model->get_related_per($dat);
        //var_dump($data['person']);
        //var_dump($data['person']);
        $ID = $this->session->userdata('ID2');
        $req_dep = $this->session->userdata('OrganizationID');
        $data['result'] = $this->Hire_model->get_new_req($ID, $req_dep);
        $data['tot'] = count($data['result']);  
        $data['org'] = $this->Hire_model->choose_org();  
        $data["header"] = $this->load->view('header/v_header','',TRUE);
        $data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
        //$data["auto"] = $this->Hire_model->auto_regist_position($last_id, $position);
        $this->load->view('hr/v_form',$data);
      }
      
    
	}

  public function check(){
    $nik = $this->session->userdata('nik');
    

    $check = $this->Hire_model->check_personnel($nik);
    $sess = $this->Hire_model->make_session($nik);
    //var_dump($sess);
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
    
    $this->session->set_userdata($data);
    
    }
    
    $per_id = $check[0]['ID'];
    //print_r($object);
    if ($check == 0 || $sess == '') {
      return false;
    }else{
      $check2 = $this->Hire_model->auto_register($nik);
      //var_dump($check2);
      $dt = $check2['ID'];
      //var_dump($dt);
    
      $last_id = $object->ID;
      $position = $object->Postion;
      //var_dump($position);
      $data2 = array('UserID' => $dt);
      $this->session->set_userdata($data2);
      $check3 = $this->Hire_model->auto_register2($dt, $per_id);
      $check4 = $this->Hire_model->auto_regist_position($last_id, $position);
      return $dt;
    }
  }

  public function notif(){
    //$parent = $this->session->userdata('ParentPersonnelID');
    $ID = $this->session->userdata('ID2');
    $req_dep = $this->session->userdata('OrganizationID');
    
      $data['result'] = $this->Hire_model->get_new_req($ID, $req_dep);
      $data['tot'] = count($data['result']);
      echo json_encode($data);
   
  }

  public function notifApproval(){
    $ID = $this->session->userdata('ID2');
    $req_dep = $this->session->userdata('OrganizationID');
    $data['result'] = $this->Hire_model->get_new_req_approval($ID, $req_dep);
    $data['tot'] = count($data['result']);
    echo json_encode($data);
  }

  public function add_access()
	{
    $this->check();
		$nik = $this->session->userdata('nik');

    $check = $this->Hire_model->check_personnel($nik);
    $sess = $this->Hire_model->make_session($nik);
    $object = json_decode(json_encode($sess));
    //var_dump($object->Postion);
    //var_dump($count($sess));
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

    $OrganizationID = $this->session->userdata('OrganizationID');
    $PersonnelNumber = $this->session->userdata('NIK2');
    $name = $this->session->userdata('Name2');
    $ID = $this->session->userdata('ID2');
    $data['org'] = $this->Hire_model->get_organization($OrganizationID);
    $data['user'] = $this->Hire_model->get_userid($name);
    // var_dump($data['org']);
		$data['member'] = $this->Hire_model->get_member_organization($OrganizationID, $PersonnelNumber);
    // $data['org'] = $this->Hire_model->get_organization($dept_id);
		// $data['member'] = $this->Hire_model->get_member_organization($dept_id);
		// $data['person'] = $this->Hire_model->get_related_per($ID);
		// $data['org'] = $this->Hire_model->choose_org();	
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$this->load->view('hr/v_add',$data);
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

  function select_personnel1(){
    $json = [];
    $this->load->database();
    if(!empty($this->input->get("q"))){
            $compClue = $this->input->get("q");
            $data = $this->Hire_model->get_search_personnel($compClue, 'FullName');
            
        }
        echo json_encode($data);
  }

	public function hire_history(){
      $this->check();
	    $requestor_id = $this->session->userdata('ID2');
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
      $id = $this->session->userdata('UserID');
      var_dump($id);

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
        'CreatedByID' => $id,
        'LastModifiedByID' => $id
	      );

	    $this->load->model('Hire_model');
	    $last_id = $this->Hire_model->Insert_data($data);
	    if ($last_id > 0) {

	      $data1 = array(
	        'EmployeeID' => $requestor_id,
	        'PositionID' => $req_position_id,
	        'RequisitionID' => $last_id,
          'CreatedByID' => $id,
          'LastModifiedByID' => $id );
	      $res = $this->Hire_model->Insert_to_Approval($data1);

	      if ($res > 0 ) {
	        echo json_encode(array('status'=>true));
	        
	      }else{
	      echo json_encode(array('status'=>false));
	    }
	    }
	}

  public function search_info(){
    $ID = $this->input->post('ID');
    $data = $this->Hire_model->search_info($ID);
    echo json_encode($data);
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
      $id = $this->session->userdata('UserID');

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
	      'IsProcessedToHire' => $IsProcessedToHire,
        'CreatedByID'=>$id,
        'LastModifiedByID'=>$id
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
  

  function save_data_personnel(){
    $user_id = $this->input->post('user_id');
    $personnel_id= $this->input->post('personnel_id');

    $data = array(
      'UserID' => $user_id,
      'PersonnelID' => $personnel_id
      );

    //print_r($data);

    $this->load->model('hire_model');
    $res = $this->Hire_model->save_data_personnel($data);
      // if ($res > 0 ) {
      //   $this->hire_history();
      // }else{
      // echo json_encode(array('status'=>false));
      // }
}

	

	public function View($ID){
    $data['req'] = $this->Hire_model->get_hire_id($ID);
    $data['info'] = $this->Hire_model->get_apv_info($ID);
    $data['latest'] = $this->Hire_model->get_latest_apv($ID);
    $data['max'] = $this->Hire_model->get_max_apv($ID);
    $data["header"] = $this->load->view('header/v_header','',TRUE);
  	$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
  	$this->load->view('hr/v_view',$data);
 	}

 	function edit($ID){
	 	$ID2 = $this->session->userdata('UserID');
		$data['person'] = $this->Hire_model->get_related_per($ID2);
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
    $id_user = $this->session->userdata('UserID');

    $data = array(
      'RequestedPositionID' => $position,
      'ReplacementPersonnelID' => $ReplacementName,
      'NumberOfPlacement' => $total,
      'ExpectedWorkStartDate' => $workdate,
      'RequisitionTypeID' => $status,
      'RequirementDescription' => $requirement,
      'DuttiesAndResponsibilities' => $responsibility,
      'PlacementID' => $placement,
      'IsProcessedToHire' => $IsProcessedToHire,
      'CreatedByID' =>$id_user,
      'LastModifiedByID' => $id_user
      );

    $data1 = array(
        'RequisitionID' => $ID,
        'EmployeeID' => $req_id,
        'PositionID' => $req_position_id,
        'OrganizationID' => $org_id,
        'CreatedByID' => $id_user,
        'LastModifiedByID' => $id_user);

    //print_r($data1);
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
    $requestor = $this->input->post('requestor');
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
      'RequestorID' => $requestor,
      'RequestorPositionID' => $req_position_id,
      'RequestorDepartmentID' => $req_org_id,
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
    $res = $this->Hire_model->update_saved_data($data, $ID);
    //print_r($res);
      if ($res > 0 ) {
        echo json_encode(array('status'=>true));
        //$this->hire_history();
      }else{
      echo json_encode(array('status'=>false));
      }
  }

  public function process($ID){
    $process = $this->input->post('process');
    $apv_id = $this->input->post('ApprovalStatusID');
    $where = array('ID' => $ID);
    $where1 = array('RequisitionID' => $ID);
    $status = '1';
    $apv_id_new = $apv_id + 1 ;
    $id_user = $this->session->userdata('UserID');

    $data = array(
      'ProcessStartDate' => $process,
      'IsProcessedToHire' => $status
      );

    $data1 = array(
      'ProcessStartDate' => $process,
      'IsProcessedToHire' => $status,
      'ApprovalStatusID' => $apv_id_new,
      'EmployeeID' => $this->session->userdata('ID2'),
      'RequisitionID' => $ID,
      'OrganizationID' => $this->session->userdata('OrganizationID'),
      'PositionID' => $this->session->userdata('PositionID'),
      'CreatedByID' => $id_user,
      'LastModifiedByID' => $id_user
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
    $id_user = $this->session->userdata('UserID');

    $data = array(
      'HoldEndDate' => $hold,
      'IsHold' => $status
      );

    $data1 = array(
      'HoldEndDate' => $hold,
      'IsHold' => $status,
      'ApprovalStatusID' => $apv_id_new,
      'EmployeeID' => $this->session->userdata('ID2'),
      'RequisitionID' => $ID,
      'OrganizationID' => $this->session->userdata('OrganizationID'),
      'PositionID' => $this->session->userdata('PositionID'),
      'CreatedByID' => $id_user,
      'LastModifiedByID' => $id_user
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
    $id_user = $this->session->userdata('UserID');

    $data = array(
      'RejectReason' => $reject,
      'IsRejected' => $status
      );

    $data1 = array(
      'RejectReason' => $reject,
      'IsRejected' => $status,
      'ApprovalStatusID' => $apv_id_new,
      'EmployeeID' => $this->session->userdata('ID2'),
      'RequisitionID' => $ID,
      'OrganizationID' => $this->session->userdata('OrganizationID'),
      'PositionID' => $this->session->userdata('PositionID'),
      'CreatedByID' => $id_user,
      'LastModifiedByID' => $id_user
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
    $this->check();
    $requestor_id = $this->session->userdata('new_id');
    $data['myreq'] = $this->Hire_model->get_your_request($requestor_id);
    $data['row']= $this->Hire_model->get_hire_id($requestor_id);
    $data["header"] = $this->load->view('header/v_header','',TRUE);
    $data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
    $this->load->view('hr/v_hire_status',$data);
  }

  // function search_member(){
	// 	$dept_id = $this->input->get('dept_id');
	// 	$data = $this->Hire_model->get_member_organization($dept_id);
	// 	echo json_encode($data);
  // }

  function search_member(){
		$ID = $this->input->get('ID');
		$data = $this->Hire_model->search_member($ID);
		echo json_encode($data);
  }

  function member(){
		$json = [];
		$this->load->database();
		if(!empty($this->input->get("q"))){
				$compClue = $this->input->get("q");
				$data = $this->Hire_model->get_search_member($compClue, 'Name');
			}
			echo json_encode($data);
	}

  function need_approval(){
    $requestor_id = $this->session->userdata('ID2');
    $pos = $this->session->userdata('Position');
    $val = strpos($pos,'Transito Adimanjati Director');
    //var_dump($val);
    if (strpos($pos,'Transito Adimanjati Director') === false) {
      $data['need_app'] = $this->Hire_model->need_approval_req($requestor_id);
    }
    if(strpos($pos,'Transito Adimanjati Director') === 0){
      $data['need_app']=$this->Hire_model->need_approval_hr();
    }
    $data["header"] = $this->load->view('header/v_header','',TRUE);
    $data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
    $this->load->view('hr/v_need_approval',$data);
    
  }

  public function myview_approve(){
    $this->check();
    $requestor_id = $this->session->userdata('ID2');
    $data['status'] = $this->Hire_model->my_approve($requestor_id);
    //var_dump($data['status']);
    $data["header"] = $this->load->view('header/v_header','',TRUE);
    $data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
    $this->load->view('hr/v_my_approve_request',$data);
  }

  function myview_hold(){
    $requestor_id = $this->session->userdata('ID2');
    // $data['hold'] = $this->Hire3_model->hold($requestor_id);
    // $data['jml'] = count($data['hold']);
    $data['myhold'] = $this->Hire_model->my_hold($requestor_id);
    // $data['myjml'] = count($data['myhold']);
    $data["header"] = $this->load->view('header/v_header','',TRUE);
    $data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
    $this->load->view('hr/v_my_hold_request',$data);
  }

  function myview_reject(){
    $requestor_id = $this->session->userdata('PersonnelIDList');
    // $data['hold'] = $this->Hire3_model->hold($requestor_id);
    // $data['jml'] = count($data['hold']);
    $data['myreject'] = $this->Hire_model->my_reject($requestor_id);
    // $data['myhold'] = $this->Hire3_model->my_hold($requestor_id);
    // $data['myjml'] = count($data['myhold']);
    $data["header"] = $this->load->view('header/v_header','',TRUE);
    $data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
    $this->load->view('hr/v_my_reject_request',$data);
  }

  function approved_req(){
    $requestor_id = $this->session->userdata('ID2');
    $data['status'] = $this->Hire_model->get_apv_req($requestor_id);
    //var_dump($data['need_app']);
    $data["header"] = $this->load->view('header/v_header','',TRUE);
    $data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
    $this->load->view('hr/v_approved_req',$data);
  }

  function hold_req(){
    $requestor_id = $this->session->userdata('ID2');
    $data['status'] = $this->Hire_model->get_hold_req($requestor_id);
    //var_dump($data['need_app']);
    $data["header"] = $this->load->view('header/v_header','',TRUE);
    $data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
    $this->load->view('hr/v_hold_req',$data);
  }

  function rejected_req(){
    $requestor_id = $this->session->userdata('ID2');
    $data['status'] = $this->Hire_model->get_rejected_req($requestor_id);
    //var_dump($data['need_app']);
    $data["header"] = $this->load->view('header/v_header','',TRUE);
    $data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
    $this->load->view('hr/v_rejected_req',$data);
  }

  function chart_org(){
    $data["header"] = $this->load->view('header/v_header','',TRUE);
    $data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
    $this->load->view('hr/v_chart',$data);
  }

  function update_cost_center($ID){
    
    $cost_center = $this->input->post('cost_center');

    $data = array('PlacementID'=>$cost_center);

    $res =$this->Hire_model->update_cost_center($data, $ID);
    if ($res > 0) {
       echo json_encode(array('status'=>true));
      }else{
      echo json_encode(array('status'=>false));
      }
  }

}
?>

