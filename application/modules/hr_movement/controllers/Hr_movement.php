<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hr_movement extends CI_Controller {
    
	public function __construct() {
        parent::__construct();
        $this->load->library('Aauth');
		$this->load->database('db1');
		$this->load->model('Movement_model');

	}
	
	public function index()
	{
	//	$RequestNumber = $this->Movement_model->get_sp_request_number($RequestNumber);


		$dat = $this->check();
		if ($dat == '') {
			$data["header"] = $this->load->view('header/v_header','',TRUE);
			$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
			$this->load->view('hr_movement/v_error_movement', $data);
		}else{
			//var_dump($dat);
			$data['person'] = $this->Movement_model->get_related_per($dat);
			//var_dump($data['person']);
			//var_dump($data['person']);
			$ID = $this->session->userdata('ID2');
			$req_dep = $this->session->userdata('OrganizationID');
			$prn_org = $this->session->userdata('ParentOrganizationID');
			$data['type'] = $this->Movement_model->choose_move_type($ID);
			$data['pos'] = $this->Movement_model->choose_move_position($ID);
			$data['result'] = $this->Movement_model->get_new_req($ID, $req_dep);
			//$data['hra'] = $this->Movement_model->get_human_resources($prn_org);
			 
			$data['hra'] = $this->Movement_model->get_hra($dat);
			$data['hra2'] = $this->Movement_model->get_hra2($dat);
			$data['hra3'] = $this->Movement_model->get_hra3($dat);
			$data['tot'] = count($data['result']);  
			$data['org'] = $this->Movement_model->choose_org();  
			$data["header"] = $this->load->view('header/v_header','',TRUE);
			$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
			//$data["auto"] = $this->Movement_model->auto_regist_position($last_id, $position);
			$this->load->view('hr_movement/v_form_movement',$data);
		}

		$nik = $this->session->userdata('nik');

		$check = $this->Movement_model->check_personnel($nik);
		$sess = $this->Movement_model->make_session($nik);

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


		//$Request = $this->Movement_model->get_sp_request_number($RequestNumber);

	}
	
	  public function check(){
	    $nik = $this->session->userdata('nik');
	    

	    $check = $this->Movement_model->check_personnel($nik);
	    $sess = $this->Movement_model->make_session($nik);
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
	      $check2 = $this->Movement_model->auto_register($nik);
	      //var_dump($check2);
	      $dt = $check2['ID'];
	      //var_dump($dt);
	    
	      $last_id = $object->ID;
	      $position = $object->Postion;
	      //var_dump($position);
	      $data2 = array('UserID' => $dt);
	      $this->session->set_userdata($data2);
	      $check3 = $this->Movement_model->auto_register2($dt, $per_id);
	      $check4 = $this->Movement_model->auto_regist_position($last_id, $position);
	      return $dt;
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
		$this->check();
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

	function search_new_position(){
		$Position = $this->input->get('Position');
		$data = $this->Movement_model->search_new_position($Position);
		echo json_encode($data);
	  }

	function search_new_organization(){
	$Position = $this->input->get('Organization');
	$data = $this->Movement_model->search_new_organization($Organization);
	echo json_encode($data);
	}

	  function new_position(){
		$json = [];
		$this->load->database();
		if(!empty($this->input->get("q"))){
				$compClue = $this->input->get("q");
				$data = $this->Movement_model->get_search_new_position($compClue, 'Name');
			}
			echo json_encode($data);
	  }

	  function new_organization(){
		$json = [];
		$this->load->database();
		if(!empty($this->input->get("q"))){
				$compClue = $this->input->get("q");
				$data = $this->Movement_model->get_search_new_organization($compClue, 'Name');
			}
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

	  public function search_info(){
		$ID = $this->input->post('ID');
		$data = $this->Movement_model->search_info($ID);
		echo json_encode($data);
	  }

	  public function search_member(){
		$ID = $this->input->post('ID');
		$data = $this->Movement_model->search_member($ID);
		echo json_encode($data);
	  }

	  public function search_hra(){
		$ID = $this->input->post('ID');
		$data = $this->Movement_model->search_hra($ID);
		echo json_encode($data);
	  }
	  

	  public function submit_movement(){
		  
	//	$Request = $this->Movement_model->get_sp_request_number($RequestNumber);
		$RequestNumber = $this->input->post('Re');
		$requestor_id = $this->input->post('requestor_id');
		$req_position_id = $this->input->post('req_position_id');
		$org_id = $this->input->post('org_id');
		$req_org_id = $this->input->post('req_org_id');
		$request_type = $this->input->post('request_type');
		$request_name = $this->input->post('request_name');
	//	$current_position = $this->input->post('current_position');
		$current_position_id = $this->input->post('current_position_id');
		$current_org_id = $this->input->post('current_org_id');
		$current_cpy_id = $this->input->post('current_cpy_id');
		$current_cc_id = $this->input->post('current_cc_id');
		$new_position = $this->input->post('new_position');
		$new_pos_id = $this->input->post('new_pos_id');
		$new_org_id = $this->input->post('new_org_id');
		$new_cpy_id = $this->input->post('new_cpy_id');
		$new_cc_id = $this->input->post('new_cc_id');
		$workdate = $this->input->post('workdate');
		$current_responsibilities = $this->input->post('current_responsibilities');
		$new_responsibilities = $this->input->post('new_responsibilities');
		$id = $this->session->userdata('UserID');
		$note = $this->input->post('note');
	//	var_dump($id);
	//	$new_requirement = $this->input->post('new_requirement');
	
	
		$data = array(

		//  'RequestNumber' => $Request,
		  'RequestorID' => $requestor_id,
		  'RequestorPositionID' => $req_position_id,
		  'RequestorDepartmentID' => $org_id,
		  'MovementRequestTypeID' => $request_type,
		  'RequestedPersonnelID' => $request_name,
		  'CurrentPositionID' => $current_position_id,
		  'CurrentOrganizationID' => $current_org_id,
		  'CurrentCompanyID' => $current_cpy_id,
		  'CurrentCostCenterID' => $current_cc_id,
		  'NewPositionID' => $new_pos_id,
		  'NewOrganizationID' => $new_org_id,
		  'NewCompanyID' => $new_cpy_id,
		  'NewCostCenterID' => $new_cc_id,
		  'ExpectedWorkStartDate' => $workdate,
		  'CurrentDuttiesAndResponsibilities' => $current_responsibilities,
		  'NewDuttiesAndResponsibilities' => $new_responsibilities,
		  'CreatedById' => $id,
		  'LastModifiedById' => $id
		//  'RequirementDescription' => $new_requirement,
		  );

		  $this->load->model('Movement_model');
			$last_id = $this->Movement_model->Insert_data($data);
		//	print_r($last_id);
			 $get_last_id = $this->Movement_model->get_data_rn($last_id);
			
		//	$id = $this->session->userdata('UserID');
			if ($last_id > 0) {

				$data1 = array(
				'EmployeeID' => $requestor_id,
				'PositionID' => $req_position_id,
				'OrganizationID' => $org_id,
				'MovementRequestID' => $last_id,
				'CreatedById' => $id,
				'LastModifiedById' => $id 
			);

			$data2 = array (
				'MovementRequestID' => $last_id,
				'PersonnelID' => $requestor_id,
				'Description' => $note,
				'CreatedByID' => $id,
				'LastModifiedByID' => $id);
			
				$res = $this->Movement_model->Insert_to_Approval($data1);
				$res2 = $this->Movement_model->Insert_note($data2);

			//	$Request = $this->Movement_model->get_sp_request_number($get_last_id);
			//	var_dump($data1);
			//print_r($data1);
					if ($res > 0 ) {
					echo json_encode(array('status'=>true));
					
					// Load PHPMailer library
					$this->load->library('phpmailer_lib');

					// PHPMailer object
					$mail = $this->phpmailer_lib->load();
		  
					// SMTP configuration
					$mail->isSMTP();
					$mail->Host ='smtp.gmail.com';
					$mail->SMTPAuth = true;
					$mail->Username = 'project.test.hris@gmail.com';
					$mail->Password = 'abcd1234@AB';
					$mail->SMTPSecure = 'tls';
					$mail->Port = 587;
		  
					$mail->setFrom('info@codexworld.com', 'Codexworld');
					$mail->addReplyTo('info@example.com', 'Codexworld');
		  
					// Add a recipient
					$mail->addAddress('project.test.hris@gmail.com');
		  
					// Email Subject
					$requestor = $this->session->userdata('PersonnelName');
					$mail->Subject = 'Request Promotion by '.$requestor;
					// $mail->Subject .= $requestor;
		  
					// Set email format to HTML
					$mail->isHTML(true);
		  
					// Email body content
					//  $mailContent = "<h1> Request Promotion by </h1>";
					//  $requestor = $this->session->userdata('PersonnelName');
					//  $mail->Body = $mailContent;
					//  $mail->Body .= $requestor;
		  
				   // $image = $this->load->image('/assets/images/logos/logo-kg.jpg');
		  
					$mailContent ='';
					$mailContent .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
									"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
					$mailContent .= '<html xmlns="http://www.w3.org/1999/xhtml';
					$mailContent .= '<head>';
						  $mailContent .= '<meta http-equiv="Content-Type" content="text/html; charset-utf-8" />';
						  $mailContent .= '<title> Request Promotion by </title>';
						  $mailContent .= '<style type="text/css">';
						  $mailContent .= 'body {margin: 0; padding: 0; min-width: 100%!important;}';
						  $mailContent .= '.content {width: 100%; max-width: 600px;}';
						  $mailContent .= '.btn {
												box-sizing: border-box;
												-webkit-appearance: none;
												  -moz-appearance: none;
														appearance: none;
												background-color: transparent;
												border: 2px solid #e74c3c;
												border-radius: 0.6em;
												color: #e74c3c;
												cursor: pointer;
												display: flex;
												align-self: center;
												font-size: 1rem;
												font-weight: 400;
												line-height: 1;
												margin: 20px;
												padding: 1.2em 2.8em;
												text-decoration: none;
												text-align: center;
												text-transform: uppercase;
												font-family: "Montserrat", sans-serif;
												font-weight: 700;
											  }';
							  $mailContent .= '.btn:hover, .btn:focus {
											  color: #fff;
											  outline: 0;
											}';
							  $mailContent .='.third {
												border-color: #3498db;
												color: #fff;
												box-shadow: 0 0 40px 40px #3498db inset, 0 0 0 0 #3498db;
												transition: all 150ms ease-in-out;
											  }';
							  $mailContent .='.third:hover {
												box-shadow: 0 0 10px 0 #3498db inset, 0 0 10px 4px #3498db;
											  }';
						  $mailContent .='</style>';
		  
						$mailContent .= '</head>';
						$mailContent .= '<body yahoo bgcolor="ADD8E6">';
						  $mailContent .= '<table width="100%" bgcolor="#ADD8E6" border="0" cellpadding="0" cellspacing="0">';
							  $mailContent .= '<tr>';
								$mailContent .='<td>';
								  $mailContent .= '<table class="content" align="center" cellpadding="0" cellspacing="0" border="0">';
									$mailContent .='<tr>';
									  $mailContent .='<td>';
										  $mailContent .='<table width="600" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" margin-top:"100px">';
											  $mailContent .='<tr>';
												  $mailContent .='<td>';
													  $mailContent .='<table class="content" align="center" cellpadding="10" cellspacing="10" border="0">';
														  $mailContent .='<tr>';
															  $mailContent .='<td bgcolor="4285f4">';
																 // $mailContent .='<font color="#ffffff" face="Arial" size="4"> Send Email For GM </font>';
																 
																  $mailContent .='<img src="/assets/images/logos/logo-light-icon.png" />';
																  $mailContent .='<img src="/assets/images/logos/logo-light-text.png" />';
															  $mailContent .='</td>';
														  $mailContent .='</tr>';
		  
														  $mailContent .='<tr>';
															  $mailContent .='<td>';
																  $mailContent .='<font color="#000000" face="Arial" size="2.5"> 
																  Requestor Name
																  </font>'; 
															  $mailContent .='</td>';
															  $mailContent .='<td>';
																  $mailContent .=' : ';
															  $mailContent .='</td>';
															  $mailContent .='<td>';
																  $mailContent .= $this->session->userdata('PersonnelName');
															  $mailContent .='</td>';
														  $mailContent .='</tr>';
														  
		  
		  
														  $mailContent .='<tr>';
															  $mailContent .='<td>';
																  $mailContent .='<font color="#000000" face="Arial" size="2.5"> 
																  Organization Name
																  </font>'; 
															  $mailContent .='</td>';
															  $mailContent .='<td>';
																  $mailContent .=' : ';
															  $mailContent .='</td>';
															  $mailContent .='<td>';
																  $mailContent .= $this->session->userdata('OrganizationName');
															  $mailContent .='</td>';
														  $mailContent .='</tr>';
		  
		  
														  $mailContent .='<tr>';
															  $mailContent .='<td>';
																  $mailContent .='<font color="#000000" face="Arial" size="2.5"> 
																  Position Name
																  </font>'; 
															  $mailContent .='</td>';
															  $mailContent .='<td>';
																  $mailContent .=' : ';
															  $mailContent .='</td>';
															  $mailContent .='<td>';
																  $mailContent .= $this->session->userdata('PositionName');
															  $mailContent .='</td>';
														  $mailContent .='</tr>';
		  
														  $mailContent .='<br>';
														  $mailContent .='<hr/>';
		  
														  $mailContent .='<tr>';
															  $mailContent .='<td>';
																  $mailContent .='<font color="#4285f4" face="Arial" size="2"> Request Promotion </font>';
															  $mailContent .='</td>';
														  $mailContent .='</tr>';
		  
														  $mailContent .='<tr>';
															  $mailContent .='<td>';
																  $mailContent .='<font color="#000000" face="Arial" size="2.5"> 
																  Movement Request Type :
																  </font>'; 
																  // $mailContent .= $this->input->post('request_type');
															  $mailContent .='</td>';
														  $mailContent .='</tr>';
		  
														  $mailContent .='<tr>';
															  $mailContent .='<td>';
																  $mailContent .='<font color="#000000" face="Arial" size="2.5"> 
																  Request Name :
																  </font>'; 
																  // $mailContent .= $this->input->post('request_type');
															  $mailContent .='</td>';
														  $mailContent .='</tr>';
		  
														  $mailContent .='<tr>';
															  $mailContent .='<td>';
																  $mailContent .='<font color="#000000" face="Arial" size="2.5"> 
																  Current Position :
																  </font>'; 
																   $mailContent .= $this->input->post('current_position');
															  $mailContent .='</td>';
		  
														  $mailContent .='<td>';
															  $mailContent .='<font color="#000000" face="Arial" size="2.5"> 
																  New Position :
																  </font>'; 
																  $mailContent .= $this->input->post('new_position');
															  $mailContent .='</td>';
													  $mailContent .='</tr>';
		  
													  $mailContent .='<tr>';
															  $mailContent .='<td>';
																  $mailContent .='<font color="#000000" face="Arial" size="2.5"> 
																  Expected Work Date for New Position :
																  </font>'; 
																  $mailContent .= $this->input->post('workdate');
															  $mailContent .='</td>';
													  $mailContent .='</tr>';
		  
													  $mailContent .='<tr>';
															  $mailContent .='<td>';
																  $mailContent .='<font color="#000000" face="Arial" size="2.5"> 
																  Current Responsibilities :
																  </font>'; 
																  $mailContent .= $this->input->post('current_responsibilities');
															  $mailContent .='</td>';
		  
															  $mailContent .='<td>';
																  $mailContent .='<font color="#000000" face="Arial" size="2.5"> 
																  New Responsibilities :
																  </font>'; 
																  $mailContent .= $this->input->post('new_responsibilities');
															  $mailContent .='</td>';
													  $mailContent .='</tr>';
		  
		  
														  $mailContent .='<tr>';
															  $mailContent .='<td bgcolor="4285f4">';
																  $mailContent .='<font color="#000000" face="Arial" size="2"> test </font>';
															  $mailContent .='</td>';
														  $mailContent .='</tr>';
													  $mailContent .='</table>';
												  $mailContent .='</td>';
											  $mailContent .='</tr>';
										  $mailContent .='</table>';
									  $mailContent .='</td>';
									$mailContent .='</tr>';
								  $mailContent .='</table>';
								$mailContent .='</td>';
							  $mailContent .='</tr>';
							$mailContent .='</table>';
		  
							$mailContent .='<button class="btn-third"> Process </button>';
						$mailContent .='</body>';
					$mailContent .='</html>';
					
					//var_dump($mailContent);
		  
					$mail->Body = $mailContent;
		  
					// Send email
					if(!$mail->send()){
						  echo 'Message could not be sent';
						  echo 'Mailer Error: ' . $mail->ErrorInfo;
					}

					}else{
						echo json_encode(array('status'=>false));
					}

				}
	}

	function save_data(){
	    $requestor_id = $this->input->post('requestor_id');
		$req_position_id = $this->input->post('req_position_id');
		$org_id = $this->input->post('org_id');
		$req_org_id = $this->input->post('req_org_id');
		$request_type = $this->input->post('request_type');
		$request_name = $this->input->post('request_name');
		$current_position_id = $this->input->post('current_position_id');
		$current_org_id = $this->input->post('current_org_id');
		$current_cpy_id = $this->input->post('current_cpy_id');
		$current_cc_id = $this->input->post('current_cc_id');
		$new_position = $this->input->post('new_position');
		$new_pos_id = $this->input->post('new_pos_id');
		$new_org_id = $this->input->post('new_org_id');
		$new_cpy_id = $this->input->post('new_cpy_id');
		$new_cc_id = $this->input->post('new_cc_id');
		$workdate = $this->input->post('workdate');
		$current_responsibilities = $this->input->post('current_responsibilities');
		$new_responsibilities = $this->input->post('new_responsibilities');
		$note = $this->input->post('note');
		$IsProcessed = '2';
		$id = $this->session->userdata('UserID');

	    $data = array(
			'RequestorID' => $requestor_id,
			'RequestorPositionID' => $req_position_id,
			'RequestorDepartmentID' => $org_id,
			'MovementRequestTypeID' => $request_type,
			'RequestedPersonnelID' => $request_name,
			'CurrentPositionID' => $current_position_id,
			'CurrentOrganizationID' => $current_org_id,
			'CurrentCompanyID' => $current_cpy_id,
			'CurrentCostCenterID' => $current_cc_id,
			'NewPositionID' => $new_pos_id,
			'NewOrganizationID' => $new_org_id,
			'NewCompanyID' => $new_cpy_id,
			'NewCostCenterID' => $new_cc_id,
			'ExpectedWorkStartDate' => $workdate,
			'CurrentDuttiesAndResponsibilities' => $current_responsibilities,
			'NewDuttiesAndResponsibilities' => $new_responsibilities,
			'IsProcessed' => $IsProcessed,
			'CreatedById' => $id,
			'LastModifiedById' => $id
	      );

		//print_r($data);
		$this->load->model('Movement_model');
		$last_id = $this->Movement_model->Save_data($data);
		$data1 = array (
			'RequisitionID' => $last_id,
			'PersonnelID' => $requestor_id,
			'Description' => $note,
			'CreatedByID' => $id,
			'LastModifiedByID' => $id);
  
  
		$res2 = $this->Movement_model->Insert_note($data1);

	    
	 //   $res = $this->Movement_model->Save_data($data);
		if ($last_id > 0 && $res2 > 0) {
	        $this->movement_history();
	      }else{
	      echo json_encode(array('status'=>false));
	      }
  }

  function do_update(){
    $ID = $this->input->post('id_req');
    $requestor_id = $this->input->post('requestor_id');
	$req_position_id = $this->input->post('req_position_id');
	$org_id = $this->input->post('org_id');
	$req_org_id = $this->input->post('req_org_id');
	$request_type = $this->input->post('request_type');
	$request_name = $this->input->post('request_name');
	$current_position_id = $this->input->post('current_position_id');
	$current_org_id = $this->input->post('current_org_id');
	$current_cpy_id = $this->input->post('current_cpy_id');
	$current_cc_id = $this->input->post('current_cc_id');
	$new_position = $this->input->post('new_position');
	$new_pos_id = $this->input->post('new_pos_id');
	$new_org_id = $this->input->post('new_org_id');
	$new_cpy_id = $this->input->post('new_cpy_id');
	$new_cc_id = $this->input->post('new_cc_id');
	$workdate = $this->input->post('workdate');
	$current_responsibilities = $this->input->post('current_responsibilities');
	$new_responsibilities = $this->input->post('new_responsibilities');
	$IsProcessed = '0';
    $id_user = $this->session->userdata('UserID');

    $data = array(
		'RequestorID' => $requestor_id,
		'RequestorPositionID' => $req_position_id,
		'RequestorDepartmentID' => $org_id,
		'MovementRequestTypeID' => $request_type,
		'RequestedPersonnelID' => $request_name,
		'CurrentPositionID' => $current_position_id,
		'CurrentOrganizationID' => $current_org_id,
		'CurrentCompanyID' => $current_cpy_id,
		'CurrentCostCenterID' => $current_cc_id,
		'NewPositionID' => $new_pos_id,
		'NewOrganizationID' => $new_org_id,
		'NewCompanyID' => $new_cpy_id,
		'NewCostCenterID' => $new_cc_id,
		'ExpectedWorkStartDate' => $workdate,
		'CurrentDuttiesAndResponsibilities' => $current_responsibilities,
		'NewDuttiesAndResponsibilities' => $new_responsibilities,
		'IsProcessed' => $IsProcessed,
		'CreatedById' => $id_user,
		'LastModifiedById' => $id_user
      );

    $data1 = array(
        'MovementRequestID' => $ID,
        'EmployeeID' => $requestor_id,
		'PositionID' => $req_position_id,
        'OrganizationID' => $org_id,
        'CreatedByID' => $id_user,
        'LastModifiedByID' => $id_user);

    //print_r($data1);
    //echo $data['IsProcessedToHire'];
    $res =$this->Movement_model->Update_data($data, $ID);
    $res2 = $this->Movement_model->Insert_to_Approval($data1);
    if ($res > 0 && $res2 > 0 ) {
       echo json_encode(array('status'=>true));
      }else{
      echo json_encode(array('status'=>false));
      }
  }


  function save_data2(){
    $ID = $this->input->post('id_req');
    $requestor_id = $this->input->post('requestor_id');
	$req_position_id = $this->input->post('req_position_id');
	$org_id = $this->input->post('org_id');
	$req_org_id = $this->input->post('req_org_id');
	$request_type = $this->input->post('request_type');
	$request_name = $this->input->post('request_name');
	$current_position_id = $this->input->post('current_position_id');
	$current_org_id = $this->input->post('current_org_id');
	$new_position = $this->input->post('new_position');
	$new_org_id = $this->input->post('new_org_id');
	$workdate = $this->input->post('workdate');
	$current_responsibilities = $this->input->post('current_responsibilities');
	$new_responsibilities = $this->input->post('new_responsibilities');
	$IsProcessed = '2';

    

    $data = array(
		'RequestorID' => $requestor_id,
		'RequestorPositionID' => $req_position_id,
		'RequestorDepartmentID' => $org_id,
		'MovementRequestTypeID' => $request_type,
		'RequestedPersonnelID' => $request_name,
		'CurrentPositionID' => $current_position_id,
		'CurrentOrganizationID' => $current_org_id,
		'NewPositionID' => $new_position,
		'NewOrganizationID' => $new_org_id,
		'ExpectedWorkStartDate' => $workdate,
		'CurrentDuttiesAndResponsibilities' => $current_responsibilities,
		'NewDuttiesAndResponsibilities' => $new_responsibilities,
		'IsProcessed' => $IsProcessed,
      );
    $res = $this->Movement_model->update_saved_data($data, $ID);
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
    $where1 = array('MovementRequestID' => $ID);
    $status = '1';
    $apv_id_new = $apv_id + 1 ;
    $id_user = $this->session->userdata('UserID');

    $data = array(
      'ProcessStartDate' => $process,
      'IsProcessed' => $status
      );

    $data1 = array(
      'ProcessStartDate' => $process,
      'IsProcessed' => $status,
      'ApprovalStatusID' => $apv_id_new,
      'EmployeeID' => $this->session->userdata('ID2'),
      'MovementRequestID' => $ID,
      'OrganizationID' => $this->session->userdata('OrganizationID'),
      'PositionID' => $this->session->userdata('PositionID'),
      'CreatedByID' => $id_user,
      'LastModifiedByID' => $id_user
    );
    //var_dump($data1);
    $res = $this->Movement_model->process_data($data, $where);
    $res1 = $this->Movement_model->process_data_approval($data1);
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
    $where1 = array('MovementRequestID' => $ID);
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
      'MovementRequestID' => $ID,
      'OrganizationID' => $this->session->userdata('OrganizationID'),
      'PositionID' => $this->session->userdata('PositionID'),
      'CreatedByID' => $id_user,
      'LastModifiedByID' => $id_user
      );

    $res = $this->Movement_model->hold_data($data, $where);
    $res1 = $this->Movement_model->hold_data_approval($data1);
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
    $where1 = array('MovementRequestID' => $ID);
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
      'MovementRequestID' => $ID,
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



	public function View($ID){
		$data['req'] = $this->Movement_model->get_movement_id($ID);
		$data['info'] = $this->Movement_model->get_apv_info($ID);
	
		$data['latest'] = $this->Movement_model->get_latest_apv($ID);
		$data['max'] = $this->Movement_model->get_max_apv($ID);
		//var_dump($data['latest']);
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		  $data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		  $this->load->view('hr_movement/v_view',$data);
		 }

	function edit($ID){
		$ID2 = $this->session->userdata('UserID');
	   $data['person'] = $this->Movement_model->get_related_per($ID2);
	   // $data['hire'] = $this->Movement_model->get_new_req();
	   // $data['prom'] = $this->Promotion3_model->get_new_promotion();
	   // $data['all'] = count($data['prom']);
	   // $data['tot'] = count($data['hire']);
			$data['row']= $this->Movement_model->get_movement_id($ID);
			//var_dump($data['row']);
				$data["header"] = $this->load->view('header/v_header','',TRUE);
				$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
				$this->load->view('hr_movement/v_edit_movement',$data);
			}

	function need_approval(){
		$requestor_id = $this->session->userdata('ID2');
	//	$ID = $this->session->userdata('ID2');
		$nik = $this->session->userdata('nik');
		$pos = $this->session->userdata('Position');
	//	$data['need_app'] = $this->Movement_model->need_approval_req($requestor_id);
		//var_dump($data['need_app']);

		$val = strpos($pos,'Transito Adimanjati Director');
		//var_dump($val);
		if (strpos($pos,'Transito Adimanjati Director') === false) {
		  $data['need_app'] = $this->Movement_model->need_approval_req($requestor_id);
		}
		if(strpos($pos,'Transito Adimanjati Director') === 0){
		  $data['need_app']=$this->Movement_model->need_approval_hr();
		}
		if ($nik == '026061') {
		  $data['need_app'] = $this->Movement_model->need_approval_recruiter();
		}
		if ($nik == '004905') {
		  $data['need_app'] = $this->Movement_model->need_approval_cc();
		}
		if ($nik == '003470') {
			$data['need_app'] = $this->Movement_model->need_approval_hra2($requestor_id);
		}
		if ($nik == '026794') {
			$data['need_app'] = $this->Movement_model->need_approval_hra3($requestor_id);
		}

		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$this->load->view('hr_movement/v_need_approval',$data);
	  }

	  public function notif(){
		//$parent = $this->session->userdata('ParentPersonnelID');
		$ID = $this->session->userdata('ID2');
		$req_dep = $this->session->userdata('OrganizationID');
		
		  $data['result'] = $this->Movement_model->get_new_req($ID, $req_dep);
		  $data['tot'] = count($data['result']);
		  echo json_encode($data);
	   
	  }

	  public function notifApproval(){
		$ID = $this->session->userdata('ID2');
		$req_dep = $this->session->userdata('OrganizationID');
		$data['result'] = $this->Movement_model->get_new_req_approval($ID, $req_dep);
		$data['tot'] = count($data['result']);
		echo json_encode($data);
	  }

	  public function myview_approve(){
	  	$this->check();
		$requestor_id = $this->session->userdata('ID2');
		$data['status'] = $this->Movement_model->my_approve($requestor_id);
		//var_dump($data['need_app']);
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$this->load->view('hr_movement/v_my_approve_request',$data);
	  }

	  function myview_hold(){
		$requestor_id = $this->session->userdata('ID2');
		// $data['hold'] = $this->Hire3_model->hold($requestor_id);
		// $data['jml'] = count($data['hold']);
		$data['myhold'] = $this->Movement_model->my_hold($requestor_id);
		// $data['myjml'] = count($data['myhold']);
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$this->load->view('hr_movement/v_my_hold_request',$data);
	  }
	
	  function myview_reject(){
		$requestor_id = $this->session->userdata('PersonnelIDList');
		// $data['hold'] = $this->Hire3_model->hold($requestor_id);
		// $data['jml'] = count($data['hold']);
		$data['myreject'] = $this->Movement_model->my_reject($requestor_id);
		// $data['myhold'] = $this->Hire3_model->my_hold($requestor_id);
		// $data['myjml'] = count($data['myhold']);
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$this->load->view('hr_movement/v_my_reject_request',$data);
	  }
	

	  function approved_req(){
		$requestor_id = $this->session->userdata('ID2');
		$data['status'] = $this->Movement_model->get_apv_req($requestor_id);
		//var_dump($data['need_app']);
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$this->load->view('hr_movement/v_approved_req',$data);
	  }

	  function hold_req(){
		$requestor_id = $this->session->userdata('ID2');
		$data['status'] = $this->Movement_model->get_hold_req($requestor_id);
		//var_dump($data['need_app']);
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$this->load->view('hr_movement/v_hold_req',$data);
	  }

	  function rejected_req(){
		$requestor_id = $this->session->userdata('ID2');
		$data['status'] = $this->Movement_model->get_rejected_req($requestor_id);
		//var_dump($data['need_app']);
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$this->load->view('hr_movement/v_rejected_req',$data);
	  }
	
}