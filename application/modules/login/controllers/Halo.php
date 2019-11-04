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
/*
	public function index()
	{
		$this->load->view('halo');
	}
*/
	function index()
	{
		echo "Halo ".CI_VERSION;
	}
}
