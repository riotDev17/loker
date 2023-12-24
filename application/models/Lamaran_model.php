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
        $this->db->join('data_pelamar', 'lamaran.id_pelamar = data_pelamar.id_pelamar', 'left');
        $this->db->join('pelamar', 'data_pelamar.id_pelamar = pelamar.id_pelamar', 'left');
        $this->db->join('loker', 'lamaran.id_loker = loker.id_loker');
        $this->db->where('lamaran.id_loker', $id);
        return $this->db->get()->result_array();
    }
    public function detailPelamar($id)
    {
        $this->db->select('lamaran.*, loker.*, data_pelamar.*, pelamar.*');
        $this->db->from('lamaran');
        $this->db->join('data_pelamar', 'lamaran.id_pelamar = data_pelamar.id_pelamar');
        $this->db->join('pelamar', 'pelamar.id_pelamar = data_pelamar.id_pelamar');
        $this->db->join('loker', 'lamaran.id_loker = loker.id_loker');
        $this->db->where('loker.id_loker', $id);
        return $query = $this->db->get()->result_array();
    }
    public function detailPelamarStatus($id)
    {
        $this->db->select('lamaran.*, loker.*, data_pelamar.*, pelamar.*');
        $this->db->from('lamaran');
        $this->db->join('data_pelamar', 'lamaran.id_pelamar = data_pelamar.id_pelamar');
        $this->db->join('pelamar', 'pelamar.id_pelamar = data_pelamar.id_pelamar');
        $this->db->join('loker', 'lamaran.id_loker = loker.id_loker');
        $this->db->where('pelamar.id_pelamar', $id);
        return $query = $this->db->get()->result_array();
    }
    public function total()
    {
        $this->db->select('*');
        $this->db->from('lamaran');
        $this->db->join('data_pelamar', 'lamaran.id_pelamar = data_pelamar.id_pelamar');

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
    public function baca_detail($id)
    {
        $query = $this->db->query("SELECT * FROM loker WHERE id_loker='$id'");
        return $query->result_array();
    }

    public function getDataPelamarById($user_id)
    {
        $this->db->where('id_pelamar', $user_id);
        $query = $this->db->get('data_pelamar');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function getJumlahLamaranByPelamar($user_id)
    {
        $this->db->where('id_pelamar', $user_id);
        return $this->db->count_all_results('lamaran');
    }
    public function SudahApply($user_id, $job_id)
    {
        $this->db->where('id_pelamar', $user_id);
        $this->db->where('id_loker', $job_id);
        $result = $this->db->get('lamaran');

        return $result->num_rows() > 0;
    }

    // Fungsi untuk menambahkan lamaran
    public function insertLamaran($data)
    {
        return $this->db->insert('lamaran', $data);
    }
}
