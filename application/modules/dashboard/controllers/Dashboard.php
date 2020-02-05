<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
	public function __construct() {
        parent::__construct();
		$this->load->library('Aauth');
		$this->load->database('db2');
		$this->load->model('Dashboard_model');

    }
	
	function index()
	{
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$this->load->view('v_dashboard_staf',$data);
	}

	function profile(){
		$nik = $this->session->userdata('nik');
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$data['person'] = $this->Dashboard_model->profile($nik);
		$this->load->view('v_dashboard_profile', $data);
	}

	function do_update(){
		$name = $this->input->post('name');
		$ID = $this->session->userdata('nik');
		$name2 = $this->session->set_userdata('name', $name);
		$data = array(
			'name' => $name2
		);
	
		$data = $this->Dashboard_model->update_data($data, $ID);

		redirect('dashboard/profile','refresh');
		
	}

	public function change_password(){
		$data["header"] = $this->load->view('header/v_header','',TRUE);
		$data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
		$this->load->view('v_dashboard_change_password',$data);
	}

	//CHANGE PASSWORD LDAP ACTIVE DIRECTORY
    public function create_ldap_connection()
    {
        $ip = "kompas.com//";  $ldaps_url = "LDAP://10.11.1.3//$ip"; 
        $port = 636;   $ldap_conn = ldap_connect( $ldaps_url, $port ) or die("Sorry! Could not connect to LDAP server ($ip)");
        ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);  

        $password = $this->session->userdata('password');
        $binddn = "CN=Administrator,CN=Users,DC=kompas,DC=com";
        $result = ldap_bind( $ldap_conn, $binddn, $password ) or die("  Error: Couldn't bind to server using provided credentials!");
        if($result) {
        return $ldap_conn; 
                } 
            else
                {
        die (" Error: Couldn't bind to server with supplied credentials!");
            }
    }  

    public function get_user_dn( $ldap_conn, $user_name ) {  /* Write the below details as per your AD setting */  $basedn = "DC=kompas,DC=com";  /* Search the user details in AD server */  
        $searchResults = ldap_search( $ldap_conn, $basedn, $user_name );  
        if ( !is_resource( $searchResults ) )  die('Error in search results.');
        /* Get the first entry from the searched result */  
        $entry = ldap_first_entry( $ldap_conn, $searchResults ); 
        return ldap_get_dn( $ldap_conn, $entry ); 
    }

    public function pwd_encryption() {
        // $newPassword = "\"" . $newPassword . "\"";
        // $len = strlen( $newPassword ); 
        // $newPassw = "";
        // for ( $i = 0; $i < $len; $i++ )
        // {
        //     $newPassw .= "{$newPassword {$i}}\000";
        // } 
		//$userdata["unicodePwd"] = $newPassw;  return $userdata; 
		$ldap_conn = $this->create_ldap_connection(); 
        $user_name = "(sAMAccountName=" . $ldap_conn['username'] . ")"; //Dont remove parentheses brackets 
        $user_password = $this->input->post('newPassword');   
        
        $userDn = $this->get_user_dn($ldap_conn, $user_name);
        $userdata = $this->pwd_encryption ($user_password);  
		$result = ldap_mod_replace($ldap_conn, $userDn);
		var_dump($result);  /* Check whether the password updated successfully or not. */ 
		if ( $result )  die("Password changed successfully!"); 
		else  die("Error: Please try again later!");
		
    }

}