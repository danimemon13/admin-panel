<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PaymentModal extends CI_Model {
    public function AddPaymentMethod(){}
    public function EditPaymentMethod(){}
    public function DeletePaymentMethod(){}
    public function ShowPaymentMethod(){}
    public function showaccount(){
        $this->db->select('*');
        $this->db->from("me_accounts");
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>