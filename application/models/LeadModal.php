<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LeadModal extends CI_Model {
    public function AddLeads($data){
        $this->db->insert('me_leads',$data);
        return $this->db->insert_id();
    }
    public function AddCustomers($data){
        $this->db->insert('me_customers',$data);
        return $this->db->insert_id();
    }
    public function CountLeads(){
        $this->db->select('count(*) as count');
        $this->db->from("me_leads");
        $query = $this->db->get();
        return $query->result_array();
    }
    public function EditLead(){}
    public function DeleteLead(){}
    public function ShowLead(){
        $this->db->select('me_leads.*,me_customers.*,me_brands.BrandsName,me_users.UserName');
        $this->db->from("me_leads");
        $this->db->join("me_customers", 'me_customers.CustomerID=me_leads.CustomerID');
        $this->db->join("me_brands", 'me_brands.BrandsID=me_leads.BrandsID');
        $this->db->join("me_users", 'me_users.UserID=me_leads.CreatedBy');
        $this->db->where("LeadDisplay",1);
        $this->db->order_by("LeadID","DESC");
        $query = $this->db->get();
        return $query->result_array();
    }
    public function ShowLeadBySearch($data){
        $this->db->select('me_leads.*,me_customers.*,me_brands.BrandsName');
        $this->db->from("me_leads");
        $this->db->join("me_customers", 'me_customers.CustomerID=me_leads.CustomerID');
        $this->db->join("me_brands", 'me_brands.BrandsID=me_leads.BrandsID');
        $this->db->where("LeadDisplay",1);
        $this->db->where($data);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    //
    public function LeadStatus($LeadStatus){
        $this->db->select('*');
        $this->db->from("me_leads_status");
        $this->db->where("StatusID",$LeadStatus);
        
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>