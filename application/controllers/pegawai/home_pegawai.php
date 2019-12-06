<?php
/**
* 
*/
class home_pegawai extends CI_Controller
{
	
	public function __construct(){
		parent::__construct();
		// Cek Status login
		$status = $this->session->userdata("status");
		$akses = $this->session->userdata("hak_akses");
    	if (!isset($status) || $status != "login" || $akses != "pegawai"){
    		redirect('Auth');
    	}
	}
	
	public function index(){
		$data["title"] = "Home Pegawai - SI Sundari";
		$data["formname"] = "home";
		$this->load->view('pegawai/view_home_pegawai', $data);
	}
}
?>
