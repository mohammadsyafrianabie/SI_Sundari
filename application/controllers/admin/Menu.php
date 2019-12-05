<?php
/**
* 
*/
class Menu extends CI_Controller
{
	
	public function __construct(){
        parent::__construct();
        $this->load->model('m_menu');
    }

    public function index(){
    	$data["title"] = "Menu - SI Sundari";
        $data["formname"] = "menu";
    	$data['menu'] = $this->m_menu->get_Menu()->result();
    	$this->load->view('admin/view_menu', $data);
    }
}
?>
