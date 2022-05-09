<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class BrandModal extends CI_Model {
    public function AddBrand(){}
    public function EditBrand(){}
    public function DeleteBrand(){}
    public function ShowBrand(){
        $this->db->select('*');
        $this->db->from("me_brands");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function AddMarketingPreference(){}
    public function EditMarketingPreference(){}
    public function DeleteMarketingPreference(){}
    public function ShowMarketingPreference(){}
}

?>