<?php
/**
* 
*/
class home_admin extends CI_Controller
{
	
	public function __construct(){
    	parent::__construct();
    	// Cek Status login
    	$status = $this->session->userdata("status");
    	$akses = $this->session->userdata("hak_akses");
    	if (!isset($status) || $status != "login" || $akses != "admin"){
    		redirect('Auth');
    	}
	}
	
	public function index(){
		$data["title"] = "Home Admin - SI Sundari";
		$data["formname"] = "home";
		$this->load->view('admin/view_home_admin', $data);
	}
  
}
 
?>
