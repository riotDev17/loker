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
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['loker'] = $this->Loker_model->read('loker');
        $this->load->view('admin/loker/index', $data);
    }

    public function addloker()
    {
        if ($this->input->post('submit', TRUE) == 'submit') {
            $this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'required', array('required' => 'Isi %s terlebih dahulu.'));
            $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required', array('required' => 'Isi %s terlebih dahulu.'));
            $this->form_validation->set_rules('lokasi', 'Lokasi', 'required', array('required' => 'Isi %s terlebih dahulu.'));
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array('required' => 'Isi %s terlebih dahulu.'));
            $this->form_validation->set_rules('gaji', 'Gaji', 'required', array('required' => 'Isi %s terlebih dahulu.'));
            $this->form_validation->set_rules('tipe_kerja', 'Tipe Kerja', 'required', array('required' => 'Isi %s terlebih dahulu.'));
            $this->form_validation->set_rules('kebijakan', 'Kebijakan', 'required', array('required' => 'Isi %s terlebih dahulu.'));
            $this->form_validation->set_rules('benefit[]', 'Benefit', 'required', array('required' => 'Pilih minimal satu %s.'));
            $this->form_validation->set_rules('hari_awal', 'Hari Kerja Awal', 'required', array('required' => 'Isi %s terlebih dahulu.'));
            $this->form_validation->set_rules('hari_akhir', 'Hari Kerja Akhir', 'required', array('required' => 'Isi %s terlebih dahulu.'));
            $this->form_validation->set_rules('jam_awal', 'Jam Kerja Awal', 'required', array('required' => 'Isi %s terlebih dahulu.'));
            $this->form_validation->set_rules('jam_akhir', 'Jam Kerja Akhir', 'required', array('required' => 'Isi %s terlebih dahulu.'));
            $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required', array('required' => 'Isi %s terlebih dahulu.'));
            $this->form_validation->set_rules('usia', 'Usia', 'required', array('required' => 'Isi %s terlebih dahulu.'));
            $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', array('required' => 'Pilih minimal satu %s.'));
            $this->form_validation->set_rules('pengalaman', 'Pengalaman', 'required', array('required' => 'Isi %s terlebih dahulu.'));
            $this->form_validation->set_rules('kategori[]', 'Kategori', 'required', array('required' => 'Pilih minimal satu %s.'));
            $this->form_validation->set_rules('skills[]', 'Skills', 'required', array('required' => 'Pilih minimal satu %s.'));
            $this->form_validation->set_rules('tgl_akhir_loker', 'Tanggal Akhir Lowongan', 'required', array('required' => 'Isi %s terlebih dahulu.'));

            // Set pesan kesalahan umum jika tidak diisi
            $this->form_validation->set_message('required', 'Isi {field} terlebih dahulu.');

            if ($this->form_validation->run() == TRUE) {
                $deskripsi = strip_tags($this->input->post('deskripsi'), '<li>');
                $kode = $this->get_kod();
                $data = array(
                    'id_loker' => $kode,
                    'nama_pekerjaan' =>  $this->input->post('nama_pekerjaan'),
                    'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                    'lokasi' => $this->input->post('lokasi'),
                    'deskripsi' => $deskripsi,
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
                $this->db->insert('loker', $data);
                redirect('admin/loker/', 'refresh');
            }
        }
        $data['skill'] = $this->Skills_model->read('skill');
        $data['kategori'] = $this->Kategori_model->read('kategori');
        $data['title'] = "Sistem Informasi Loker | Tambah Loker";
        $this->load->view('admin/loker/tambah_loker', $data);
    }

    public function read($id)
    {
        $data['record'] = $this->Loker_model->baca_detail($id);
        $data['title'] = "Detail Job";
        $this->load->view('admin/loker/v_loker', $data);
    }
    public function insertloker()
    {
        $this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'required', array('required' => 'Isi %s terlebih dahulu.'));
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required', array('required' => 'Isi %s terlebih dahulu.'));
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required', array('required' => 'Isi %s terlebih dahulu.'));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array('required' => 'Isi %s terlebih dahulu.'));
        $this->form_validation->set_rules('gaji', 'Gaji', 'required', array('required' => 'Isi %s terlebih dahulu.'));
        $this->form_validation->set_rules('tipe_kerja', 'Tipe Kerja', 'required', array('required' => 'Isi %s terlebih dahulu.'));
        $this->form_validation->set_rules('kebijakan', 'Kebijakan', 'required', array('required' => 'Isi %s terlebih dahulu.'));
        $this->form_validation->set_rules('benefit[]', 'Benefit', 'required', array('required' => 'Pilih minimal satu %s.'));
        $this->form_validation->set_rules('hari_awal', 'Hari Kerja Awal', 'required', array('required' => 'Isi %s terlebih dahulu.'));
        $this->form_validation->set_rules('hari_akhir', 'Hari Kerja Akhir', 'required', array('required' => 'Isi %s terlebih dahulu.'));
        $this->form_validation->set_rules('jam_awal', 'Jam Kerja Awal', 'required', array('required' => 'Isi %s terlebih dahulu.'));
        $this->form_validation->set_rules('jam_akhir', 'Jam Kerja Akhir', 'required', array('required' => 'Isi %s terlebih dahulu.'));
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required', array('required' => 'Isi %s terlebih dahulu.'));
        $this->form_validation->set_rules('usia', 'Usia', 'required', array('required' => 'Isi %s terlebih dahulu.'));
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', array('required' => 'Pilih minimal satu %s.'));
        $this->form_validation->set_rules('pengalaman', 'Pengalaman', 'required', array('required' => 'Isi %s terlebih dahulu.'));
        $this->form_validation->set_rules('kategori[]', 'Kategori', 'required', array('required' => 'Pilih minimal satu %s.'));
        $this->form_validation->set_rules('skills[]', 'Skills', 'required', array('required' => 'Pilih minimal satu %s.'));
        $this->form_validation->set_rules('tgl_akhir_loker', 'Tanggal Akhir Lowongan', 'required', array('required' => 'Isi %s terlebih dahulu.'));

        // Set pesan kesalahan umum jika tidak diisi
        $this->form_validation->set_message('required', 'Isi {field} terlebih dahulu.');

        if ($this->form_validation->run() == TRUE) {
            $deskripsi = strip_tags($this->input->post('deskripsi'), '<li>');
            $kode = $this->get_kod();
            $data = array(
                'id_loker' => $kode,
                'nama_pekerjaan' =>  $this->input->post('nama_pekerjaan'),
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'lokasi' => $this->input->post('lokasi'),
                'deskripsi' => $deskripsi,
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
            $this->db->insert('loker', $data);
            redirect('admin/loker/', 'refresh');
        }
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

    public function updata()
    {
    }
    public function delete($id)
    {
        $this->db->where('id_loker', $id);
        $this->db->delete('loker');
        // $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan">Produk favorit anda berhasil dihapus.</div>');
        redirect('admin/loker');
    }
}
