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
			$data1[] = array(
				++$count,
				$r["DepartmentName"],
				date("d-M-Y", strtotime($r["DeparmentCreated"])),
				''
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

	
}
