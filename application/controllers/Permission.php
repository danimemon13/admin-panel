<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends CI_Controller {

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
    public function index(){
        $role_id = 1;
		
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='permission' and me_menu_access.view_access =1";
        $data["access"] = $this->menumodal->ShowMenuBySearch($condition);
        $data["role"] = $this->rolemodal->ShowRole();
		if(!empty($data["access"])){
			$this->load->template('permission/index',$data,1);
		}
		else{
			$this->load->template('error/permission',$data,1);
		}
    }
    public function permission_response(){
        $role_id = $_POST["RoleID"];
        $condition = "me_menu_access.RoleID =" . "'" . $role_id . "'";
        $data["access"] = $this->menumodal->ShowPermissions($condition);
        $response = '<div class="table-responsive">';
        $response .= '<table class="table table-bordered mb-0 table-striped">';
        $response .= '<thead>';
        $response .= '<tr>';
        $response .= '<th>#</th>';
        $response .= '<th>Menu Name</th>';
        $response .= '<th>Add Access</th>';
        $response .= '<th>Edit Access</th>';
        $response .= '<th>Delete Access</th>';
        $response .= '<th>View Access</th>';
        $response .= '</tr>';
        $response .= '</thead>';
        $response .= '<tbody>';
        $count = 0;
        foreach ($data["access"] as $value) {
            # code...
            $response .= '<tr>';
            $response .= '<td>'.++$count.'</td>';
            $response .= '<td>'.$value["MenuName"].'</td>';
            $response .= '<td>';
            if($value["available_add_access"]==1){
            
            $response .= '<div class="form-check">';
            $response .= '<input type="checkbox" class="form-check-input" id="formrow-customCheck">';
            $response .= '</div>';
             
            }
            $response .= '</td>';
            $response .= '<td>';
            if($value["available_edit_access"]==1){
            
            $response .= '<div class="form-check">';
            $response .= '<input type="checkbox" class="form-check-input" id="formrow-customCheck">';
            $response .= '</div>';
             
            }
            $response .= '</td>';
            $response .= '<td>';
            if($value["available_delete_access"]==1){
            
            $response .= '<div class="form-check">';
            $response .= '<input type="checkbox" class="form-check-input" id="formrow-customCheck">';
            $response .= '</div>';
             
            }
            $response .= '</td>';
            $response .= '<td>';
            if($value["available_view_access"]==1){
            
            $response .= '<div class="form-check">';
            $response .= '<input type="checkbox" class="form-check-input" id="formrow-customCheck">';
            $response .= '</div>';
             
            }
            $response .= '</td>';
            $response .= '</tr>';
        }
        $response .= '<tr>';
        $response .= '<td colspan="6">';
        $response .= '<div class="mb-3 float-right">';
        $response .= '<button type="submit" class="btn btn-primary w-md">Submit</button>';
        $response .= '</div>';
        $response .= '</td>';
        $response .= '</tr>';
        $response .= '</tbody>';
        $response .= '</table>';
        $response .= '</div>';
        echo $response;
        
    }
}
?>