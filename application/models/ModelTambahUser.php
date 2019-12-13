<?php
defined("BASEPATH") or exit("No direct access allowed");

class ModelTambahUser extends CI_Model
{
    private $table = "user";

    function tambahUser($datauser)
    {
        $this->db->insert($this->table, $datauser);
    }

    function getLastId(){
        $rows = $this->db->get($this->table)->result();
        foreach ($rows as $rw) {
            $tmp = $rw->id_user;
        }
        if (is_null($tmp)) {
            return $tmp = "u000";
        }else{
            return $tmp;
        }
    }

}
