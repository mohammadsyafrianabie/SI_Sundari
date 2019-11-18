<?php
/**
* 
*/
class User extends CI_Controller
{
	
	public function __construct(){
      parent::__construct();
      $this->load->model('m_user');
                $this->load->helper('url');
  }
  public function index(){
  	$data['user'] = $this->m_user->get_User()->result();
		$this->load->view('view_user',$data);
  }
  
}
 
  ?>
