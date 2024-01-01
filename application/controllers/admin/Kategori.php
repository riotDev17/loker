<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
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
        $data['kategori'] = $this->Kategori_model->read('kategori');
        $data['title'] = 'Kategori';
        $this->load->view('admin/loker/kategori/index', $data);
    }
    public function tambah()
    {
        $data['title'] = 'Tambah Kategori';
        $this->load->view('admin/loker/kategori/tambah_kategori',$data);
    }
    public function insert()
    {
        $nama_kategori = $this->input->post("nama_kategori");
        $isDataExists = $this->isDataExists($nama_kategori);
        if ($isDataExists) {
            $this->session->set_flashdata('error', '<div class="alert alert-danger alert-pesan">Data Kategori sudah ada.</div>');
        } else {
            $data = [
                'nama_kategori' => $nama_kategori,
            ];
            $this->db->insert('kategori', $data);
            $this->session->set_flashdata('success', '<div class="alert alert-success alert-pesan">Data Kategori berhasil ditambahkan.</div>');
        }
        redirect('admin/kategori');
    }

    private function isDataExists($nama_kategori)
    {
        $query = $this->db->get_where('kategori', ['nama_kategori' => $nama_kategori]);
        return ($query->num_rows() > 0);
    }

    public function ubah($encrypted_id = 0)
    {
        $decrypted_id = $this->encryption->decrypt(base64_decode(urldecode($encrypted_id)));
        if ($decrypted_id) {
            $data['title'] = "Tambah Loker";
            if ($this->form_validation->run() == false) {
                $data = array(
                    'title' => 'Edit Kategori',
                    'record' => $this->Kategori_model->edit($decrypted_id, 'kategori'),
                );
                $this->load->view('admin/loker/kategori/edit_kategori', $data);
            } else {
                # code...
            }
        } else {
            redirect('error_page');
        }
    }
    public function update()
    {
        $id = $this->input->post('id_kategori');
        $data = [
            'nama_kategori' =>  $this->input->post('nama_kategori'),
        ];
        $this->Kategori_model->update($id, $data, 'kategori');
        $this->session->set_flashdata('success', '<div class="alert alert-success alert-pesan">Data Kategori berhasil diupdate.</div>');
        redirect('admin/kategori');
    }
    public function delete($encrypted_id)
    {
        $decrypted_id = $this->encryption->decrypt(base64_decode(urldecode($encrypted_id)));
        if ($decrypted_id) {
            $this->db->where('id_kategori', $decrypted_id);
            $this->db->delete('kategori');
            $this->session->set_flashdata('success', '<div class="alert alert-success alert-pesan">Data Kategori berhasil dihapus.</div>');
            redirect('admin/kategori');
        } else {
            redirect('error_page');
        }
    }
}
