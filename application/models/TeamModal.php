<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TeamModal extends CI_Model {
    public function AddTeam($data){
        $this->db->insert('me_team',$data);
        $insert_id = $this->db->insert_id();
        return true;
    }
    public function EditTeam($data,$EditTeam){
        $this->db->where('TeamID', $EditTeam);
        $result = $this->db->update('me_team', $data);
        return true;
    }
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
    public function ShowTeamBySearch($array){
        $this->db->select('me_team.TeamID,me_department.DepartmentName,me_team.*,me_company.CompanyName');
        $this->db->from("me_team");
        $this->db->join("me_department", 'me_department.DeparmentID=me_team.DeparmentID');
        $this->db->join("me_company", 'me_company.CompanyID=me_team.CompanyID');
        $this->db->where($array);
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>