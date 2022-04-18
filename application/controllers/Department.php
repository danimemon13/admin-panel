<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

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
		$this->load->template('department/index','',1);
	}
	public function response(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$data["department"] = $this->departmentmodal->ShowDepartment();
		$data1 = [];
		$count=0;     
		foreach($data["department"] as $r) {
			$DeparmentID = $r["DeparmentID"];
			$btn = '<button type="button" class="btn btn-soft-primary waves-effect waves-light">';
			$btn .= '<i class="mdi mdi-pencil font-size-16 align-middle" style="line-height: 1;"></i>';
			$btn .= '</button>';
			$btn .= '<button onClick="delete_department(this.id)" id="'.$DeparmentID.'" type="button" class="btn btn-soft-danger waves-effect waves-light">';
			$btn .= '<i class="bx bx-block font-size-16 align-middle"></i>';
			$btn .= '</button>';
			$data1[] = array(
				++$count,
				$r["DepartmentName"],
				date("d-M-Y", strtotime($r["DeparmentCreated"])),
				$btn
			);
		}
		$result = array(
			"draw" => $draw,
			"recordsTotal" => count($data["department"]),
			"recordsFiltered" => count($data["department"]),
			"data" => $data1
		);
		echo json_encode($result);
	}
	public function add(){
		$this->load->template('department/add','',1);
	}
	public function process(){
		$data["save"] = $this->departmentmodal->AddDepartment($_POST);
		if($data["save"]==1){
			echo "Data Saved";
		}
		else{
			echo "Data Failed";
		}
		
	}
	public function delete(){
		$data["save"] = $this->departmentmodal->DeleteDepartment($_POST["DeparmentID"]);
		if($data["save"]==1){
			echo "Data Deleted Successfully";
		}
	}

	
}
