<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CompanyModal extends CI_Model {
    public function AddCompany(){}
    public function EditCompany(){}
    public function DeleteCompany(){}
    public function ShowCompany(){
        $this->db->select('*');
        $this->db->from("me_company");
        $this->db->where("CompanyStatus",1);
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>