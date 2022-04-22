<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->session->set_userdata("is_login","1");
    }
	public function index()
	{
		if ( $this->session->userdata('is_login')){
			redirect('dashboard', 'refresh');
		}
	}
    public function dashboard(){
		
		$role_id = 1;
		//$this->session->userdata('menu_align');
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='dashboard' and me_menu_access.view_access =1";
        $data["access"] = $this->menumodal->ShowMenuBySearch($condition);
		if(!empty($data["access"])){
			$this->load->template('dashboard/admin','',1);
		}
		else{
			$this->load->template('error/permission',$data,1);
		}
    }
	public function backup(){
		$this->load->dbutil();

		$prefs = array(     
			'format'      => 'zip',             
			'filename'    => 'me_crm_db.sql'
			);


		$backup =& $this->dbutil->backup($prefs); 

		$db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
		$save = 'pathtobkfolder/'.$db_name;

		$this->load->helper('file');
		write_file($save, $backup); 


		$this->load->helper('download');
		force_download($db_name, $backup);
	}
	public function restore(){
		$this->load->template('backup/restore','',1);
		/*$sql_filename = 'me_crm_db.sql';
		$sql_contents = file_get_contents($sql_filename);
    	$sql_contents = explode(";", $sql_contents);
		foreach($sql_contents as $query)
		{

			$pos = strpos($query,'ci_sessions');
			var_dump($pos);
			if($pos == false)
			{
				$result = $this->db->query($query);
			}
			else
			{
				continue;
			}

		}*/

	}
	public function restore_progress(){
		$sql_contents = file_get_contents($_FILES["file"]["name"]);
		$sql_contents = explode(";", $sql_contents);
		$this->db->query("SET foreign_key_checks = 0");
		foreach($sql_contents as $query)
		{

			$pos = strpos($query,'ci_sessions');
			var_dump($pos);
			if($pos == false)
			{
				$result = $this->db->query($query);
			}
			else
			{
				continue;
			}

		}
		$this->db->query("SET foreign_key_checks = 1");
	}
	public function socket(){
		$this->load->view('socket');
	}
	public function notfound(){
		$this->load->view('error/404');
	}
	public function session($sessionname,$sessionvalue){
		$this->session->set_userdata($sessionname,$sessionvalue);
		redirect('dashboard', 'refresh');
	}
}
