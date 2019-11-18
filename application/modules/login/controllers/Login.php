<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
	public function __construct() {
        parent::__construct();
        $this->load->library("Aauth");
		$this->load->database('db2');
    }
	
	function index()
	{
		$this->load->view('v_login');
	}
	
	function do()
	{
		$uid = $this->input->post('uid');
		$pwd = $this->input->post('pwd');
		//var_dump($this->aauth->login($uid, $pwd));
		
		if($this->aauth->login($uid, $pwd)){
			redirect('dashboard');
		}else{
			$this->session->set_flashdata('message', '<p style="color:red">Email atau Password Anda Salah!</p>');
			redirect('login','refresh');
		}
				
	}
	
	function logout()
	{
		$this->aauth->logout();
		redirect('login','refresh');
	}
}
