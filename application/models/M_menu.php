<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class M_menu extends CI_Model
{
	
	public function get_Menu() 
	{
		return $this->db->get('menu');
	}
}