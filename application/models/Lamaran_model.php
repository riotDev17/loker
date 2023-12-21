<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lamaran_model extends CI_Model
{

    public function loker($table)
    {
        $this->db->from($table);

        $this->db->order_by('id_loker', 'DESC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }

            $query->free_result();
        } else {
            $data = NULL;
        }

        return $data;
    }
    public function dataLamaran($id)
    {
        $this->db->select('*');
        $this->db->from('lamaran');
        $this->db->join('data_pelamar', 'lamaran.id_data_pelamar = data_pelamar.id_data_pelamar', 'left');
        $this->db->join('pelamar', 'data_pelamar.id_pelamar = pelamar.id_pelamar', 'left');
        $this->db->join('loker', 'lamaran.id_loker = loker.id_loker');
        $this->db->where('lamaran.id_loker', $id);
        return $this->db->get()->result_array();
    }
    public function detailPelamar($id)
    {
        $this->db->select('lamaran.*, loker.*, data_pelamar.*, pelamar.*');
        $this->db->from('lamaran');
        $this->db->join('data_pelamar', 'lamaran.id_data_pelamar = data_pelamar.id_data_pelamar');
        $this->db->join('pelamar', 'pelamar.id_pelamar = data_pelamar.id_pelamar');
        $this->db->join('loker', 'lamaran.id_loker = loker.id_loker');
        $this->db->where('pelamar.id_pelamar', $id);
        return $query = $this->db->get()->result_array();
    }
    public function total()
    {
        $this->db->select('*');
        $this->db->from('lamaran');
        $this->db->join('data_pelamar', 'lamaran.id_data_pelamar = data_pelamar.id_data_pelamar');

        return $this->db->get()->result_array();
    }

    public function edit($table)
    {
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $query->free_result();
        } else {
            $data = NULL;
        }

        return $data;
    }
    public function pelamar($id)
    {
        $q = $this->db->query("SELECT * FROM lamaran WHERE id_loker='$id'");
        return $q->result();
    }
}
