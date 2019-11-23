<?php
/**
* 
*/
class User extends CI_Controller
{
	public function __construct(){
        parent::__construct();
        $this->load->model('m_user');
    }

    public function index(){
    	$data["title"] = "User - SI Sundari";
    	$data["formname"] = "user";
    	$data['user'] = $this->m_user->get_User()->result();
    	$this->load->view('admin/view_user',$data);
    }
}
?>
