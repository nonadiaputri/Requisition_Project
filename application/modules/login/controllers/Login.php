<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
	public function __construct() {
        parent::__construct();
        //$this->load->library("Aauth");
		$this->load->database('db2');
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
        //var_dump($login);
		
		if ($login !== null) {
			$data = array(
				'ID'		=> $login->no,
				'nik' 		=> $login->nik,
				'name'		=> $login->name,
				'email'		=> $login->email,
				'created_date' => $login->created_date,
				'nik_atasan' =>$login->nik_atasan,
				'dept_id' =>$login->dept_id,
				'id_position' =>$login->id_position,
				'position' => $login->position,
				'phone' =>$login->phone,
				'password'=>$login->password,
				'is_login'	=> TRUE
			);

            $this->session->set_userdata($data);
            if ($this->session->userdata('new_id') == '') {
            	// $this->load->database('db1');
            	// $new_id = $this->Login_model->get_new_id($uid);
            	// var_dump($new_id);
			}
			
			

			redirect('dashboard');
		}else{
			$this->session->set_flashdata('error', 'Wrong NIK or Password!');
			echo "<script>alert('Wrong NIK or Password!');</script>";
			redirect('login','refresh');
		}
				
	}
	
	function logout()
	{
		//$this->aauth->logout();
		$data = array('nik','is_login');
		$this->session->unset_userdata($data);	
		$this->session->sess_destroy();
		// echo "<script>alert('Successfully Logged Out');</script>";
        	
		redirect('login','refresh');
	}

	function register(){
		$api_url = "http://kics.kompas.com/api/unit";
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
					"Accept: application/json",
					"Header: Access-Control-Allow-Origin"
				),
			));

			$response = curl_exec($curl);
			$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
			$body = substr($response, $header_size);
			$err = curl_error($curl);
			curl_close($curl);
			$body = json_decode($body, true);
			//var_dump($body);
			//API GET POSITION
			$api_url2 = "http://kics.kompas.com/api/position";
			$curl2 = curl_init();
			curl_setopt_array($curl2, array(
				CURLOPT_URL => $api_url2,
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

			$response2 = curl_exec($curl2);
			$httpcode2 = curl_getinfo($curl2, CURLINFO_HTTP_CODE);
			$header_size2 = curl_getinfo($curl2, CURLINFO_HEADER_SIZE);
			$body2 = substr($response2, $header_size2);
			$err2 = curl_error($curl2);
			curl_close($curl2);
			$body2 = json_decode($body2, true);


			$data['unit'] = $body;
			$data['pos'] = $body2;
		$this->load->view('register/v_register', $data);
	}

	// function active_directory(){
	// 	$this->load->view('loginad/v_login_Ad');
	// }

	public function loginad()
    {
        if ($this->session->userdata("is_login") == TRUE) {
            redirect('dashboard', 'refresh');
        } else {
            if ($this->session->flashdata('ref_url')) {
                $redir = $this->session->flashdata('ref_url');
                $this->session->set_flashdata('ref_url', $redir);
            }
            $this->load->view('loginad/v_login_Ad');
        }
    }

    public function user()
    {
        $user = trim($this->input->post("uid"));
        $pass = trim($this->input->post("pwd"));

        if (!empty($user) && !empty($pass)) {
            if (!empty($this->input->post('remember'))) {
                $client_id = 'INRWeb';
            } else {
                $client_id = '';
            }

            $curl = curl_init();
            

            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://appdev.kmn.kompas.com/authAPI/token",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_HEADER => true,
                CURLOPT_POSTFIELDS => "grant_type=password&username=" . $user . "&password=" . $pass . "&client_id=" . $client_id . "&client_secret=!nrWww",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/x-www-form-urlencoded"
                ),
            ));

            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
            $body = substr($response, $header_size);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                redirect("login_ad/error/" . $err);
            } else {
                $data = json_decode($body, true);
                var_dump($data);
                if ($httpcode == "200") {
                    $arrSession = array();
                    $arrSession["name"] = $data["displayName"];
                    $arrSession["username"] = $data["userName"];
                    $arrSession["email"] = $data["email"];
                    $arrSession["token"] = $data["access_token"];
                    $arrSession["refresh_token"] = array_key_exists("refresh_token", $data) ? $data["refresh_token"] : '';
                    $arrSession["expires_in"] = $data["expires_in"];
                    $arrSession["expires"] = date("Y-m-d H:i:s", strtotime($data[".expires"]));
                    $arrSession["is_login"] = TRUE;

                    // additional data my profile
                    $access_token = $data["access_token"];
                    $curl = curl_init();

                    curl_setopt_array($curl, array(

                        CURLOPT_URL => "http://appdev.kmn.kompas.com/authAPI/My/Profile",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HEADER => true,
                        CURLOPT_POSTFIELDS => "",
                        CURLOPT_HTTPHEADER => array(
                            "Authorization: Bearer " . $access_token,
                            "cache-control: no-cache"
                        ),
                    ));

                    $response = curl_exec($curl);
                    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                    $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
                    $body = substr($response, $header_size);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err) {
                        redirect("login_ad/error/" . $err);
                    } else {
                        $data = json_decode($body, true);
                        if ($httpcode == "200") {
                            $arrSession["userid"] = $data["ID"];
                            $arrSession["byline"] = $data["Byline"];
                            $arrSession["nik"] = $data["NIK"];
                            $arrSession["position"] = $data["Position"];
                            // $arrSession["unit"] = $data["Unit"];
                            $arrSession["location"] = $data["Location"];
                            // $arrSession["geoposition"] = $data["GeoPosition"];
                            $arrSession["photo"] = $data["Photo"];
                            //personal desk
                            $arrSession["desk_id"] = 0;
                            $arrSession["desk_icon"] = "personal.png";
                            $arrSession["desk_name"] = "PERSONAL";
                            //user role
                            $arrSession["publisher_id"] = $data["PublisherId"];
                            $arrSession["publisher_names"] = $data["PublisherName"];
                            $arrSession["role_id"] = $data["RoleIds"];
                            $arrSession["role_names"] = $data["RoleNames"];
                            $arrSession["expert_id"] = $data["ExpertiseIds"];
                            $arrSession["expert_names"] = $data["ExpertiseNames"];
                        }
                        if ($httpcode == "401") {
                            redirect('login_ad/error/Unauthorized');
                        }
                    }

                    // additional data workspace
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        // setting
                        CURLOPT_URL => "http://esldev.kgmedia.id/ep/dashboard",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HEADER => true,
                        CURLOPT_POSTFIELDS => "",
                        CURLOPT_HTTPHEADER => array(
                            "Authorization: Bearer " . $access_token,
                            "cache-control: no-cache"
                        ),
                    ));
                    $response = curl_exec($curl);
                    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                    $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
                    $body = substr($response, $header_size);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err) {
                        //what to do here
                    } else {
                        if ($httpcode == "200") {
                            $personal_desk = array(
                                "ID" => 0,
                                "Name" => "PERSONAL",
                                "EventExist" => false,
                                "Level" => 1,
                                "Parent" => NULL,
                                "Lowest" => 1
                            );
                            $workspace_tree = $this->BuildTree(json_decode($body));
                            array_unshift($workspace_tree, $personal_desk);
                            $arrSession["workspace"] = $this->BuildWorkspace($workspace_tree);
                        }
                    }

                    // permission
                    // $arrSession["permissions"] = json_decode($this->getPermissions($access_token));
                    // $mypermissions = '';
                    // foreach ($arrSession["permissions"]->desk as $key => $value) {
                    //     if ($value->DeskId == 0) {
                    //         $mypermissions .= $value->SecuredObjectCodes;
                    //     }
                    // }
                    // $arrSession["mypermissions"] = explode(',', $mypermissions);
                    // if ($arrSession["permissions"]->system[0]->SecuredObjectCodes) {
                    //     array_unshift($arrSession["mypermissions"], explode(',', $arrSession["permissions"]->system[0]->SecuredObjectCodes));
                    // }

                    // pagination
                    $arrSession["page_size"] = 10;

                    $this->session->set_userdata($arrSession);
                    var_dump($arrSession);

                    if ($this->session->flashdata('ref_url')) {
                        redirect($this->session->flashdata('ref_url'));
                    } else {
                        redirect("dashboard");
                    }
                } else {
                    redirect("login_ad/error/Unauthorized");
                }
            }
        } else {
            redirect('login_ad/error/Please fill in username and password');
        }
    }
}
