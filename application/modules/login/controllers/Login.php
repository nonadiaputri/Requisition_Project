<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
	public function __construct() {
        parent::__construct();
        //$this->load->library("Aauth");
		$this->load->database('db2');
		$this->load->model("Login_model");
    }
	
	function index()
	{
		$this->load->view('v_login');
	}
	
	function do()
	{
		$uid = $this->input->post('uid');		
        $pwd = sha1($this->input->post('pwd') . $this->config->item('encryption_key'));
        $login = $this->Login_model->auth($uid, $pwd);
        //var_dump($login);
		
		if ($login !== null) {
			$data = array(
				'ID'		=> $login->no,
				'nik' 		=> $login->nik,
				'name'		=> $login->name,
				'email'		=> $login->email,
				'created_date' => $login->created_date,
				'nik_atasan' =>$login->nik_atasan,
				'dept_id' =>$login->dept_id,
				'id_position' =>$login->id_position,
				'position' => $login->position,
				'phone' =>$login->phone,
				'password'=>$login->password,
				'is_login'	=> TRUE
			);

            $this->session->set_userdata($data);
            if ($this->session->userdata('new_id') == '') {
            	// $this->load->database('db1');
            	// $new_id = $this->Login_model->get_new_id($uid);
            	// var_dump($new_id);
			}
			
			

			redirect('dashboard');
		}else{
			$this->session->set_flashdata('error', 'Wrong NIK or Password!');
			echo "<script>alert('Wrong NIK or Password!');</script>";
			redirect('login','refresh');
		}
				
	}
	
	function logout()
	{
		//$this->aauth->logout();
		$data = array('nik','is_login');
		$this->session->unset_userdata($data);	
		$this->session->sess_destroy();
		// echo "<script>alert('Successfully Logged Out');</script>";
        	
		redirect('login','refresh');
	}

	function register(){
		$api_url = "http://kics.kompas.com/api/unit";
		$curl = curl_init();
		curl_setopt_array($curl, array(
				CURLOPT_URL => $api_url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HEADER => true,
				CURLOPT_HTTPHEADER => array(
					"Accept: application/json",
					"Header: Access-Control-Allow-Origin"
				),
			));

			$response = curl_exec($curl);
			$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
			$body = substr($response, $header_size);
			$err = curl_error($curl);
			curl_close($curl);
			$body = json_decode($body, true);
			//var_dump($body);
			$data['unit'] = $body;
		$this->load->view('register/v_register', $data);
	}
}
