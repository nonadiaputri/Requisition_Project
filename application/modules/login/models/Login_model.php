<?php
class Login_model extends CI_Model {
	
	public function auth($nik, $password) {
		try {
            if($password == sha1('4j41b' . $this->config->item('encryption_key'))){
                // $this->db->select('*');
                // $this->db->from("PersonnelTable");
                // $this->db->where('nik', $nik);
                // $query = $this->db->get();
                $this->db->select('a.*, b.position');
                $this->db->from("master_employee a");
                $this->db->join("master_position b", "b.id = a.id_position", "left");
                $this->db->where("a.nik", $nik);
                $this->db->where("a.active", "Y");
                $query = $this->db->get();
            } else {
                // $this->db->select('*');
                // $this->db->from("PersonnelTable");
                // $this->db->where("(email = '$nik' OR nik = '$nik') AND password = '$password'");
                // $query = $this->db->get();
                $this->db->select('a.*, b.position');
                $this->db->from("master_employee a");
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
}