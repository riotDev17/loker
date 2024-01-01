<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelamar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('Lamaran_model', 'lamaran');
        $this->load->model('Admin_model');
        $this->load->model('Pelamar_model');
        $this->load->library('encryption');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('session');
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
        $data['title'] = 'Pelamar';
        $data['datapelamar'] = $this->Pelamar_model->read('data_pelamar');
        $this->load->view('admin/pelamar/index', $data);
    }
    public function read($id)
    {
        $data['title'] = 'Detail Pelamar';
        $decrypted_id = $this->encryption->decrypt(base64_decode(urldecode($id)));
        if ($decrypted_id) {
            $data['pelamar'] = $this->Pelamar_model->baca_detail($decrypted_id);
            $this->load->view('admin/pelamar/v_pelamar', $data);
        } else {
            redirect('error_page');
        }
    }
    public function edit($id)
    {
        $decrypted_id = $this->encryption->decrypt(base64_decode(urldecode($id)));
        if ($decrypted_id) {
            $data['pelamar'] = $this->Pelamar_model->baca_detail($decrypted_id);
            $this->load->view('admin/pelamar/edit_pelamar', $data);
        } else {
            redirect('error_page');
        }
    }
    public function ubah($id)
    {
        $decrypted_id = $this->encryption->decrypt(base64_decode(urldecode($id)));
        if ($this->security->xss_clean($this->input->post('submit', TRUE)) == 'submit') {
            $this->form_validation->set_rules(
                'no_telp',
                'Nomor HP',
                "required|min_length[8]|max_length[15]|regex_match[/^[0-9]+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 8 karakter',
                    'max_length' => '{field} maksimal 15 karakter',
                    'regex_match' => '{field} hanya boleh angka'
                )
            );
            $this->form_validation->set_rules(
                'alamat',
                'Alamat',
                "required|min_length[10]|max_length[255]|regex_match[/^[A-Z a-z.0-9-,']+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 5 karakter',
                    'max_length' => '{field} maksimal 30 karakter',
                    'regex_match' => 'Data {field} yang anda masukkan tidak valid'
                )
            );
            // die(print_r($this->security->xss_clean($this->input->post('nama', TRUE))));
            if ($this->form_validation->run() == TRUE) {
                $update = [
                    'nama' => $this->security->xss_clean($this->input->post('nama', TRUE)),
                    'jenis_kelamin' => $this->security->xss_clean($this->input->post('jenis_kelamin', TRUE)),
                    'no_telp' => $this->security->xss_clean($this->input->post('no_telp', TRUE)),
                    'alamat' => $this->security->xss_clean($this->input->post('alamat', TRUE)),

                ];

                $where = [
                    'id_pelamar' =>
                    $decrypted_id
                ];

                $up = $this->Pelamar_model->update('data_pelamar', $update, $where);
                if ($up) {
                    $this->session->set_flashdata('success', 'Data berhasil diperbarui..');

                    redirect('admin/pelamar', 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal diperbarui..');
                    redirect('admin/pelamar', 'refresh');
                }
            }
        }

        if ($decrypted_id) {
            $data['pelamar'] = $this->Pelamar_model->baca_detail($decrypted_id);
            $this->load->view('admin/pelamar/edit_pelamar', $data);
        } else {
            redirect('error_page');
        }
    }
    public function delete($encrypted_id)
    {
        $decrypted_id = $this->encryption->decrypt(base64_decode(urldecode($encrypted_id)));
        if ($decrypted_id) {
            $this->db->where('id_pelamar', $decrypted_id);
            $this->db->delete('pelamar');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan">Data Pekerjaan berhasil dihapus.</div>');
            redirect('admin/pelamar');
        } else {
            redirect('error_page');
        }
    }
}
