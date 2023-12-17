<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelamar_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function read()
    {
        $this->db->select('*');
        $this->db->from('data_pelamar');
        $this->db->join('pelamar', 'pelamar.id_pelamar = data_pelamar.id_pelamar');
        return $query = $this->db->get()->result_array();
    }
    public function baca_detail($id)
    {
        $this->db->select('*');
        $this->db->from('data_pelamar');
        $this->db->join('pelamar', 'pelamar.id_pelamar = data_pelamar.id_pelamar');
        $this->db->where('pelamar.id_pelamar', $id);
        return $query = $this->db->get()->result_array();
    }
}
