<?php

class Hire_model extends CI_Model
{

  function __construct()
  {
    $this->load->database();
  }

  public function check_personnel($ID){
    $this->db->where('PersonnelNumber',$ID);
    $q = $this->db->get('dbo.PersonnelTable');

    if ( $q->num_rows() == 0 ) {
      return 0;
        //$this->db->insert('dbo.PersonnelTable',$data1);
        // $last_id = $this->db->insert_id();
        // return $last_id;
     }else {
        $this->db->select('ID');
        $this->db->where('PersonnelNumber', $ID);
        $id = $this->db->from('dbo.PersonnelTable')->get();
        return $id->result_array();
       // $this->db->where('PersonnelNumber',$nik);
       // $this->db->update('dbo.UserTable',$data1);      
     }
  }

   public function auto_register($nik){
     $this->db->where('PersonnelNumber',$nik);
     $q = $this->db->get('dbo.UserTable');

     if ( $q->num_rows() == 0 ) {
          $res = $this->db->query("INSERT INTO dbo.UserTable (Email, Name, PersonnelNumber) SELECT Email, Name, PersonnelNumber from dbo.PersonnelTable where PersonnelNumber = $nik");
          $last_id = $this->db->query("SELECT SCOPE_IDENTITY()");
          $this->db->select('ID');
          $this->db->where('PersonnelNumber', $nik);
          $id = $this->db->from('dbo.UserTable')->get();
          //return $res->result_array();
          
     }else {
        $this->db->select('ID');
        $this->db->where('PersonnelNumber', $nik);
        $id = $this->db->from('dbo.UserTable')->get();
        //return $id->result_array();
       // $this->db->where('PersonnelNumber',$nik);
       // $this->db->update('dbo.UserTable',$data1);      
     }
     $data = array();
      if($id !== FALSE && $id != ''){
          $data = $id->row_array();
      }

      return $data;
   }

  public function get_id_personnel($name){
    $this->db->select('ID');
    $this->db->like('Fullname', $name);
    $data = $this->db->from('dbo.PersonnelTable')->get();
    return $data->result_array();
  }

  public function auto_register2($UserID, $PersonnelID){
    $this->db->where('UserID',$UserID);
     $q = $this->db->get('dbo.UserXPersonnel');
     $data = array (
                'UserID' => $UserID);

     if ( $q->num_rows() == 0 ) {
          $this->db->insert('dbo.UserXPersonnel',$data);
          $last_id = $this->db->insert_id();
          // return $last_id;
          $res = $this->db->query("UPDATE dbo.UserXPersonnel SET PersonnelID = $PersonnelID where ID = $last_id");
          return $res;    
     }
  }

  public function make_session($nik){
    $this->db->where('PersonnelNumber',$nik);
    $q = $this->db->get('dbo.PersonnelHierarchy');
    return $q->row_array();
  }

