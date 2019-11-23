<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
    	$data["title"] = "Login - SI Sundari";
        $this->load->view('auth/login', $data);
    }

    public function konfirmasi(){
    	$login_rules = array(
    		array(
    			"field" => "nama",
    			"label" => "Nama",
    			"rules" => "required"
    		),
    		array(
    			"field" => "password",
    			"label" => "Password",
    			"rules" => "required|min_length[8]|max_length[32]"
    		)
    	);
    	$this->form_validation->set_rules($login_rules);

    	if ($this->form_validation->run() == FALSE) {
    		$data["title"] = "Login - SI Sundari";
    		$this->load->view("auth/login", $data);
    	} else {
    		$nama = $this->input->post("nama");
	        $password = $this->input->post("password");
    	}
    }
}
