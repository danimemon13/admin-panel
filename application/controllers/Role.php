<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

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
		
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='role' and me_menu_access.view_access =1";
        $data["access"] = $this->menumodal->ShowMenuBySearch($condition);
		if(!empty($data["access"])){
			$this->load->template('role/index','',1);
		}
		else{
			$this->load->template('error/permission',$data,1);
		}
		
	}
	public function response(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$data["role"] = $this->rolemodal->ShowRole();
		$data1 = [];
		$count=0;    
		$role_id = 1;
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='role' and me_menu_access.edit_access =1";
        $data["edit_access"] = $this->menumodal->ShowMenuBySearch($condition);
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='role' and me_menu_access.delete_access =1";
        $data["delete_access"] = $this->menumodal->ShowMenuBySearch($condition);
		foreach($data["role"] as $r) {
			$RoleID = $r["RoleID"];
			$btn = '';
			$RoleIDencode = urlencode(base64_encode($RoleID));
			if(!empty($data["edit_access"])){
				$btn .= '<a href="'.base_url().'role/edit/'.$RoleIDencode.'" class="btn btn-soft-primary waves-effect waves-light">';
				$btn .= '<i class="mdi mdi-pencil font-size-16 align-middle" style="line-height: 1;"></i>';
				$btn .= '</a>';
			}
			if(!empty($data["delete_access"])){
			$btn .= '<button onClick="delete_role(this.id)" id="'.$RoleID.'" type="button" class="btn btn-soft-danger waves-effect waves-light">';
			$btn .= '<i class="bx bx-block font-size-16 align-middle"></i>';
			$btn .= '</button>';
			}
			$data1[] = array(
				++$count,
				$r["DepartmentName"],
				$r["RoleName"],
				date("d-M-Y", strtotime($r["RoleCreated"])),
				$btn
			);
		}
		$result = array(
			"draw" => $draw,
			"recordsTotal" => count($data["role"]),
			"recordsFiltered" => count($data["role"]),
			"data" => $data1
		);
		echo json_encode($result);
	}
	public function delete(){
		$data["save"] = $this->rolemodal->DeleteRole($_POST["RoleID"]);
		if($data["save"]==1){
			echo "Data Deleted Successfully";
		}
	}
	public function add(){
		$role_id = 1;
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='role' and me_menu_access.add_access =1";
        $data["access"] = $this->menumodal->ShowMenuBySearch($condition);
		if(!empty($data["access"])){
			$data["department"] = $this->departmentmodal->ShowDepartment();
			$this->load->template('role/add',$data,1);
		}
		else{
			$this->load->template('error/permission',$data,1);
		}
		
	}
	public function process(){
		$data["save"] = $this->rolemodal->AddRole($_POST);
		if($data["save"]==1){
			echo "Data Saved";
		}
		else{
			echo "Data Failed";
		}
	}
    public function dashboard(){
        echo "Dashboard";
    }
	public function edit($RoleID){
		$RoleID = base64_decode(urldecode($RoleID));
		$role_id = 1;
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='role' and me_menu_access.edit_access =1";
        $data["access"] = $this->menumodal->ShowMenuBySearch($condition);
		$array = array("RoleID"=>$RoleID);
		$data["role"] = $this->rolemodal->ShowRoleBySearch($array);
		$data["department"] = $this->departmentmodal->ShowDepartment();
		if(!empty($data["access"])){
			$this->load->template('role/edit',$data,1);
		}
		else{
			$this->load->template('error/permission',$data,1);
		}
	}
	public function edit_process(){
		$RoleStatus = 0;
		$RoleID = $this->input->post("RoleID");
		if(isset($_POST["RoleStatus"])){
			$RoleStatus = 1;
		}
		$array = array(
			"RoleName"=>$this->input->post("RoleName"),
			"DeparmentID"=>$this->input->post("DeparmentID"),
			"RoleStatus"=>$RoleStatus,
		);
		$data["update"] = $this->rolemodal->EditRole($array,$RoleID);
		if($data["update"]==1){
			echo "Data Updated";
		}
		else{
			echo "Data Failed";
		}
	}
	
}
