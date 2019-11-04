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
	
}
