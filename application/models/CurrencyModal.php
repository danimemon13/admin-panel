<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CurrencyModal extends CI_Model {
    public function AddCurrency(){}
    public function EditCurrency(){}
    public function DeleteCurrency(){}
    public function ShowCurrency(){
        $this->db->select('*');
        $this->db->from("me_currency");
        $this->db->where("CurrencyStatus",1);
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>