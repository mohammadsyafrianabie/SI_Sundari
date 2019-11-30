<?php
defined("BASEPATH") or exit("No direct access allowed");

class ModelTambahUser extends CI_Model
{
    private $table = "user";

    function tambahUser($id, $data)
    {
        $this->db->insert("id_user", $id);
        $this->db->query($this->table, $data);
    }

    function getDataById($id)
    {
        $this->db->where("id_user", $id);
        return $this->db->get($this->table)->result();
    }

    // Testing purpose only
    function getAllData()
    {
        return $this->db->get($this->table)->result();
    }
}
