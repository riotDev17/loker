<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loker extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('Loker_model');
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('encryption');
        $this->getsecurity();
    }
    function getsecurity($value = '')
    {
        $is_admin = $this->session->userdata('is_admin') == 1;
        if (empty($is_admin)) {
            $this->session->sess_destroy();
            redirect('loginadmin');
        }
    }
    public function index()
    {
        $data['loker'] = $this->Loker_model->read('loker');
        $this->load->view('admin/loker/index', $data);
    }

    public function addloker()
    {

        $data['kategori'] = $this->Kategori_model->read('kategori');
        $data['title'] = "Sistem Informasi Loker | Tambah Loker";
        $this->load->view('admin/loker/tambah_loker', $data);
    }

    public function read($encrypted_id)
    {
        $decrypted_id = $this->encryption->decrypt(base64_decode(urldecode($encrypted_id)));
        if ($decrypted_id) {
            $data['record'] = $this->Loker_model->baca_detail($decrypted_id);
            $data['title'] = "Detail Job";
            $this->load->view('admin/loker/v_loker', $data);
        } else {
            redirect('error_page');
        }
    }
    public function insertloker()
    {

        $deskripsi = strip_tags($this->input->post('deskripsi'), '<li>');
        $kode = $this->get_kod();
        $data = array(
            'id_loker' => $kode,
            'nama_pekerjaan' =>  $this->input->post('nama_pekerjaan'),
            'nama_perusahaan' => $this->input->post('nama_perusahaan'),
            'provinsi' => strtolower($this->input->post('provinsi')),
            'kabupaten' => strtolower($this->input->post('kab')),
            'kota' => strtolower($this->input->post('kota')),
            'lokasi' => $this->input->post('lokasi'),
            'gaji' => $this->input->post('gajiawal') . ' - ' . $this->input->post('gajiakhir'),
            'benefit' => implode(' ', $this->input->post('benefit')),
            'tunjangan' => $this->input->post('tunjangan'),
            'keuntungan' => $this->input->post('keuntungan'),
            'deskripsi' => $deskripsi,
            'tipe_kerja' => $this->input->post('tipe_kerja'),
            'kebijakan' => $this->input->post('kebijakan'),
            'hari_kerja' => $this->input->post('hari_awal') . '-' . $this->input->post('hari_akhir'),
            'jam_kerja' => $this->input->post('jam_awal') . '-' .  $this->input->post('jam_akhir'),
            'pendidikan' => $this->input->post('pendidikan'),
            'pengalaman' => $this->input->post('pengalaman'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'usia' => $this->input->post('usia'),
            'skills' => implode(' ', $this->input->post('skills')),
            'kategori' => implode(' ', $this->input->post('kategori')),
            'tgl_loker' => date('Y-m-d'),
            'tgl_akhir_loker' => $this->input->post('tgl_akhir_loker'),
        );
        $this->db->insert('loker', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan">Data Pekerjaan berhasil ditambah.</div>');
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

    public function edit($encrypted_id = 0)
    {
        $decrypted_id = $this->encryption->decrypt(base64_decode(urldecode($encrypted_id)));
        if ($decrypted_id) {
            $data['title'] = "Sistem Informasi Loker | Tambah Loker";
            if ($this->form_validation->run() == false) {
                $data = array(
                    'title' => 'Sistem Informasi Loker | Edit Loker',
                    'record' => $this->Loker_model->edit($decrypted_id, 'loker'),
                    'kategori' => $this->Kategori_model->read('kategori'),
                );
                $this->load->view('admin/loker/edit_loker', $data);
            } else {
                # code...
            }
        } else {
            redirect('error_page');
        }
    }

    public function update()
    {

        $id = $this->input->post('id_loker');
        $deskripsi = strip_tags($this->input->post('deskripsi'), '<li>');
        $data = array(
            'nama_pekerjaan' =>  $this->input->post('nama_pekerjaan'),
            'nama_perusahaan' => $this->input->post('nama_perusahaan'),
            'provinsi' => strtolower($this->input->post('provinsi')),
            'kabupaten' => strtolower($this->input->post('kab')),
            'kota' => strtolower($this->input->post('kota')),
            'lokasi' => $this->input->post('lokasi'),
            'gaji' => $this->input->post('gajiawal') . ' - ' . $this->input->post('gajiakhir'),
            'benefit' => implode(' ', $this->input->post('benefit')),
            'tunjangan' => $this->input->post('tunjangan'),
            'keuntungan' => $this->input->post('keuntungan'),
            'deskripsi' => $deskripsi,
            'tipe_kerja' => $this->input->post('tipe_kerja'),
            'kebijakan' => $this->input->post('kebijakan'),
            'hari_kerja' => $this->input->post('hari_awal') . '-' . $this->input->post('hari_akhir'),
            'jam_kerja' => $this->input->post('jam_awal') . '-' .  $this->input->post('jam_akhir'),
            'pendidikan' => $this->input->post('pendidikan'),
            'pengalaman' => $this->input->post('pengalaman'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'usia' => $this->input->post('usia'),
            'skills' => implode(' ', $this->input->post('skills')),
            'kategori' => implode(' ', $this->input->post('kategori')),
            'tgl_loker' => date('Y-m-d'),
            'tgl_akhir_loker' => $this->input->post('tgl_akhir_loker'),
        );
        $this->Loker_model->update($id, $data, 'loker');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan">Data Pekerjaan berhasil diupdate.</div>');
        redirect('admin/loker');
    }
    public function delete($encrypted_id)
    {
        $decrypted_id = $this->encryption->decrypt(base64_decode(urldecode($encrypted_id)));
        if ($decrypted_id) {
            $this->db->where('id_loker', $decrypted_id);
            $this->db->delete('loker');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan">Data Pekerjaan berhasil dihapus.</div>');
            redirect('admin/loker');
        } else {
            redirect('error_page');
        }
    }
}