  public function auto_regist_position($last_id, $position){
    $this->db->where('UserID',$last_id);
    $q = $this->db->get('dbo.UserXUserGroup');
    $manager = $this->db->select('Postion')->from('PersonnelHierarchy')->where("'$position' LIKE '%Manager%' or '$position' like '%Editor in Chief%'")->get()->result();
    $director = $this->db->select('Postion')->from('PersonnelHierarchy')->where("'$position' like '%Director%'")->get()->result();
    $gm = $this->db->select('Postion')->from('PersonnelHierarchy')->where("'$position' like '%General Manager%' or '$position' like '%Vice General Manager%'")->get()->result();
    $ceo = $this->db->select('Postion')->from('PersonnelHierarchy')->where("'$position' like '%Chief Technology%' or '$position' like '%Chief Executive%' or '$position' like '%Chief Financial%'")->get()->result();
    //var_dump($manager);

    if ( $q->num_rows() == 0 ) {
          
          if(strpos('Manager', $position) !== false){
            $res = $this->db->query("INSERT INTO dbo.UserXUserGroup (UserID, UserGroupID) 
          values ($last_id, 5)");
          } elseif (preg_match('/Director/i', $position)){
            $res = $this->db->query("INSERT INTO dbo.UserXUserGroup (UserID, UserGroupID) 
          values ($last_id, 3)");
          } elseif (preg_match('/General|Vice/i', $position)){
            $res = $this->db->query("INSERT INTO dbo.UserXUserGroup (UserID, UserGroupID)
          values ($last_id, 4)");
          } elseif (preg_match('/Technology|Executive/i', $position)){
            $res = $this->db->query("INSERT INTO dbo.UserXUserGroup (UserID, UserGroupID)
          values ($last_id, 2)"); 
          }elseif(preg_match('/Editor/i', $position)){
            $res = $this->db->query("INSERT INTO dbo.UserXUserGroup (UserID, UserGroupID) 
            values ($last_id, 5)");
          }

      
      
      // $this->db->select('ID');
      // $this->db->where('UserID', $last_id);
      // $id = $this->db->from('dbo.UserXUserGroup')->get();
      //return $res->result_array();
      
 }else {
    $this->db->select('ID');
    $this->db->where('UserID', $last_id);
    $id = $this->db->from('dbo.UserXUserGroup')->get();

    // $res = $this->db->query("EXEC spAutoRegistPosition @Position  = '$position' , @UserID= '$last_id'");
    // return $res->result();
  }
}


  public function get_hire(){
    $q = '  select a.*, b.Name as Department,  c.FullName
           from dbo.RequisitionTable a
           join dbo.CostCenterTable b
           on a.PlacementID = b.ID
           join dbo.PersonnelTable c
           on a.RequestorID = c.ID 
           where a.RequestorID in 
           (select PersonnelIDList from
           (select a.UserID, b.PersonnelIDList, c.OrganizationUnitID 
           FROM dbo.UserXUserGroup a
           join dbo.UserTable b
           on a.UserID = b.ID
           join dbo.PersonnelPosition d
           on b.PersonnelIDList = d.PersonnelID
           join dbo.PositionInOrganization c
           on c.PositionID = d.PositionID 
           where UserGroupID = 5)x)
           and IsProcessedToHire=0
          and IsHold = 0
          and IsRejected = 0';
    $query = $this->db->query($q);    
     return $query->result_array();
   }

  //halo

   public function get_your_request($ID){
    $q = " select a.*, b.Name as Department,  c.Name as requestor,e.Name as DeptName
           from dbo.RequisitionTable a
           left join dbo.CostCenterTable b
           on a.PlacementID = b.ID
           left join dbo.PersonnelTable c
           on a.RequestorID = c.ID
           left join dbo.OrganizationTable e
           on a.RequestorDepartmentID = e.ID
           where a.ID in (select ID from dbo.RequisitionTable where IsProcessedToHire = 0 or IsProcessedToHire = 2)
           and a.RequestorID = $ID
           and a.IsHold = 0
           and a.IsRejected= 0
           order by IsProcessedToHire DESC";
    $query = $this->db->query($q);    
     return $query->result_array();
   }

   public function Insert_data($data){
    $this->db->insert('dbo.RequisitionTable', $data);
    $last_id = $this->db->insert_id();
    return $last_id;
  }

  public function get_hire_id($ID)
  {
    $q = 'select a.*, b.Name as Placement, c.Name as Status, 
      d.Name as Requestor, e.Name as requestor_pos,
      f.FullName as RepName, g.Name as requested_pos, h.Name as DeptName
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
      on a.RequestedPositionID = g.ID
      left join dbo.OrganizationTable h 
      on a.RequestorDepartmentID = h.ID  where a.ID='.$ID;
    $query = $this->db->query($q);
    //$query = $this->db->get_where('dbo.RequisitionTable',$ID);
    return $query->row_array();
  }

  public function get_organization($OrganizationID)
  { 
      $res = $this->db->query("select distinct a.OrganizationID, b.Name as OrganizationName from dbo.UserTable a
                              join dbo.OrganizationTable b on a.OrganizationID = b.ID
                              where a.OrganizationID =".$OrganizationID);
      return $res->result_array();
  }

  public function get_userid($name)
  { 
      $res = $this->db->query("select a.ID as UserID from dbo.UserTable a
                              join dbo.OrganizationTable b on a.OrganizationID = b.ID
                              where a.Name like '%$name%'");
      return $res->result_array();
  }

  public function get_member_organization($OrganizationID, $PersonnelNumber)
  { 
    $res = $this->db->query("select a.id, a.name, a.organizationid, c.id as PersonnelID,
      c.fullname as PersonnelName from dbo.UserTable a
      join dbo.OrganizationTable b on a.OrganizationID = b.id
      join dbo.PersonnelTable c on a.Name = c.FullName
      where b.ID ='$OrganizationID' and a.PersonnelNumber != '$PersonnelNumber'");
        return $res->result_array();
  }

  // function get_search_member($compClue){
  //   $this->db->select('*');
  //   $this->db->like('Name', $compClue);
  //   $data = $this->db->from('dbo.UserTable')->get();
  //   return $data->result_array();
  // }
  function get_search_member($dept_id,$compClue){
    $this->db->select('*');
    $this->db->where('OrganizationID',$dept_id);
    $this->db->like('Name', $compClue);
    $data = $this->db->from('dbo.UserTable')->get();
    return $data->result_array();
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

  public function process_data_approval($data1){
    $res = $this->db->insert('dbo.RequisitionApprovalTable', $data1);
    return $res;
    // $this->db->where($where);
    // $this->db->update('dbo.RequisitionApprovalTable', $data1);
    // if ($this->db->affected_rows() > 0){
    //   return TRUE;
    // }
    // else{
    //   return FALSE;
    // }
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

  public function hold_data_approval($data1){
    $res = $this->db->insert('dbo.RequisitionApprovalTable', $data1);
    return $res;
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

  public function reject_data_approval($data1){
    $res = $this->db->insert('dbo.RequisitionApprovalTable', $data1);
    return $res;
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

  public function get_new_req($ID, $req_dep){
    $query = "select a.*, b.FullName from dbo.RequisitionTable a
    join DBO.PersonnelTable b on a.RequestorID = b.ID
    join dbo.UserXUserGroup c on c.UserID = a.CreatedById
    join dbo.OrganizationTable d on d.ID = a.RequestorDepartmentID
    where a.RequestorID = '$ID'
    and c.UserGroupID = 4
    and a.RequestorDepartmentID = '$req_dep'
    and IsProcessedToHire=0 
    and IsHold = 0
    and IsRejected = 0;";
    $query = $this->db->query($query);
    return $query->result_array();

    // $where = array('IsProcessedToHire' => '0', 'IsHold' => '0', 'IsRejected' => '0');
    // $this->db->select('a.*, b.FullName');
    // $this->db->from('dbo.RequisitionTable a');
    // $this->db->join('dbo.PersonnelTable b','b.ID=a.RequestorID');
    // $this->db->where($where);
    // //$this->db->where('IsHold',)
    // $query = $this->db->get();
    // return $query->result_array();
  }

  public function get_new_mov(){
    $where = array('IsProcessed' => '0', 'IsHold' => '0', 'IsRejected' => '0');
    $this->db->select('a.*, b.FullName');
    $this->db->from('dbo.MovementTable a');
    $this->db->join('dbo.PersonnelTable b','b.ID=a.RequestorID');
    $this->db->where($where);
    //$this->db->where('IsHold',)
    $query = $this->db->get();
    return $query->result_array();
  }

  public function approve($ID){
    $q = "select a.*, b.Name as Department,  c.FullName, d.Name as DeptName
           from dbo.RequisitionTable a
           join dbo.CostCenterTable b
           on a.PlacementID = b.ID
           join dbo.PersonnelTable c
           on a.RequestorID = c.ID
           join dbo.OrganizationTable d
           on a.RequestorDepartmentID = d.ID 
           where a.RequestorID in 
           (select PersonnelIDList from
           (select a.UserID, b.PersonnelIDList, c.OrganizationUnitID 
           FROM dbo.UserXUserGroup a
           join dbo.UserTable b
           on a.UserID = b.ID
           join dbo.PersonnelPosition d
           on b.PersonnelIDList = d.PersonnelID
           join dbo.PositionInOrganization c
           on c.PositionID = d.PositionID 
           where UserGroupID = 5)x)
           and a.ID in 
           (select RequisitionID from 
           (select RequisitionID, max(ApprovalStatusID ) as status from
            (select * 
            from dbo.RequisitionApprovalTable
            where IsProcessedToHire=1
            and EmployeeID = ".$ID.")X
            group BY  RequisitionID)Y);";
     $query = $this->db->query($q);    
     return $query->result_array();
    //$where = array('IsProcessedToHire' => '1');
    // $res = $this->db->query("SELECT a.*, b.FullName from dbo.RequisitionTable a join dbo.PersonnelTable b
    // on a.RequestorID = b.ID where IsProcessedToHire = '1' and a.RequestorID=".$ID);
    // return $res->result_array();

  }

  public function hold($ID){
    $q = "select a.*, b.Name as Department,  c.FullName, d.Name as DeptName
           from dbo.RequisitionTable a
           join dbo.CostCenterTable b
           on a.PlacementID = b.ID
           join dbo.PersonnelTable c
           on a.RequestorID = c.ID
           join dbo.OrganizationTable d
           on a.RequestorDepartmentID = d.ID 
           where a.RequestorID in 
           (select PersonnelIDList from
           (select a.UserID, b.PersonnelIDList, c.OrganizationUnitID 
           FROM dbo.UserXUserGroup a
           join dbo.UserTable b
           on a.UserID = b.ID
           join dbo.PersonnelPosition d
           on b.PersonnelIDList = d.PersonnelID
           join dbo.PositionInOrganization c
           on c.PositionID = d.PositionID 
           where UserGroupID = 5)x)
           and a.ID in 
           (select RequisitionID from 
           (select RequisitionID, max(ApprovalStatusID ) as status from
            (select * 
            from dbo.RequisitionApprovalTable
            where IsHold=1
            and EmployeeID = ".$ID.")X
            group BY  RequisitionID)Y)";
     $query = $this->db->query($q);    
     return $query->result_array();
  }

  public function reject($ID){
    $q = "select a.*, b.Name as Department,  c.FullName, d.Name as DeptName
           from dbo.RequisitionTable a
           join dbo.CostCenterTable b
           on a.PlacementID = b.ID
           join dbo.PersonnelTable c
           on a.RequestorID = c.ID
           join dbo.OrganizationTable d
           on a.RequestorDepartmentID = d.ID 
           where a.RequestorID in 
           (select PersonnelIDList from
           (select a.UserID, b.PersonnelIDList, c.OrganizationUnitID 
           FROM dbo.UserXUserGroup a
           join dbo.UserTable b
           on a.UserID = b.ID
           join dbo.PersonnelPosition d
           on b.PersonnelIDList = d.PersonnelID
           join dbo.PositionInOrganization c
           on c.PositionID = d.PositionID 
           where UserGroupID = 5)x)
           and a.ID in 
           (select RequisitionID from 
           (select RequisitionID, max(ApprovalStatusID ) as status from
            (select * 
            from dbo.RequisitionApprovalTable
            where IsRejected=1
            and EmployeeID = ".$ID.")X
            group BY  RequisitionID)Y)";
     $query = $this->db->query($q);    
     return $query->result_array();
  }

  function my_approve($ID){
    $q = "select a.*, b.Name as Department,  c.FullName, d.Name as DeptName
           from dbo.RequisitionTable a
           join dbo.CostCenterTable b
           on a.PlacementID = b.ID
           join dbo.PersonnelTable c
           on a.RequestorID = c.ID 
           join dbo.OrganizationTable d
           on a.RequestorDepartmentID = d.ID
           where RequestorID = $ID
           and a.ID in (
           select RequisitionID from 
           (select RequisitionID, max(ApprovalStatusID ) as status from
            (select * 
            from dbo.RequisitionApprovalTable
            where IsProcessedToHire=1)X
            group BY  RequisitionID)Y)";
     $query = $this->db->query($q);    
     return $query->result_array();
  }

  function my_hold($ID){
    $q = "select a.*, b.Name as Department,  c.FullName, d.Name as DeptName
           from dbo.RequisitionTable a
           join dbo.CostCenterTable b
           on a.PlacementID = b.ID
           join dbo.PersonnelTable c
           on a.RequestorID = c.ID 
           join dbo.OrganizationTable d
           on a.RequestorDepartmentID = d.ID
           where RequestorID = $ID
           and a.ID in (
           select RequisitionID from 
           (select RequisitionID, max(ApprovalStatusID ) as status from
            (select * 
            from dbo.RequisitionApprovalTable
            where IsHold=1)X
            group BY  RequisitionID)Y)";
     $query = $this->db->query($q);    
     return $query->result_array();
  }

  function my_reject($ID){
    $q = "select a.*, b.Name as Department,  c.FullName, d.Name as DeptName
           from dbo.RequisitionTable a
           join dbo.CostCenterTable b
           on a.PlacementID = b.ID
           join dbo.PersonnelTable c
           on a.RequestorID = c.ID 
           join dbo.OrganizationTable d
           on a.RequestorDepartmentID = d.ID
           where RequestorID = $ID
           and a.ID in (
           select RequisitionID from 
           (select RequisitionID, max(ApprovalStatusID ) as status from
            (select * 
            from dbo.RequisitionApprovalTable
            where IsRejected=1)X
            group BY  RequisitionID)Y)";
     $query = $this->db->query($q);    
     return $query->result_array();
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

  function get_apv_info($ID){
    $res = $this->db->query("SELECT * from dbo.RequisitionApprovalTable where RequisitionID=".$ID);
    return $res->row_array();
  }

  function get_latest_apv($ID){
    $this->db->select('a.*, b.FullName as PersonnelName, c.Name as Position');
    $this->db->from('dbo.RequisitionApprovalTable a');
    $this->db->join('dbo.PersonnelTable b', 'a.EmployeeID = b.ID');
    $this->db->join('dbo.PositionTable c', 'a.PositionID = c.ID');
    $this->db->where('a.RequisitionID',$ID);
    $this->db->order_by("ApprovalStatusID", "DESC");
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->row_array();
  }

  function search_info($ID){
    // $this->db->select('A.ID, a.FullName, b.PositionID, c.Name as PositionName, d.OrganizationUnitID as Organization, e.Name as OrganizationName ');
    // $this->db->from('dbo.PersonnelTable a');
    // $this->db->join('dbo.PersonnelPosition b','a.ID=b.PersonnelID');
    // $this->db->join('dbo.PositionTable c','b.PositionID=c.ID');
    // $this->db->join('dbo.PositionInOrganization d','d.PositionID=b.PositionID');
    // $this->db->join('dbo.OrganizationTable e','e.ID=d.OrganizationUnitID');
    $this->db->select('*');
    $this->db->from("dbo.PersonnelHierarchy");
    $this->db->like('ID',$ID);
    //$this->db->where('IsHold',)
    $query = $this->db->get();
    return $query->row_array();
  }

  public function save_data($data){
    $res = $this->db->insert('dbo.RequisitionTable', $data);
    return $res;
  }

  public function save_data_personnel($data){
    $res = $this->db->insert('dbo.UserXPersonnel', $data);
    return $res;
  }

  public function hapus($ID){
    return $this->db->delete('dbo.RequisitionTable', array('ID'=>$ID));
  }

  public function Update_data($data, $ID){
    $this->db->where('ID', $ID);
    return $this->db->update('dbo.RequisitionTable', $data);
  }

  public function update_saved_data($data, $ID){
    $this->db->where('ID', $ID);
    return $this->db->update('dbo.RequisitionTable', $data);
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

  function get_related_per($ID){
    $q = 'select a.*, c.Name from 
          dbo.UserXPersonnel a 
        	join dbo.PersonnelTable c 
        	on a.PersonnelID = c.ID 
        	where a.UserID = '.$ID ;
    $query = $this->db->query($q);    
     //$query = $this->db->get('dbo.RequisitionTable');
     return $query->result_array();
  }

  function need_approval_req($ID){
    $q = $this->db->query("select a.*, b.Name as DeptName,  c.FullName as requestor
                      from dbo.RequisitionTable a
                      join dbo.OrganizationTable b
                      on a.RequestorDepartmentID = b.ID
                      join dbo.PersonnelTable c
                      on a.RequestorID = c.ID 
                      where a.RequestorID in 
                      (select ID from dbo.PersonnelHierarchy
                      where ParentPersonnelID = '$ID')
                      and IsProcessedToHire=0
                      and IsHold = 0
                      and IsRejected = 0");
    return $q->result_array();
  }
}

 ?>
