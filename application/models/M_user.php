<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class M_user extends CI_Model
{
	
	public function get_User() 
	{
		return $this->db->get('user');
	}
}