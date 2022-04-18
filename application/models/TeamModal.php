<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TeamModal extends CI_Model {
    public function AddTeam(){}
    public function EditTeam(){}
    public function DeleteTeam(){}
    public function ShowTeam(){
        $this->db->select('me_team.TeamID,me_department.DepartmentName,me_team.*,me_company.CompanyName');
        $this->db->from("me_team");
        $this->db->join("me_department", 'me_department.DeparmentID=me_team.DeparmentID');
        $this->db->join("me_company", 'me_company.CompanyID=me_team.CompanyID');
        $this->db->where("me_team.TeamStatus",1);
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>