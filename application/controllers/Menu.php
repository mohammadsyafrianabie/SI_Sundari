<?php
/**
* 
*/
class Menu extends CI_Controller
{
	
	public function __construct(){
      parent::__construct();
      $this->load->model('m_menu');
                $this->load->helper('url');
  }

  public function index(){
  	$data['menu'] = $this->m_menu->get_Menu()->result();
		$this->load->view('view_menu',$data);
  }
  
}
 
  ?>
