<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    function getData($table = null, $where = null)
    {
        $this->db->from($table);
        $this->db->where($where);

        return $this->db->get();
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
    public function get_data_by_id($id)
    {
        return $this->db->get_where('data_pelamar', ['id_pelamar' => $id])->row_array();
    }
    public function updatedata($id, $data, $table)
    {
        $this->db->where('id_pelamar', $id);
        $this->db->update($table, $data);
    }
    public function updatefoto($id, $data, $table)
    {
        $this->db->where('id_pelamar', $id);
        $this->db->update($table, $data);
    }
    function update($table = null, $data = null, $where = null)
    {
        return $this->db->update($table, $data, $where);
    }
    public function getDataPelamarById($id_cv)
    {
        $this->db->where('id_cv', $id_cv);
        $query = $this->db->get('curriculum_vitae');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
}
