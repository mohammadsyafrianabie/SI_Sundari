<?php
/**
* 
*/
class home_admin extends CI_Controller
{
	
	public function __construct(){
    	parent::__construct();
	}
	
	public function index(){
		$data["title"] = "Home Admin - SI Sundari";
		$data["formname"] = "home";
		$this->load->view('admin/view_home_admin', $data);
	}
  
}
 
?>
