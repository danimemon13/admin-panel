<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LoginModal extends CI_Model {
    public function AddIP(){}
    public function EditIP(){}
    public function DeleteIP(){}
    public function LoginUser($data){
        $this->db->select('*');
        $this->db->from("me_users");
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function UserDetail($data){
        $this->db->select('*');
        $this->db->from("me_user_profile");
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>