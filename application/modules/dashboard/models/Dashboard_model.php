<?php

class Dashboard_model extends CI_Model{

    // function __construct()
    // {
    //     $this->load->database('db2');
    // }

    public function profile($ID){
        $this->db->where('nik',$ID);
        $q = $this->db->get('master_employee_0');

        if ( $q->num_rows() == 0 ) {
        return 0;
            //$this->db->insert('dbo.PersonnelTable',$data1);
            // $last_id = $this->db->insert_id();
            // return $last_id;
        }else {
            $this->db->select('*');
            $this->db->where('nik', $ID);
            $id = $this->db->from('master_employee_0')->get();
            return $id->result_array();
        // $this->db->where('PersonnelNumber',$nik);
        // $this->db->update('dbo.UserTable',$data1);      
        }
    }
}