<?php

class Login_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getIdByUsername($user){
        $this->db->select('id');
        $this->db->from('tbl_sites');
        $this->db->where('username', $user);

        $query = $this->db->get();
        $row = $query->row();
        return $row->id;
    }

    public function getPasswordById($userid){
        $this->db->select('password');
        $this->db->from('tbl_sites');
        $this->db->where('id', $userid);

        $query = $this->db->get();
        $row = $query->row();
        return $row->password;
    }

    public function getLogin($userid)
    {
        $this->db->select('log_id');
        $this->db->from('tbl_login');
        $this->db->where('log_site ', $userid);

        $query = $this->db->get();
        $row = $query->row();
        return $row->log_id;
    }

    public function updateLogin($ip, $userid)
    {
        $this->db->set('log_ip', $ip);
        $this->db->set('log_timestamp', date('Y-m-d G:i:s'));
        $this->db->where('log_site', $userid);
        $this->db->update('tbl_login');
    }

    public function createLogin($ip, $userid)
    {
        $data = array(
            'log_ip' => $ip ,
            'log_site' => $userid,
            'log_timestamp' => date('Y-m-d G:i:s')
        );

        $this->db->insert('tbl_login', $data);
    }
}