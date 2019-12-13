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
		
		if (count($login) == 1) {
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
			
			/**
			 * Leveling Page Access
			 * by Geraldine Agusta
			 */
			 if($data['id_position'] > 8){
				 $data["sidebar"] = $this->load->view('header/v_header','',TRUE);
				 redirect('dashboard', $data);
			 }

			redirect('dashboard');
		}else{
			$this->session->set_flashdata('message', '<p style="color:red">Email atau Password Anda Salah!</p>');
			redirect('login','refresh');
		}
				
	}
	
	function logout()
	{
		//$this->aauth->logout();
		$data = array('nik','name','email','is_login');
		$this->session->unset_userdata($data);	
        $this->session->sess_destroy();
        	
		redirect('login','refresh');
	}

	function notif(){

	}
}
