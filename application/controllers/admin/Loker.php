<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loker extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('Loker_model');
        $this->load->model('Skills_model');
    }
    public function index()
    {
        $data['loker'] = $this->Loker_model->read('loker');

        $this->load->view('admin/loker/index', $data);
    }

    public function addloker()
    {
        $data['skill'] = $this->Skills_model->read('skill');
        $data['kategori'] = $this->Kategori_model->read('kategori');
        $data['title'] = "Sistem Informasi Loker | Tambah Loker";
        $this->load->view('admin/loker/tambah_loker', $data);
    }
    public function read($id)
    {
        $data['record'] = $this->Loker_model->baca_detail($id);
        $data['title'] = "Detail Job";
        $this->load->view('admin/loker/v_single_admin', $data);
    }
    public function insertloker()
    {
        $kode = $this->get_kod();
        $data = array(
            'id_loker' => 'LKR002',
            'nama_pekerjaan' =>  $this->input->post('nama_pekerjaan'),
            'nama_perusahaan' => $this->input->post('nama_perusahaan'),
            'lokasi' => $this->input->post('lokasi'),
            'deskripsi' => $this->input->post('deskripsi'),
            'gaji' => $this->input->post('gaji'),
            'tipe_kerja' => $this->input->post('tipe_kerja'),
            'kebijakan' => $this->input->post('kebijakan'),
            'benefit' => implode(' ', $this->input->post('benefit')),
            'hari_kerja' => $this->input->post('hari_awal') . '-' . $this->input->post('hari_akhir'),
            'jam_kerja' => $this->input->post('jam_awal') . '-' .  $this->input->post('jam_akhir'),
            'pendidikan' => $this->input->post('pendidikan'),
            'usia' => $this->input->post('usia'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'pengalaman' => $this->input->post('pengalaman'),
            'kategori' => implode(' ', $this->input->post('kategori')),
            'skills' => implode(' ', $this->input->post('skills')),
            'tgl_loker' => date('Y-m-d'),
            'tgl_akhir_loker' => $this->input->post('tgl_akhir_loker'),

        );
        // die(print_r($data));
        $this->db->insert('loker', $data);
        $this->session->set_flashdata('message', 'swal("Berhasil", "Artikel Baru Berhasil Di Tambah Kan", "success");');
        redirect('admin/loker/', 'refresh');
    }

    function get_kod()
    {
        $this->db->select_max('id_loker', 'max_code');
        $result = $this->db->get('loker')->row();

        $max_code = $result->max_code;

        if (!empty($max_code)) {
            $numeric_part = (int)substr($max_code, 3);
            $new_numeric_part = $numeric_part + 1;
            $new_kd = 'LKR' . sprintf("%03d", $new_numeric_part);
        } else {
            $new_kd = 'LKR001';
        }

        return $new_kd;
    }
    public function edit()
    {
        $data['skill'] = $this->Skills_model->read('skill');
        $data['kategori'] = $this->Kategori_model->read('kategori');
        $data['title'] = "Sistem Informasi Loker | Tambah Loker";
        $this->load->view('admin/loker/tambah_loker', $data);
    }
}
