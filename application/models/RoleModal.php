<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class RoleModal extends CI_Model {
    public function AddRole($data){
        $this->db->insert('me_role',$data);
        $insert_id = $this->db->insert_id();
        $this->RoleMenuadd($insert_id);
        return true;
    }
    public function EditRole(){}
    public function DeleteRole($RoleID){
        $update_rows = array(
			'RoleStatus' => 0
		);
        $this->db->where('RoleID', $RoleID);
        $result = $this->db->update('me_role', $update_rows);
        return $result;
    }
    public function ShowRole(){
        $this->db->select('me_role.RoleID,me_department.DepartmentName,me_role.*');
        $this->db->from("me_role");
        $this->db->join("me_department", 'me_department.DeparmentID=me_role.DeparmentID');
        $this->db->where("me_role.RoleStatus",1);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function RoleMenuadd($insert_id){
        $this->db->select('*');
        $this->db->from("me_menu");
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $results) {
            # code...
            $array = array(
                'RoleID'=>$insert_id,
                'MenuID'=>$results["MenuID"],
                'add_access'=>0,
                'edit_access'=>0,
                'delete_access'=>0,
                'view_access'=>0,
            );
            $this->db->insert('me_menu_access',$array);
        }
        return true;
        
    }
}

?>