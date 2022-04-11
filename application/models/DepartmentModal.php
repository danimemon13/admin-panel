<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class DepartmentModal extends CI_Model {
    public function AddDepartment(){}
    public function EditDepartment(){}
    public function DeleteDepartment(){}
    public function ShowDepartment(){
        $this->db->select('*');
        $this->db->from("me_department");
        $this->db->where("DeparmentStatus",1);
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>