<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelamar_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->helper("file");
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
        
    }
    public function ubah($id)
    {
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

            if ($this->form_validation->run() == TRUE) {
                $update = [
                    'nama' => $this->security->xss_clean($this->input->post('nama', TRUE)),
                    'jenis_kelamin' => $this->security->xss_clean($this->input->post('jenis_kelamin', TRUE)),
                    'no_telp' => $this->security->xss_clean($this->input->post('no_telp', TRUE)),
                    'alamat' => $this->security->xss_clean($this->input->post('alamat', TRUE)),

                ];
                $where = [
                    'id_pelamar' =>
                    $this->security->xss_clean($this->input->post('id', TRUE))
                ];

                $up = $this->Pelamar_model->update('data_pelamar', $update, $where);
                if ($up) {
                    $this->session->set_flashdata('success', 'Data berhasil diperbarui..');

                    redirect('profil', 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal diperbarui..');
                }
            }
        }
        // $decrypted_id = $this->encryption->decrypt(base64_decode(urldecode($encrypted_id)));
        // if ($decrypted_id) {
        $data['title'] = 'Pelamar User';
        $data['pelamar'] = $this->Pelamar_model->baca_detail($id);
        $this->load->view('admin/pelamar/edit_pelamar', $data);
        // } else {
        //     redirect('error_page');
        // }
    }
}
