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
	
	public function submit_register(){
		$nik = $this->input->post('nik');
	    $name = $this->input->post('name');
	    $pass = $this->input->post('pass');
	    $unit = $this->input->post('unit');
	    $subunit = $this->input->post('subunit');
	    $position = $this->input->post('position');
	    $email = $this->input->post('email');
	    $phone = $this->input->post('phone');
	    $bod = $this->input->post('bod');
	    
		$data = array(
			'nik' => $nik,
			'name' => $name,
			'pass' => $pass,
			'unit' => $unit,
			'subunit' => $subunit,
			'position' => $position,
			'email' => $email,
			'phone' => $phone,
			'bod' => $bod
			// "StartDate" => date("Y-m-d H:i:s", strtotime($tmp_date[0] . ' ' . $tmp_date[1])),
			// "EndDate" => date("Y-m-d H:i:s", strtotime($tmp_date[3] . ' ' . $tmp_date[4])),
			// "Location" => $this->input->post("location"),
			// "Description" => $this->input->post("description"),
			// "NeedStory" => $this->input->post("story") == 1 ? "true" : "false",
			// "NeedPhoto" => $this->input->post("photo") == 1 ? "true" : "false",
			// "NeedAudio" => $this->input->post("audio") == 1 ? "true" : "false",
			// "NeedVideo" => $this->input->post("video") == 1 ? "true" : "false",
			// "Name" => $this->input->post("name"),
			// "Comment" => $this->input->post("comment")

		);
		$data_string = json_encode($data);
		
				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_URL => "http://kics.kompas.com/api/register",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 30,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "POST",
					CURLOPT_POSTFIELDS => $data_string, //data dijadikan json dulu yang tadinya berupa array
					CURLOPT_HEADER => true,
					CURLOPT_HTTPHEADER => array(
						
						"content-type: application/json",
						"Accept: application/json"
					),
				));

				$response = curl_exec($curl);
				
				$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
				$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
				$body = substr($response, $header_size);
				$err = curl_error($curl);
				curl_close($curl);

				var_dump($body);

				


	}

}
?>