<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
	public function __construct() {
        parent::__construct();
        //$this->load->library("Aauth");
		$this->load->database('db1');
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
		
		if (count($login) == 1) {
			$data = array(
				'nik' 		=> $login->NIK,
				'name'		=> $login->Name,
				'email'		=> $login->Email,
				'is_login'	=> TRUE
			);

            $this->session->set_userdata($data);			
			redirect('Dashboard');
		}else{
			$this->session->set_flashdata('message', '<p style="color:red">Email atau Password Anda Salah!</p>');
			redirect('Login','refresh');
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
}
