<?php
defined("BASEPATH") or exit("No direct access allowed");

class ModelTambahMenu extends CI_Model
{
    private $table = "menu";

    function tambahMenu($datamenu)
    {
        $this->db->insert($this->table, $datamenu);
    }

    function getLastId(){
        $rows = $this->db->get($this->table)->result();
        foreach ($rows as $rw) {
            $tmp = $rw->id_menu;
        }
        if (is_null($tmp)) {
            return $tmp = "m000";
        }else{
            return $tmp;
        }
    }

}
