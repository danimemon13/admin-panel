<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads extends CI_Controller {

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
		
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='leads' and me_menu_access.view_access =1";
        $data["access"] = $this->menumodal->ShowMenuBySearch($condition);
		if(!empty($data["access"])){
			$this->load->template('leads/index',$data,1);
		}
		else{
			$this->load->template('error/permission',$data,1);
		}
	}
    public function response(){
        $draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$data["lead"] = $this->leadmodal->ShowLead();
		$data1 = [];
		$count=0;  
		$role_id = 1;
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='leads' and me_menu_access.edit_access =1";
        $data["edit_access"] = $this->menumodal->ShowMenuBySearch($condition);
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='leads' and me_menu_access.delete_access =1";
        $data["delete_access"] = $this->menumodal->ShowMenuBySearch($condition);
		   
		foreach($data["lead"] as $r) {
			$LeadID = $r["LeadID"];
			$LeadStatus = $r["LeadStatus"];
			$data["LeadStatus"] = $this->leadmodal->LeadStatus($LeadStatus);
			$LeadIDencode = urlencode(base64_encode($LeadID));
			$btn = '';
			$LeadClass = $data["LeadStatus"][0]["StatusClass"];
			$LeadStatusbtn = '<button type="button" class="'.$LeadClass.'">'.$data["LeadStatus"][0]["StatusName"].'</button>';
			if(!empty($data["edit_access"])){
				$btn .= '<a href="'.base_url().'leads/edit/'.$LeadIDencode.'" class="btn btn-soft-primary waves-effect waves-light">';
				$btn .= '<i class="mdi mdi-pencil font-size-16 align-middle" style="line-height: 1;"></i>';
				$btn .= '</a>';
			}
			if(!empty($data["delete_access"])){
			$btn .= '<button onClick="delete_department(this.id)" id="'.$LeadIDencode.'" type="button" class="btn btn-soft-danger waves-effect waves-light">';
			$btn .= '<i class="bx bx-block font-size-16 align-middle"></i>';
			$btn .= '</button>';
			}
			$data1[] = array(
				++$count,
				$r["LeadCode"],
				$r["CustomerName"],
				$r["CustomerEmail"],
				$r["CustomerNumber"],
				$LeadStatusbtn,
				str_replace("."," ",$r["UserName"]),
				$r["BrandsName"],
				date("d-M-Y", strtotime($r["CreatedAt"])),
				$btn
			);
		}
		$result = array(
			"draw" => $draw,
			"recordsTotal" => count($data["lead"]),
			"recordsFiltered" => count($data["lead"]),
			"data" => $data1
		);
		echo json_encode($result);
    }
    public function dashboard(){
        echo "Dashboard";
    }
	public function marketing_reference(){
		$this->load->template('brands/marketing_reference','',1);
	}
	public function add()
	{
		$role_id = 1;
		
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='leads' and me_menu_access.add_access =1";
        $data["access"] = $this->menumodal->ShowMenuBySearch($condition);
		$data["brands"] = $this->brandmodal->ShowBrand();
		if(!empty($data["access"])){
			$this->load->template('leads/add',$data,1);
		}
		else{
			$this->load->template('error/permission',$data,1);
		}
	}
	public function process(){
		$array = array(
			"CustomerName"=>$_POST["CustomerName"],
			"CustomerEmail"=>$_POST["CustomerEmail"],
			"CustomerNumber	"=>$_POST["CustomerNumber"],
		);
		$data["save"] = $this->leadmodal->AddCustomers($array);
		$data["countleads"] = $this->leadmodal->CountLeads();
		$old_lead_code = $data["countleads"][0]["count"]+1;
		$lead_code = 'LD-'.$old_lead_code;
		if($data["save"]>0){
			$array = array(
				"LeadCode"=>$lead_code,
				"CustomerID"=>$data["save"],
				"BrandsID"=>$_POST["BrandsID"],
				"CreatedAt"=>date('Y-m-d'),
				"LastUpdate"=>date('Y-m-d'),
				"CreatedBy"=>1,
				"UpdatedBy"=>1,
			);
			$data["save"] = $this->leadmodal->AddLeads($array);
			if($data["save"]>0){
				echo "Lead Created";
			}
		}
		else{

		}
	}
}
