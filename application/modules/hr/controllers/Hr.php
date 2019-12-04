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
		$nik = $this->session->userdata('nik');
		$ID = $this->session->userdata('nik');
		// $data['result'] = $this->Hire_model->get_new_req();
		// $data['tot'] = count($data['result']);
		$data['person'] = $this->Hire_model->get_related_per($ID);
		$data['org'] = $this->Hire_model->choose_org();	
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$this->load->view('hr/v_form',$data);
		/** 
		 * declaration store procedure from model
		 * */
		$this->Hire_model->auto_register($nik);
		 

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
	        'EmployeeID' => $requestor,
	        'PositionID' => $req_position_id,
	        'RequisitionID' => $last_id );
	      $res = $this->Hire_model->Insert_to_Approval($data1);

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
	          $mail->Password = 'Q_C4MhfAxcJX7CbkWJsi38Y';
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
	                                                        $mailContent .='<font color="#ffffff" face="Arial" size="4"> Send Email For GM </font>';
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
	                                                        $mailContent .= $this->session->userdata('PersonnelName');
	                                                    $mailContent .='</td>';
	                                                $mailContent .='</tr>';
	                                                
	                                                // $mailContent .='<tr>';
	                                                //     $mailContent .='<td>';
	                                                //         $mailContent .='<font color="#000000" face="Arial" size="2.5"> 
	                                                //         Requestor Name :
	                                                //         </font>'; 
	                                                //         $mailContent .= $this->session->userdata('PersonnelName');
	                                                //     $mailContent .='</td>';
	                                                // $mailContent .='</tr>'; 
	                                                    
	                                                // $mailContent .='<tr>';
	                                                //     $mailContent .='<td>';
	                                                //         $mailContent .='<font color="#000000" face="Arial" size="2.5"> 
	                                                //         Organization Name :
	                                                //         </font>'; 
	                                                //         $mailContent .= $this->session->userdata('OrganizationName');
	                                                //     $mailContent .='</td>';
	                                                // $mailContent .='</tr>'; 


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
	                                                    $mailContent .='<td>';
	                                                        $mailContent .='<font color="#000000" face="Arial" size="2.5"> 
	                                                        New Requirement :
	                                                        </font>'; 
	                                                        $mailContent .= $this->input->post('new_requirement');
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
	              $mailContent .='</body>';
	          $mailContent .='</html>';
	          
	          var_dump($mailContent);

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

	public function hire_history(){
	    $requestor_id = $this->session->userdata('ID');

	    //notif
	    //$data['hire'] = $this->Hire_model->get_new_req();
	    //$data['prom'] = $this->Promotion_model->get_new_promotion();
	    // $data['all'] = count($data['prom']);
	    // $data['tot'] = count($data['hire']);
	    //$data['res'] = $this->Hire_model->get_hire();
	    $data['myreq'] = $this->Hire_model->get_your_request($requestor_id);
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$this->load->view('hr/v_hire_history',$data);
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

}
?>

