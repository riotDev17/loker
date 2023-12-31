<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function search($nama_pekerjaan)
    {
        $this->db->group_start();
        $this->db->like('nama_pekerjaan', $nama_pekerjaan, 'both');
        $this->db->or_like('nama_perusahaan', $nama_pekerjaan, 'both');
        $this->db->or_like('lokasi', $nama_pekerjaan, 'both');
        $this->db->or_like('provinsi', $nama_pekerjaan, 'both');
        $this->db->or_like('kabupaten', $nama_pekerjaan, 'both');
        $this->db->or_like('kota', $nama_pekerjaan, 'both');
        $this->db->or_like('kategori', $nama_pekerjaan, 'both');
        $this->db->group_end();

        $this->db->order_by('id_loker', 'ASC');
        $this->db->limit(100);

        return $this->db->get('loker')->result();
    }
    public function get_items($search = '')
    {
        // Query untuk mengambil data dari database (contoh: tabel 'items') dengan filter pencarian
        $this->db->like('nama_pekerjaan', $search); // Gantilah 'field_name' dengan nama kolom yang sesuai
        $query = $this->db->get('loker');
        return $query->result();
    }
}
