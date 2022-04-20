<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CompanyModal extends CI_Model {
    public function AddCompany($data){
        $this->db->insert('me_company',$data);
        return true;
    }
    public function EditCompany($data,$EditCompany){
        $this->db->where('CompanyID', $EditCompany);
        $result = $this->db->update('me_company', $data);
        return true;
    }
    public function DeleteCompany($CompanyID){
        $update_rows = array(
			'CompanyStatus' => 0
		);
        $this->db->where('CompanyID', $CompanyID);
        $result = $this->db->update('me_company', $update_rows);
        return $result;
    }
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