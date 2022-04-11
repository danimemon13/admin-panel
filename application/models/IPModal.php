<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class IPModal extends CI_Model {
    public function AddIP(){}
    public function EditIP(){}
    public function DeleteIP(){}
    public function ShowIP(){
        $this->db->select('*');
        $this->db->from("me_ip_address");
        $this->db->where("IPStatus",1);
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>