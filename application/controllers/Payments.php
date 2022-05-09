<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		echo "Company Controller";
	}
    public function dashboard(){
        echo "Dashboard";
    }
	public function marketing_reference(){
		$this->load->template('brands/marketing_reference','',1);
	}
	public function add(){
        $role_id = 1;
		
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='payments' and me_menu_access.add_access =1";
        $data["access"] = $this->menumodal->ShowMenuBySearch($condition);
		$data["account"] = $this->paymentmodal->showaccount();
        if(!empty($data["access"])){
			$this->load->template('payments/add',$data,1);
		}
		else{
			$this->load->template('error/permission',$data,1);
		}
    }
}
