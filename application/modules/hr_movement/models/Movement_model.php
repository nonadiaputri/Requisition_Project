<?php

class Movement_model extends CI_Model
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

  public function make_session($nik){
    $this->db->where('PersonnelNumber',$nik);
    $q = $this->db->get('dbo.PersonnelHierarchy');
    return $q->row_array();
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

    public function get_sp_request_number($RequestNumber)
    {
        $Request = $this->db->query("EXEC spRequestNumber @ID = '$RequestNumber'");
        return $Request;
        // $request = $this->db->query("EXEC spRequestNumber N'{@RequestNumber}', N'{$RequestNumber}'");
        // return $request;
        // public function Insert_data($data){
        //   $this->db->insert('dbo.MovementRequestTable', $data);
        //   $last_id = $this->db->insert_id();
        //   return $last_id;
        // }
    }

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

      public function get_movement_id($ID)
      {
        $query = $this->db->query('select a.*, c.FullName as RequestorName, 
         b.Name as current_position, e.Name as new_position, g.Name as requestor_position, 
         a.CurrentPositionID, a.NewPositionID, d.Name as DeptName, 
         f.FullName as request_name, h.Name as MovementType from MovementRequestTable a 
         left join PositionTable b on a.CurrentPositionID = b.ID 
         left join PositionTable e on e.id = a.NewPositionID
         left join PositionTable g on g.id = a.RequestorPositionID
         left join PersonnelTable c on c.ID = a.RequestorID 
           left join PersonnelTable f on f.ID = a.RequestedPersonnelID
         left join OrganizationTable d on d.ID = a.RequestorDepartmentID  
         left join MovementRequestTypeTable h on h.ID = a.MovementRequestTypeID
         where a.ID ='.$ID);
         return $query->row_array();
         
      }

      function get_apv_req($ID){
        $q = " select a.MovementRequestID, max(a.ApprovalStatusID) as max_status, b.Name as DeptName,  c.FullName as approval,
          d.ProcessStartDate, d.RequestorID, e.FullName as requestor
          from dbo.MovementRequestApprovalTable a
          join dbo.OrganizationTable b
          on a.OrganizationID = b.ID
          join dbo.PersonnelTable c
          on a.EmployeeID = c.ID 
          join dbo.MovementRequestTable d
          on a.MovementRequestID = d.ID
          join dbo.PersonnelTable e
          on d.RequestorID = e.ID
          where a.IsProcessed = 1
          and a.EmployeeID = '$ID'
          group by a.MovementRequestID, b.Name, c.FullName, d.ProcessStartDate, d.RequestorID, e.FullName";
        $query = $this->db->query($q);    
         return $query->result_array();
      }

      function get_hold_req($ID){
        $q = " select a.MovementRequestID, max(a.ApprovalStatusID) as max_status, b.Name as DeptName,  c.FullName as approval,
          d.ProcessStartDate, d.RequestorID, e.FullName as requestor
          from dbo.MovementRequestApprovalTable a
          join dbo.OrganizationTable b
          on a.OrganizationID = b.ID
          join dbo.PersonnelTable c
          on a.EmployeeID = c.ID 
          join dbo.MovementRequestTable d
          on a.MovementRequestID = d.ID
          join dbo.PersonnelTable e
          on d.RequestorID = e.ID
          where a.IsHold = 1
          and a.EmployeeID = '$ID'
          group by a.MovementRequestID, b.Name, c.FullName, d.ProcessStartDate, d.RequestorID, e.FullName";
        $query = $this->db->query($q);    
         return $query->result_array();
      }

      function get_rejected_req($ID){
        $q = " select a.MovementRequestID, max(a.ApprovalStatusID) as max_status, b.Name as DeptName,  c.FullName as approval,
          d.ProcessStartDate, d.RequestorID, e.FullName as requestor
          from dbo.MovementRequestApprovalTable a
          join dbo.OrganizationTable b
          on a.OrganizationID = b.ID
          join dbo.PersonnelTable c
          on a.EmployeeID = c.ID 
          join dbo.MovementRequestTable d
          on a.MovementRequestID = d.ID
          join dbo.PersonnelTable e
          on d.RequestorID = e.ID
          where a.IsRejected = 1
          and a.EmployeeID = '$ID'
          group by a.MovementRequestID, b.Name, c.FullName, d.ProcessStartDate, d.RequestorID, e.FullName";
        $query = $this->db->query($q);    
         return $query->result_array();
      }

      public function get_new_promotion(){
       
        // $query = 'select a.*, b.FullName as RequestorName from dbo.MovementRequestTable a
        //           join dbo.PersonnelTable b
        //           on b.ID=a.RequestorID
        //           where RequestorID in 
        //             (Select PersonnelIDList from 
        //               (select a.ID, a.PersonnelIDList, c.OrganizationUnitID from dbo.UserTable a
        //                 join dbo.PersonnelPosition b
        //                 on a.PersonnelIDList = b.PersonnelID
        //                 join dbo.PositionInOrganization c
        //                 on c.PositionID = b.PositionID
        //                 where a.ID in 
        //                   (select userID from dbo.UserXUserGroup where UserGroupID=5)
        //                 )X)
        //           and IsProcessed=0 
        //           and IsHold = 0
        //           and IsRejected = 0';

        $query = 'select a.*, b.FullName as RequestorName from dbo.MovementRequestTable a
                  join dbo.PersonnelTable b
                  on b.ID=a.RequestorID
                  where RequestorID in 
                    (Select ID from 
                      (select a.ID, c.OrganizationUnitID from dbo.PersonnelTable a
                        join dbo.PersonnelPosition b
                        on a.ID = b.PersonnelID
                        join dbo.PositionInOrganization c
                        on c.PositionID = b.PositionID
                        )X)
                  and IsProcessed=0 
                  and IsHold = 0
                  and IsRejected = 0';
        $query = $this->db->query($query);
        return $query->result_array();
        
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
      return FALSE;
    
        // $res = $this->db->query("EXEC spAutoRegistPosition @Position  = '$position' , @UserID= '$last_id'");
        // return $res->result();
      }
    }

      // public function get_your_request($requestor_id){
      //   $q = "select a.*, b.Name as Department,  c.FullName as RequestorName
      //           from dbo.MovementRequestTable a
      //           join dbo.OrganizationTable b
      //           on a.RequestorDepartmentID = b.ID
      //           join dbo.PersonnelTable c
      //           on a.RequestorID = c.ID
      //           where a.ID in (
      //                 select ID from dbo.MovementRequestTable 
      //                 where IsProcessed = 0 or IsProcessed =2)
      //                 and a.RequestorID = '$requestor_id'
      //                 and a.IsHold = 0 and a.IsRejected = 0
      //                 order by IsProcessed DESC";
      //   $query = $this->db->query($q);    
      //    return $query->result_array();
      //  }

      public function get_your_request($ID){
        // $q = "select a.*, b.Name as Department,  c.FullName as RequestorName
        //         from dbo.MovementRequestTable a
        //         join dbo.OrganizationTable b
        //         on a.RequestorDepartmentID = b.ID
        //         join dbo.PersonnelTable c
        //         on a.RequestorID = c.ID
        //         where a.ID in (
        //               select ID from dbo.MovementRequestTable 
        //               where IsProcessed = 0 or IsProcessed =2)
        //               and a.IsHold = 0 and a.IsRejected = 0
        //               order by IsProcessed DESC";

        $q = " select a.*, c.Name as requestor,e.Name as DeptName
        from dbo.MovementRequestTable a
        left join dbo.PersonnelTable c
        on a.RequestorID = c.ID
        left join dbo.OrganizationTable e
        on a.RequestorDepartmentID = e.ID
        where a.ID in (select ID from dbo.MovementRequestTable where IsProcessed = 0 or IsProcessed = 2)
        and a.RequestorID = $ID
        and a.IsHold = 0
        and a.IsRejected= 0
        order by IsProcessed DESC";
        $query = $this->db->query($q);    
         return $query->result_array();
       }
    

       public function get_new_req($ID, $req_dep){
            $query = "select a.*, b.FullName from dbo.MovementRequestTable a
            join DBO.PersonnelTable b on a.RequestorID = b.ID
            join dbo.OrganizationTable d on d.ID = a.RequestorDepartmentID
            where a.RequestorID = '$ID'
            and a.RequestorDepartmentID = '$req_dep'
            and IsProcessed=0 
            and IsHold = 0
            and IsRejected = 0";
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

      public function get_new_req_approval($ID, $req_dep){
        $query = "select a.*, b.FullName from dbo.MovementRequestTable a
                  join DBO.PersonnelTable b on a.RequestorID = b.ID
                  join dbo.MovementRequestApprovalTable c on c.MovementRequestID = a.ID
                  join dbo.OrganizationTable d on d.ID = a.RequestorDepartmentID
                  where a.RequestorID = '$ID'
                  and a.RequestorDepartmentID = '$req_dep'
                  and c.ApprovalStatusID =2
                  and a.IsProcessed=1
                  and a.IsHold = 0
                  and a.IsRejected = 0";
        $query = $this->db->query($query);
        return $query->result_array();
  }

    
      public function Insert_data($data){
        $this->db->insert('dbo.MovementRequestTable', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
      }

      public function get_data_rn($ID){
        // $this->db->get('dbo.MovementRequestTable', $data);
        // $get_last_id = $this->db->get_id();
        //  return $get_last_id;
        // $this->db->select('id');
        // $get_last_id = $this->db->get('dbo.MovementRequestTable', $data);
        $get_last_id = $this->db->query("EXEC spRequestNumber @ID = '$ID'");
        return $get_last_id;
      }

    
      public function Insert_to_approval($data1){
        return $this->db->insert('dbo.MovementRequestApprovalTable', $data1);
      }

    
      function Simpan($table, $data){
        return $this->db->insert($table, $data);
    }

    public function Update_data($data, $ID){
      $this->db->where('ID', $ID);
      return $this->db->update('dbo.MovementRequestTable', $data);
    }
    public function update_saved_data($data, $ID){
      $this->db->where('ID', $ID);
      return $this->db->update('dbo.MovementRequestTable', $data);
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

      public function process_data_approval($data1){
        $res = $this->db->insert('dbo.MovementRequestApprovalTable', $data1);
        return $res;
       
      }

      public function hold_data($data, $where){
        $this->db->where($where);
        $this->db->update('dbo.MovementRequestTable', $data);
        if ($this->db->affected_rows() > 0){
          return TRUE;
        }
        else{
          return FALSE;
        }
      }
    
      public function hold_data_approval($data1){
        $res = $this->db->insert('dbo.MovementRequestApprovalTable', $data1);
        return $res;
      }

      public function reject_data($data, $where){
        $this->db->where($where);
        $this->db->update('dbo.MovementRequestTable', $data);
        if ($this->db->affected_rows() > 0){
          return TRUE;
        }
        else{
          return FALSE;
        }
      }
    
      public function reject_data_approval($data1){
        $res = $this->db->insert('dbo.MovementRequestApprovalTable', $data1);
        return $res;
      }

      function get_related_per($ID){
        $q = 'select a.*, c.Name from 
        [dbo].[UserXPersonnel] a 
      join dbo.PersonnelTable c 
      on a.PersonnelID = c.ID 
      where a.UserID = '.$ID ;
        $query = $this->db->query($q);    
         //$query = $this->db->get('dbo.RequisitionTable');
         return $query->result_array();
      }

      function need_approval_req($ID){
        $q = $this->db->query("select a.*, b.Name as DeptName,  c.FullName as requestor
                          from dbo.MovementRequestTable a
                          join dbo.OrganizationTable b
                          on a.RequestorDepartmentID = b.ID
                          join dbo.PersonnelTable c
                          on a.RequestorID = c.ID 
                          where a.RequestorID in 
                          (select ID from dbo.PersonnelHierarchy
                          where ParentPersonnelID = '$ID')
                          and IsProcessed=0
                          and IsHold = 0
                          and IsRejected = 0");
        return $q->result_array();
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

      function choose_request_name($Request){
        $q = " select distinct a.ID as ID, a.FullName as Name, c.Name as PositionName,  c.ID PositionID,
                  e.ID as OrganizationID
                  from dbo.PersonnelTable a
                  join dbo.PersonnelPosition b on a.ID = b.PersonnelID
                  join dbo.PositionTable c on b.PositionID = c.ID
                  join dbo.PositionInOrganization d on c.ID = d.OrganizationUnitID
                  join dbo.OrganizationTable e on d.OrganizationUnitID = e.ID";
        $query = $this->db->query($q);    
         return $query->result_array();
        
      }
      
      function search_requestor_pro($Request){
        $this->db->select('a.ID as PositionID, a.Name as Position , c.FullName, c.EmploymentStartDate, C.ID as PersonnelID, e.Name as Organization, , e.ID as OrganizationID');
        $this->db->from('dbo.PositionTable a');
        $this->db->join('dbo.PersonnelPosition b','a.ID = b.PositionID');
        $this->db->join('dbo.PersonnelTable c','c.ID = b.PersonnelID');
        $this->db->join('dbo.PositionInOrganization d','a.ID = d.PositionID');
        $this->db->join('dbo.OrganizationTable e','d.OrganizationUnitID = e.ID');
        $this->db->like('c.FullName',$Request);
        $query = $this->db->get();
        return $query->row_array();
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

      function get_latest_apv($ID){
        $this->db->select('a.*, b.FullName as PersonnelName, c.Name as Position');
        $this->db->from('dbo.MovementRequestApprovalTable a');
        $this->db->join('dbo.PersonnelTable b', 'a.EmployeeID = b.ID');
        $this->db->join('dbo.PositionTable c', 'a.PositionID = c.ID');
        $this->db->where('a.MovementRequestID',$ID);
        $this->db->order_by("ApprovalStatusID", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row_array();
      }

      function get_max_apv($ID){
        $this->db->select('a.*, b.FullName as PersonnelName, c.Name as Position');
        $this->db->from('dbo.MovementRequestApprovalTable a');
        $this->db->join('dbo.PersonnelTable b', 'a.EmployeeID = b.ID');
        $this->db->join('dbo.PositionTable c', 'a.PositionID = c.ID');
        $this->db->where('a.MovementRequestID',$ID);
        $this->db->order_by("ApprovalStatusID", "DESC");
        // $this->db->limit(3);
        $query = $this->db->get();
        return $query->row_array();
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

      function search_member($ID){
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

      public function myview_approve(){
        $requestor_id = $this->session->userdata('ID2');
        $data['status'] = $this->Movement_model->my_approve($requestor_id);
        //var_dump($data['need_app']);
        $data["header"] = $this->load->view('header/v_header','',TRUE);
        $data["sidebar"] = $this->load->view('sidebar/v_sidebar','',TRUE);
        $this->load->view('hr_movement/v_my_approve_request',$data);
      }

      
  function my_approve($ID){
    $q = "select a.*, c.FullName as RequestorName, d.Name as DeptName
          from dbo.MovementRequestTable a
          join dbo.PersonnelTable c
          on a.RequestorID = c.ID 
          join dbo.OrganizationTable d
          on a.RequestorDepartmentID = d.ID
          where RequestorID = $ID
          and a.ID in (
          select MovementRequestID from 
          (select MovementRequestID, max(ApprovalStatusID) as status from
          (select * 
          from dbo.MovementRequestApprovalTable
          where IsProcessed=1)X
          group BY  MovementRequestID)Y)";
     $query = $this->db->query($q);    
     return $query->result_array();
  }

  function my_hold($ID){
    $q = "select a.*,  c.FullName, d.Name as DeptName
              from dbo.MovementRequestTable a
              join dbo.PersonnelTable c
              on a.RequestorID = c.ID 
              join dbo.OrganizationTable d
              on a.RequestorDepartmentID = d.ID
              where RequestorID = '$ID'
              and a.ID in (
              select MovementRequestID from 
              (select MovementRequestID, max(ApprovalStatusID ) as status from
              (select * 
              from dbo.MovementRequestApprovalTable
              where IsHold=1)X
              group BY  MovementRequestID)Y)";
     $query = $this->db->query($q);    
     return $query->result_array();
  }

  function my_reject($ID){
    $q = "select a.*, c.FullName, d.Name as DeptName
           from dbo.MovementRequestTable a
           join dbo.PersonnelTable c
           on a.RequestorID = c.ID 
           join dbo.OrganizationTable d
           on a.RequestorDepartmentID = d.ID
           where RequestorID = '$ID'
           and a.ID in (
           select MovementRequestID from 
           (select MovementRequestID, max(ApprovalStatusID) as status from
            (select * 
            from dbo.MovementRequestApprovalTable
            where IsRejected=1)X
            group BY  MovementRequestID)Y)";
     $query = $this->db->query($q);    
     return $query->result_array();
  }
    

}
?>