<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loker extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('Skills_model');
    }
    public function index()
    {
        $this->load->view('admin/loker/index');
    }

    public function addloker()
    {
        $data['skill'] = $this->Skills_model->read('skill');
        $data['kategori'] = $this->Kategori_model->read('kategori');
        $data['title'] = "Sistem Informasi Loker | Tambah Loker";
        $this->load->view('admin/loker/tambah_loker', $data);
    }
    public function insertloker()
    {
        $data = array(
            'nama_pekerjaan' =>  $this->input->post('nama_pekerjaan'),
            'nama_perusahaan' => $this->input->post('nama_perusahaan'),
            'lokasi' => $this->input->post('lokasi'),
            'deskripsi' => $this->input->post('deskripsi'),
            'gaji' => $this->input->post('gaji'),
            'benefit' => implode($this->input->post('benefit')),
            // 'tunjang_untung' => $this->input->post('tunjang_untung'),
            'hari_kerja' => $this->input->post('hari_kerja'),
            'jam_kerja' => $this->input->post('jam_kerja'),
            'syarat_lain' => $this->input->post('syarat_lain'),
            'pendidikan' => $this->input->post('pendidikan'),
            'usia' => $this->input->post('usia'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'pengalaman' => $this->input->post('pengalaman'),
            'kategori' => implode(' ', $this->input->post('kategori')),
            'skills' => implode(' ', $this->input->post('skills')),
            'tgl_loker' => date('Y-m-d'),
            'tgl_akhir_loker' => date('Y-m-d'),

        );
        $this->db->insert('loker', $data);
        $this->session->set_flashdata('message', 'swal("Berhasil", "Artikel Baru Berhasil Di Tambah Kan", "success");');
        redirect('admin/loker/', 'refresh');
    }
}
