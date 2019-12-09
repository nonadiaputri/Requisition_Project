<?php
class Sidebar_model extends CI_Model {
	
    public function role_access_hris($sess){
        //$res =  $this->db->query('select UserID from dbo.UserXUserGroup where UserGroupID =' .$sess);
        //return $res->result();
         $this->db->select('UserGroupID'); 
         $this->db->from('dbo.UserXUserGroup');
         $this->db->WHERE('UserID', $sess); 
         $query = $this->db->get();
        return $query->row();
				
			// $result = $query->result();
            // return $result;
    }
    
}