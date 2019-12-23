<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    function index(){
        $data["header"] = $this->load->view('header/v_header','',TRUE);
        $data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
        $this->load->view('hr/v_chart',$data); 
    }

}