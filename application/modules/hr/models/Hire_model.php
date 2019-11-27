<?php

class Hire_model extends CI_Model
{
/*
  public $table = 'dbo.RequisitionTable';
  public $id = 'id';
  public $order = 'DESC';

  function __construct()
  {
    $this->load->database();
  }
*/
  public function get_hire(){
    $q = 'select a.*, b.Name as Department,  c.FullName
           from dbo.RequisitionTable a
           join dbo.CostCenterTable b
           on a.PlacementID = b.ID
           join dbo.PersonnelTable c
           on a.RequestorID = c.ID ';
    $query = $this->db->query($q);    
     //$query = $this->db->get('dbo.RequisitionTable');
     return $query->result_array();
   }

   public function Insert_data($data){
    $this->db->insert('dbo.RequisitionTable', $data);
    $last_id = $this->db->insert_id();
    return $last_id;
  }

  public function get_hire_id($ID)
  {
    $q = 'select a.*, b.Name as Department, c.Name as Status, 
      d.FullName as Requestor, e.Name as req_position,
      f.FullName as RepName, g.Name as requested_pos
      from dbo.RequisitionTable a
      left join dbo.CostCenterTable b
      on a.PlacementID = b.ID
      left join dbo.RequisitionTypeTable c
      on a.RequisitionTypeID = c.ID
      left join dbo.PersonnelTable d
      on a.RequestorID = d.ID 
      left join dbo.PositionTable e
      on a.RequestorPositionID = e.ID
      left join dbo.PersonnelTable f
      on a.ReplacementPersonnelID = f.ID
      left join dbo.PositionTable g
      on a.RequestedPositionID = g.ID where a.ID='.$ID;
    $query = $this->db->query($q);
    //$query = $this->db->get_where('dbo.RequisitionTable',$ID);
    return $query->row_array();
  }

  public function process_data($data,$where){
    $this->db->where($where);
    $this->db->update('dbo.RequisitionTable', $data);
    if ($this->db->affected_rows() > 0){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }

  public function process_data_approval($data1,$where){
    $this->db->where($where);
    $this->db->update('dbo.RequisitionApprovalTable', $data1);
    if ($this->db->affected_rows() > 0){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }

  public function hold_data($data, $where){
    $this->db->where($where);
    $this->db->update('dbo.RequisitionTable', $data);
    if ($this->db->affected_rows() > 0){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }

  public function hold_data_approval($data1, $where){
    $this->db->where($where);
    $this->db->update('dbo.RequisitionApprovalTable', $data1);
    if ($this->db->affected_rows() > 0){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }

  public function reject_data($data, $where){
    $this->db->where($where);
    $this->db->update('dbo.RequisitionTable', $data);
    if ($this->db->affected_rows() > 0){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }

  public function reject_data_approval($data1, $where){
    $this->db->where($where);
    $this->db->update('dbo.RequisitionApprovalTable', $data1);
    if ($this->db->affected_rows() > 0){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }

  public function get_notif(){
    $where = array('IsProcessedToHire' => '0');
    $res = $this->db->query("SELECT * from dbo.RequisitionTable where IsProcessedToHire = '0' ");
  }

  public function Insert_to_approval($data){
    return $this->db->insert('dbo.RequisitionApprovalTable', $data);
  }

  function get_search($compClue, $column){
            $this->db->select($column);
            $this->db->like('Name', $compClue);
            $data = $this->db->from('dbo.RequisitionTable')->get();
            return $data->result_array();
  }

  public function total_new_req(){
    $where = '0';
    $this->db->select('*');
    $this->db->from('dbo.RequisitionTable');
    $this->db->where('IsProcessedToHire',$where);
    $this->db->get();
    return $this->db->count_all_results();
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

  public function approve(){
    //$where = array('IsProcessedToHire' => '1');
    $res = $this->db->query("SELECT a.*, b.FullName from dbo.RequisitionTable a join dbo.PersonnelTable b
    on a.RequestorID = b.ID where IsProcessedToHire = '1' ");
    return $res->result_array();

  }

  public function hold(){
    $res = $this->db->query("SELECT a.*, b.FullName from dbo.RequisitionTable a join dbo.PersonnelTable b
    on a.RequestorID = b.ID where IsHold = '1' ");
    return $res->result_array();
  }

  public function reject(){
    $res = $this->db->query("SELECT a.*, b.FullName from dbo.RequisitionTable a join dbo.PersonnelTable b
    on a.RequestorID = b.ID where IsRejected = '1' ");
    return $res->result_array();
  }

  function get_search_placement($compClue){
            $this->db->select("*");
            $this->db->like('Name', $compClue);
            $data = $this->db->from('dbo.CostCenterTable')->get();
            return $data->result_array();
  }

  function get_search_personnel($compClue){
            $this->db->select("*");
            $this->db->like('FullName', $compClue);
            $data = $this->db->from('dbo.PersonnelTable')->get();
            return $data->result_array();
  }

  function get_search_req_position($compClue){
            $this->db->select("*");
            $this->db->like('Name', $compClue);
            $data = $this->db->from('dbo.PositionTable')->get();
            return $data->result_array();
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

  public function search_PosInOrg($ID){
    $res = $this->db->query("select a.OrganizationUnitID, b.Name as org,c.ID, c.Name as Position, d.PersonnelID, e.FullName
      from dbo.PositionInOrganization a
      join dbo.OrganizationTable b
      on a.OrganizationUnitID = b.ID
      join dbo.PositionTable c
      on a.PositionID = c.ID
      LEFT join dbo.PersonnelPosition d
      on d.PositionID = a.ID
      left join dbo.PersonnelTable e
      on d.PersonnelID=e.ID
      where OrganizationUnitID = $ID
      order by OrganizationUnitID");
    return $res->result_array();

  }

}
 ?>
