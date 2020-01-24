<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loginad extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        //$this->load->library("Aauth");
    }

    public function index()
    {
        if ($this->session->userdata("is_login") == TRUE) {
            redirect('dashboard', 'refresh');
        } else {
            if ($this->session->flashdata('ref_url')) {
                $redir = $this->session->flashdata('ref_url');
                $this->session->set_flashdata('ref_url', $redir);
            }
            $this->load->view('loginad');
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

    // function getPermissions($access_token)
    // {
    //     $curl = curl_init();
    //     curl_setopt_array($curl, array(
    //         // setting
    //         CURLOPT_URL => INR_API . "My/Permissions",
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => "",
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 30,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "GET",
    //         CURLOPT_HEADER => true,
    //         CURLOPT_POSTFIELDS => "",
    //         CURLOPT_HTTPHEADER => array(
    //             "Authorization: Bearer " . $access_token,
    //             "cache-control: no-cache"
    //         ),
    //     ));
    //     $response = curl_exec($curl);
    //     $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    //     $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
    //     $body = substr($response, $header_size);
    //     $err = curl_error($curl);

    //     curl_close($curl);
    //     return $body;
    // }

    // function BuildTree(array $data, $parent = 0)
    // {
    //     $tree = array();
    //     foreach ($data as $d) {
    //         if ($d->ID !== 0) {
    //             if ($d->Parent == $parent) {
    //                 $children = $this->BuildTree($data, $d->ID);
    //                 if (!empty($children)) {
    //                     $d->_children = $children;
    //                 }
    //                 $tree[] = $d;
    //             }
    //         }
    //     }
    //     return $tree;
    // }

    // function BuildWorkspace($menu_array, $is_sub = FALSE, $lvl = 1)
    // {
    //     $attr = "";
    //     switch ($lvl) {
    //         case 1:
    //             $attr = ' class="nav"';
    //             break;
    //         case 2:
    //             $attr = ' class="nav nav-second-level" aria-expanded="false"';
    //             break;
    //         case 3:
    //             $attr = ' class="nav nav-third-level" aria-expanded="false"';
    //             break;
    //         default:
    //             $attr = ' class="nav"';
    //             break;
    //     }
    //     $menu = ($is_sub) ? "<ul" . $attr . ">" : "";
    //     foreach ($menu_array as $id => $properties) {
    //         foreach ($properties as $key => $val) {
    //             if (is_array($val)) {
    //                 $lvl = $val[0]->Level;
    //                 $sub = $this->BuildWorkspace($val, TRUE, $lvl);
    //             } else {
    //                 $sub = NULL;
    //                 $$key = $val;
    //             }
    //         }

    //         if ($sub) {
    //             $menu .= ($Name == "KOMPAS" ? ' <li> <a href="#" class="waves-effect"><img src="' . asset_url() . 'plugins/images/icons/kompas-digital-icon.svg" style="width: 15px;"> <span class="hide-menu">' . $Name . '<span class="fa arrow"></span></span></a> ' . $sub . ' </li> ' : ' <li> <a href="#" class="waves-effect"><i class="mdi mdi-folder-multiple-outline fa-fw"></i> <span class="hide-menu">' . $Name . '<span class="fa arrow"></span></span></a> ' . $sub . ' </li> ');
    //         } else {
    //             //$menu .= '<li> <a href="'.base_url().'menu/set_workspace/'.$ID.'/'.$Name.'"><i class="mdi mdi-folder-outline fa-fw"></i><span class="hide-menu  text-warning">'.$Name.'</span></a> </li>';
    //             $menu .= '<li> <a href="' . base_url() . 'plan/index/' . $ID . '/' . $Name . '"><i class="mdi mdi-folder-outline fa-fw"></i><span class="hide-menu  text-warning">' . $Name . '</span></a> </li>';
    //         }
    //         unset($ID, $Name, $sub, $lvl);
    //     }
    //     return ($is_sub) ? $menu . "</ul>" : $menu;
    // }

    public function logout()
    {
        $user = array('name', 'username', 'email', 'token', 'is_login');
        $this->session->unset_userdata($user);
        redirect("login_ad");
    }

    public function error($status)
    {
        $this->data["status"] = $status;
        $this->load->view('login_ad_error', $this->data);
    }

    public function errorpage($idx)
    {
        if ($idx == 403)
            $this->load->view('403');
        else
            $this->load->view('403');
    }
}
