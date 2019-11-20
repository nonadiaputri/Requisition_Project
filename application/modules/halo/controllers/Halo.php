<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Class Halo.
	 * Fungsi
	 * 1. index, param null return 
	 * 2. ci, param null return Halo CI
	 *
	 */

class Halo extends CI_Controller {
    
	public function __construct() {
        parent::__construct();
        $this->load->library('Aauth');
		//$this->load->database('db2');

    }
	
	function index()
	{
		echo "Halo ".CI_VERSION;
	}
	
	function dashboard()
	{
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$this->load->view('dashboard/v_dashboard',$data);
	}
	
	function form()
	{
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$this->load->view('v_form',$data);
	}
	
	function table()
	{
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$this->load->view('v_table',$data);
	}	
	
	function hobit()
	{
		if($this->aauth->is_group_allowed(4,'immortality')){
			echo "Hobbits are immortal";
		} else {
			echo "Hobbits are NOT immortal";
		}	
	}	
	
	function login()
	{
		$a = $this->aauth->login('andi.hendradi@kompas.com', 'ahapass');
		var_dump($a);
	}
	
	function logout()
	{	
		$this->aauth->logout();
	}
	
	function is_login(){
		$l = $this->aauth->is_loggedin();
		var_dump($l);
	}
	
	function update()
	{
		$a = $this->aauth->update_user('2', '','palmerah28','');
		var_dump($a);
	}
	
	function add_user()
	{
		$a = $this->aauth->create_user('andi.hendradi@kompas.com','ahapass','003328');
		var_dump($a);
		//$this->aauth->create_user('legolas@example.com','legolaspass','Legolas');
	}	
	
	function control($perm_name_or_id){
		$c = $this->aauth->control($perm_name_or_id);
		var_dump($c);
	}	
	
	function get_user(){
		$l = $this->aauth->get_user();
		var_dump($l);
	}

	function get_user_group(){
		$l = $this->aauth->get_user_groups();
		var_dump($l);
	}	
	
	function add_member_to_group($member,$group)
	{
		$l = $this->aauth->add_member($member, $group);
		var_dump($l);
	}
	
	function get_permission($nama_perm){
		//mendapatkan Id dari nama permision
		$l = $this->aauth->get_perm_id($nama_perm);
		var_dump($l);
	}		
	
	function allow_user($uid,$perm_name_or_id){
		//membuat ijin untuk user
		$l = $this->aauth->allow_user($uid,$perm_name_or_id);
		var_dump($l);
	}		
	
	function lost(){
		//mendapatkan Id dari nama permision
		$l = $this->aauth->remind_password('andi.hendradi@kompas.com');
		var_dump($l);
	}	
}