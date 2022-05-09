<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class InvoiceModal extends CI_Model {
    public function AddInvoice($data){
        $this->db->insert('me_invoices',$data);
        return $this->db->insert_id();
    }
    public function CountInvoice(){
        $this->db->select('count(*) as count');
        $this->db->from("me_invoices");
        $query = $this->db->get();
        return $query->result_array();
    }
    public function ShowInvoice(){
        $this->db->select('me_invoices.*,me_customers.*,me_brands.BrandsName,me_leads.LeadCode');
        $this->db->from("me_invoices");
        $this->db->join("me_leads", 'me_leads.LeadID=me_invoices.LeadID');
        $this->db->join("me_customers", 'me_customers.CustomerID=me_leads.CustomerID');
        $this->db->join("me_brands", 'me_brands.BrandsID=me_invoices.BrandsID');
        $this->db->where("InvoiceDisplay",1);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function EditLead(){}
    public function DeleteLead(){}
    
}

?>