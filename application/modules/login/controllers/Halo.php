<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halo extends CI_Controller {
	
    public function __construct() {
        parent::__construct();
        $this->load->library('Aauth');

    }
	
	function index()
	{
		echo "Halo ".CI_VERSION;
	}
	
	function adduser()
	{
		$this->aauth->create_user('finance@example.com', 'finpass', 'Finance');
		$this->aauth->create_user('tekno@example.com', 'tekpass', 'Tekno');
	}
	
	function addgroup()
	{
		$this->aauth->create_group('sales');
		$this->aauth->create_group('finance');
		$this->aauth->create_group('tekno');
	}
	
	function hobit()
	{
		if($this->aauth->is_group_allowed(4,'immortality')){
			echo "Hobbits are immortal";
		} else {
			echo "Hobbits are NOT immortal";
		}	
	}
	
	function gandalf()
	{
		if($this->aauth->is_allowed(12,'immortality')){
			echo "Gandalf is immortal";
		} else {
			echo "Gandalf is NOT immortal";
		}		
	}
}
