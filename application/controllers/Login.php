<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    public function login(){
        $this->load->view('login');
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }
    public function process(){
        //loginmodal->LoginUser
        $array = array(
            "UserName"=>$_POST["username"],
            "UserPassword"=>$_POST["password"],
            "UserStatus"=>1
        );
        $data["login"] = $this->loginmodal->LoginUser($array);
        if(!empty($data["login"])){
            $array = array("UserID"=>$data["login"][0]["UserID"]);
            $data["loginprofile"] = $this->loginmodal->UserDetail($array);
            $this->session->set_userdata("is_login",$data["login"]);
            $this->session->set_userdata("is_logindetail",$data["loginprofile"]);
            echo 1;
        }

    }
}