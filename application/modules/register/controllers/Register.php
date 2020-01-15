<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function get_subunit($id){
        //$id = $_REQUEST['id'];
        $api_url = "http://kics.kompas.com/api/subunit?id=".$id;
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
					"Accept: application/json"
				),
			));

			$response = curl_exec($curl);
			$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
			$body = substr($response, $header_size);
			$err = curl_error($curl);
			curl_close($curl);

			
		
			
            //$body = json_decode($body, true);
            echo $body;
        
            
    }

}
?>