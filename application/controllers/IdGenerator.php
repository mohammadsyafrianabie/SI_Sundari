<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IdGenerator extends CI_Controller {
	// Harus diubah
	private $table = "menu";

	function __construct(){
		parent::__construct();
	}

	public function index(){
		// Generate id for user
		echo "New Generated Id: <br>";
		$this->triming();
	}

	public function getLastId(){
		$rows = $this->db->get($this->table)->result();
		foreach ($rows as $rw) {
			// Harus diubah
			$tmp = $rw->id_menu;
		}
		if (is_null($tmp)) {
			// Harus diubah
			return $tmp = "m000";
		}else{
			return $tmp;
		}
	}

	public function triming(){
		$last_id = $this->getLastId();
		// echo "Last Id: ". $last_id. "<br>";

		$len = strlen($last_id);
		$get_left = substr($last_id, 0, 1);
		$get_right = substr($last_id, 1, $len);
		// echo "Left :". $get_left. "<br>";
		// echo "Right :". $get_right. "<br>";
		// $pr_key_mark
		// $pr_key_number
		$new_number = intval($get_right) + 1;
		$new_id = $get_left. sprintf("%03d", $new_number);
		// echo "New Id : $new_id";
		return $new_id;
	}
}

?>