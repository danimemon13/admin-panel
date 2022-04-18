<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class RegionModal extends CI_Model {
    public function AddRegion(){}
    public function EditRegion(){}
    public function DeleteRegion(){}
    public function ShowRegion(){
        $this->db->select('*');
        $this->db->from("me_region");
        $this->db->where("RegionStatus",1);
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>