<?php
/**
* 
*/
class home_pegawai extends CI_Controller
{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$data["title"] = "Home Pegawai - SI Sundari";
		$data["formname"] = "home";
		$this->load->view('pegawai/view_home_pegawai', $data);
	}
  
}
?>
