<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CompanyModal extends CI_Model {
    public function AddCompany($data){
        $this->db->insert('me_company',$data);
        return true;
    }
    public function EditCompany(){}
    public function DeleteCompany(){}
    public function ShowCompany(){
        $this->db->select('*');
        $this->db->from("me_company");
        $this->db->where("CompanyStatus",1);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function ShowCompanyBySearch($array){
        $this->db->select('*');
        $this->db->from("me_company");
        $this->db->where($array);
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>