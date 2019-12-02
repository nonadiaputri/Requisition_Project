<?php

class Promotion_model extends CI_Model
{
    public function get_promotion(){
        //Menampilkan data dari tabel MovementRequestTable untuk tampilan menu Request Promotion
        $query = $this->db->query("select a.*, b.Name as Department,  c.FullName as RequestorName
               from dbo.MovementRequestTable a
               join dbo.OrganizationTable b
               on a.RequestorDepartmentID = b.ID
               join dbo.PersonnelTable c
               on a.RequestorID = c.ID 
               where a.RequestorID in 
               (select ID from
                    (select a.UserID, b.ID, c.OrganizationUnitID 
                    FROM dbo.UserXUserGroup a
                    join dbo.PersonnelTable b
                    on a.UserID = b.ID
                    join dbo.PersonnelPosition d
                    on b.ID = d.PersonnelID
                    join dbo.PositionInOrganization c
                    on c.PositionID = d.PositionID 
                    where UserGroupID = 5)x)
                    and IsProcessed=0
                and IsHold=0
                and IsRejected=0");
         return $query->result_array();
      }

      public function get_promotion_id($ID)
      {
        $query = $this->db->query('select a.*, c.FullName as fullname, 
         b.Name as current_position, e.Name as new_position, g.Name as requestor_position, 
         a.CurrentPositionID, a.NewPositionID, d.Name as departement_name, 
         f.FullName as request_name, h.Name as MovementType from MovementRequestTable a 
         left join PositionTable b on a.CurrentPositionID = b.ID 
         left join PositionTable e on e.id = a.NewPositionID
         left join PositionTable g on g.id = a.RequestorPositionID
         left join PersonnelTable c on c.ID = a.RequestorID 
           left join PersonnelTable f on f.ID = a.RequestedPersonnelID
         left join OrganizationTable d on d.ID = a.RequestorDirectorateID  
         left join MovementRequestTypeTable h on h.ID = a.MovementRequestTypeID
         where a.ID ='.$ID);
         return $query->row_array();
         
      }

      public function get_new_req(){
        $where = array('IsProcessedToHire' => '0', 'IsHold' => '0', 'IsRejected' => '0');
        $this->db->select('a.*, b.FullName');
        $this->db->from('dbo.RequisitionTable a');
        $this->db->join('dbo.PersonnelTable b','b.ID=a.RequestorID');
        $this->db->where($where);
        //$this->db->where('IsHold',)
        $query = $this->db->get();
        return $query->result_array();
      }
    
      public function Insert_data($data){
        $this->db->insert('dbo.MovementRequestTable', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
      }
    
      public function Insert_to_approval($data1){
        return $this->db->insert('dbo.MovementRequestApprovalTable', $data1);
      }
    
      function Simpan($table, $data){
        return $this->db->insert($table, $data);
    }

    
      public function process_data($data,$where){
        $this->db->where($where);
        $this->db->update('dbo.MovementRequestTable', $data);
        if ($this->db->affected_rows() > 0){
          return TRUE;
        }
        else{
          return FALSE;
        }
      }

      function get_related_per($ID){
        $q = " select a.*, b.Name from 
        [dbo].[PersonnelAuth] a join dbo.PersonnelTable b 
        on a.PersonnelID = b.ID where a.PersonnelNumber = $ID ";
        $query = $this->db->query($q);    
         //$query = $this->db->get('dbo.RequisitionTable');
         return $query->result_array();
      }

      public function choose_org(){
        $res = $this->db->query("select ID, Name from dbo.OrganizationTable where ParentID = 1");
        return $res->result_array();
      }
    
      public function chs_dep($ID){
        $this->db->select('ID,Name');
        $this->db->from('dbo.OrganizationTable');
        $this->db->where($ID);
        $query = $this->db->get();
        return $query->result_array();
      }

      function choose_move_type($ID){
        $res = $this->db->query("select ID, Name from dbo.MovementRequestTypeTable");
        return $res->result_array();
      }

      function choose_request_name($ID){
        $q = " select a.ID, a.FullName as Name, c.Name as PositionName, e.Name as OrganizationName 
                  from dbo.PersonnelTable a
                  join dbo.PersonnelPosition b on a.ID = b.PersonnelID
                  join dbo.PositionTable c on b.PositionID = c.ID
                  join dbo.PositionInOrganization d on c.ID = d.OrganizationUnitID
                  join dbo.OrganizationTable e on d.OrganizationUnitID = e.ID";
        $query = $this->db->query($q);    
         return $query->result_array();
      }

      function choose_move_position($ID){
        $res = $this->db->query("select ID, Name from dbo.PositionTable");
        return $res->result_array();
      }
    
      function get_search_requestor($compClue){
        $this->db->select('*');
        $this->db->like('FullName', $compClue);
        $data = $this->db->from('dbo.PersonnelTable')->get();
        return $data->result_array();
    }
    
      function get_search_position($compClue){
        $this->db->select('*');
        $this->db->like('Name', $compClue);
        $data = $this->db->from('dbo.PositionTable')->get();
        return $data->result_array();
    }
    
    function get_search_request_type($compClue){
      $this->db->select('*');
      $this->db->like('Name', $compClue);
      $data = $this->db->from('dbo.MovementRequestTypeTable')->get();
      return $data->result_array();
    }
    
    function get_search_request($compClue){
      $this->db->select('*');
      $this->db->like('FullName', $compClue);
      $data = $this->db->from('dbo.PersonnelTable')->get();
      return $data->result_array();
    }
    
    function get_search_current_position($compClue){
      $this->db->select('*');
      $this->db->like('Name', $compClue);
      $data = $this->db->from('dbo.PositionTable')->get();
      return $data->result_array();
    }
    
    function get_search_new_position($compClue){
      $this->db->select('*');
      $this->db->like('Name', $compClue);
      $data = $this->db->from('dbo.PositionTable')->get();
      return $data->result_array();
    }
    
    function get_apv_info($ID){
        $res = $this->db->query("SELECT * from dbo.MovementRequestApprovalTable where MovementRequestID=".$ID);
        return $res->row_array();
      }
    
    
    
    function search_info($Name){
        $this->db->select('A.ID, a.FullName, b.PositionID, c.Name as PositionName, d.OrganizationUnitID as Organization, e.Name as OrganizationName ');
        $this->db->from('dbo.PersonnelTable a');
        $this->db->join('dbo.PersonnelPosition b','a.ID=b.PersonnelID');
        $this->db->join('dbo.PositionTable c','b.PositionID=c.ID');
        $this->db->join('dbo.PositionInOrganization d','d.PositionID=b.PositionID');
        $this->db->join('dbo.OrganizationTable e','e.ID=d.OrganizationUnitID');
        $this->db->like('a.FullName',$Name);
        //$this->db->where('IsHold',)
        $query = $this->db->get();
        return $query->row_array();
      }
    
      function search_requestor_pro($Request){
        $this->db->select('a.ID as PositionID, a.Name as Position , c.FullName, C.ID as PersonnelID, e.Name as Organization, , e.ID as OrganizationID');
        $this->db->from('dbo.PositionTable a');
        $this->db->join('dbo.PersonnelPosition b','a.ID = b.PositionID');
        $this->db->join('dbo.PersonnelTable c','c.ID = b.PersonnelID');
        $this->db->join('dbo.PositionInOrganization d','a.ID = d.PositionID');
        $this->db->join('dbo.OrganizationTable e','d.OrganizationUnitID = e.ID');
        $this->db->like('c.FullName',$Request);
        $query = $this->db->get();
        return $query->row_array();
      }
    
      function search_new_position($Position){
        $this->db->select('a.Name, b.PositionID as NewPositionID, c.ID as NewOrganizationID');
        $this->db->from('dbo.PositionTable a');
        $this->db->join('dbo.PositionInOrganization b','a.ID = b.PositionID');
        $this->db->join('dbo.OrganizationTable c','b.OrganizationUnitID = c.ID');
        $this->db->like('a.Name',$Position);
        $query = $this->db->get();
        return $query->row_array();
      }
    
    
      public function save_data($data){
        $res = $this->db->insert('dbo.MovementRequestTable', $data);
        return $res;
      }
    

}
?>