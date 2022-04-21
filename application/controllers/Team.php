<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

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
		
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='team' and me_menu_access.view_access =1";
        $data["access"] = $this->menumodal->ShowMenuBySearch($condition);
		if(!empty($data["access"])){
			$this->load->template('team/index','',1);
		}
		else{
			$this->load->template('error/permission',$data,1);
		}
	}
	public function response(){
		$role_id = 1;
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='team' and me_menu_access.edit_access =1";
        $data["edit_access"] = $this->menumodal->ShowMenuBySearch($condition);
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='team' and me_menu_access.delete_access =1";
        $data["delete_access"] = $this->menumodal->ShowMenuBySearch($condition);
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$data["team"] = $this->teammodal->ShowTeam();
		$data1 = [];
		$count=0;     
		foreach($data["team"] as $r) {
			$TeamID = $r["TeamID"];
			$btn = '';
			$TeamIDencode = urlencode(base64_encode($TeamID));
			if(!empty($data["edit_access"])){
			$btn .= '<a href="'.base_url().'team/edit/'.$TeamIDencode.'" class="btn btn-soft-primary waves-effect waves-light">';
			$btn .= '<i class="mdi mdi-pencil font-size-16 align-middle" style="line-height: 1;"></i>';
			$btn .= '</a>';
			}
			if(!empty($data["delete_access"])){
				$btn .= '<button onClick="delete_team(this.id)" id="'.$TeamID.'" type="button" class="btn btn-soft-danger waves-effect waves-light">';
				$btn .= '<i class="bx bx-block font-size-16 align-middle"></i>';
				$btn .= '</button>';
			}


			$data1[] = array(
				++$count,
				$r["TeamName"],
				$r["DepartmentName"],
				$r["CompanyName"],
				date("d-M-Y", strtotime($r["TeamCreated"])),
				$btn
			);
		}
		$result = array(
			"draw" => $draw,
			"recordsTotal" => count($data["team"]),
			"recordsFiltered" => count($data["team"]),
			"data" => $data1
		);
		echo json_encode($result);
	}
	public function edit($TeamID){
		$TeamID = base64_decode(urldecode($TeamID));
		$role_id = 1;
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='team' and me_menu_access.edit_access =1";
        $data["access"] = $this->menumodal->ShowMenuBySearch($condition);
		$array = array("TeamID"=>$TeamID,"me_team.TeamStatus"=>1);
		$data["team"] = $this->teammodal->ShowTeamBySearch($array);
		$data["department"] = $this->departmentmodal->ShowDepartment();
		$data["company"] = $this->companymodal->ShowCompany();
		if(!empty($data["access"])){
			$this->load->template('team/edit',$data,1);
		}
		else{
			$this->load->template('error/permission',$data,1);
		}
	}
	public function edit_process(){
		$TeamStatus = 0;
		$TeamID = $this->input->post("TeamID");
		if(isset($_POST["TeamStatus"])){
			$TeamStatus = 1;
		}
		$array = array(
			"DeparmentID"=>$this->input->post("DeparmentID"),
			"CompanyID"=>$this->input->post("CompanyID"),
			"TeamName"=>$this->input->post("TeamName"),
			"TeamStatus"=>$TeamStatus,
		);
		$data["update"] = $this->teammodal->EditTeam($array,$TeamID);
		if($data["update"]==1){
			echo "Data Updated";
		}
		else{
			echo "Data Failed";
		}
	}
    public function dashboard(){
        echo "Dashboard";
    }
	public function add(){
		$role_id = 1;
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='team' and me_menu_access.add_access =1";
        $data["access"] = $this->menumodal->ShowMenuBySearch($condition);
		$data["department"] = $this->departmentmodal->ShowDepartment();
		$data["company"] = $this->companymodal->ShowCompany();
		if(!empty($data["access"])){
			$this->load->template('team/add',$data,1);
		}
		else{
			$this->load->template('error/permission',$data,1);
		}
	}
	public function process(){
		$data["save"] = $this->teammodal->AddTeam($_POST);
		if($data["save"]==1){
			echo "Data Saved";
		}
		else{
			echo "Data Failed";
		}
	}
	
}
