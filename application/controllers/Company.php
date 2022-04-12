<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

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
		$role_id = 1;
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='company' and me_menu_access.view_access =1";
        $data["access"] = $this->menumodal->ShowMenuBySearch($condition);
		if(!empty($data["access"])){
			$this->load->template('company/index',$data,1);
		}
		else{
			$this->load->template('error/permission',$data,1);
		}
		
	}
	public function response(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$data["company"] = $this->companymodal->ShowCompany();
		$data1 = [];
		$count=0;     
		foreach($data["company"] as $r) {
			$base= base_url()."assets/images/".$r["CompanyLogo"];
			$data1[] = array(
				++$count,
				$r["CompanyName"],
				"<img src='$base' class='rounded avatar-lg'/>",
				$r["CompanyAddress"],
				date("d-M-Y", strtotime($r["CompanyCreated"])),
				''
			);
		}
		$result = array(
			"draw" => $draw,
			"recordsTotal" => count($data["company"]),
			"recordsFiltered" => count($data["company"]),
			"data" => $data1
		);
		echo json_encode($result);
	}
	public function add(){
		$role_id = 1;
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='company' and me_menu_access.add_access =1";
        $data["access"] = $this->menumodal->ShowMenuBySearch($condition);
		if(!empty($data["access"])){
			$this->load->template('company/add',$data,1);
		}
		else{
			$this->load->template('error/permission',$data,1);
		}
	}
	
}
