<?php

class Site_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getKeyById($id)
    {
        $this->db->select('key');
        $this->db->from('tbl_sites');
        $this->db->where('id', $id);

        $query = $this->db->get();
        $row = $query->row();
        return $row->key;
    }

    public function getUsernameById($id)
    {
        $this->db->select('username');
        $this->db->from('tbl_sites');
        $this->db->where('id', $id);

        $query = $this->db->get();
        $row = $query->row();
        return $row->username;
    }

    public function getNameById($id)
    {
        $this->db->select('name');
        $this->db->from('tbl_sites');
        $this->db->where('id', $id);

        $query = $this->db->get();
        $row = $query->row();
        return $row->name;
    }

    public function changePassword($newPass, $userid)
    {
        $pass = password_hash($newPass, PASSWORD_DEFAULT);
        $data = array(
            'password' => $pass
        );
        $this->db->where('id', $userid);
        $this->db->update('tbl_sites', $data);
    }

    public function changeWifiPassword($newPass, $userid)
    {
        $data = array(
            'wifi_pw' => $newPass
        );
        $this->db->where('id', $userid);
        $this->db->update('tbl_sites', $data);
    }


    public function changePasswordddd()
    {
        $pass = password_hash('Opti369', PASSWORD_DEFAULT);
        $data = array(
            'password' => $pass
        );
        $this->db->where('id', 13);
        $this->db->update('tbl_sites', $data);
    }

    public function getWifiPassword()
    {
        $this->db->select('wifi_pw');
        $this->db->from('tbl_sites');
        $this->db->where('id', $_SESSION['uid']);

        $query = $this->db->get();
        $row = $query->row();
        return $row->wifi_pw;
    }
}