<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class DepartmentModal extends CI_Model {
    public function AddDepartment($data){
        $this->db->insert('me_department',$data);
        return true;
    }
    public function EditDepartment(){}
    public function DeleteDepartment($DeparmentID){
        $update_rows = array(
			'DeparmentStatus' => 0
		);
        $this->db->where('DeparmentID', $DeparmentID);
        $result = $this->db->update('me_department', $update_rows);
        return $result;
    }
    public function ShowDepartment(){
        $this->db->select('*');
        $this->db->from("me_department");
        $this->db->where("DeparmentStatus",1);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function ShowDepartmentBySearch($array){
        $this->db->select('*');
        $this->db->from("me_department");
        $this->db->where($array);
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>