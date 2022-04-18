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
	function __construct() {
        parent::__construct();
		
    }
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
			$CompanyID = $r["CompanyID"];
			$base= base_url().''.$r["CompanyLogo"];
			$btn = '<button type="button" class="btn btn-soft-primary waves-effect waves-light">';
			$btn .= '<i class="mdi mdi-pencil font-size-16 align-middle" style="line-height: 1;"></i>';
			$btn .= '</button>';
			$btn .= '<button onClick="delete_company(this.id)" id="'.$CompanyID.'" type="button" class="btn btn-soft-danger waves-effect waves-light">';
			$btn .= '<i class="bx bx-block font-size-16 align-middle"></i>';
			$btn .= '</button>';
			$data1[] = array(
				++$count,
				$r["CompanyName"],
				"<img src='$base' class='rounded avatar-lg'/>",
				$r["CompanyAddress"],
				date("d-M-Y", strtotime($r["CompanyCreated"])),
				$btn
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
	public function process(){
		$name =  $_FILES["CompanyLogo"]["name"];
		$newname = str_replace(" ","-",$this->input->post("CompanyName"));
		$path = "assets/images/company";
		$fileExt = pathinfo($_FILES["CompanyLogo"]["name"], PATHINFO_EXTENSION);
		//print_r($_FILES);
		$image_new=fileuploadCI('CompanyLogo',$path,$newname);
		if($image_new==1){
			$array = array(
				"CompanyName"=>$newname,
				"CompanyLogo"=>$path.'/'.$newname.'.'.$fileExt,
				"CompanyAddress"=>$this->input->post("CompanyAddress"),
				"CompanyStatus"=>1,
				"CompanyCreated"=>date('Y-m-d')
			);
			$data["save"] = $this->companymodal->AddCompany($array);
			if($data["save"]==1){
				echo "Data Saved";
			}
			else{
				echo "Data Failed";
			}
		}
	}
	public function delete(){
		$data["save"] = $this->companymodal->DeleteCompany($_POST["CompanyID"]);
		if($data["save"]==1){
			echo "Data Deleted Successfully";
		}
	}
	
}
