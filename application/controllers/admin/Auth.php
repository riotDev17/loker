<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('Admin_model');

        $this->load->library('session');
    }
    public function index()
    {
        $data['title'] = 'Login Admin';
        $this->load->view('admin/auth/login_view',$data);
    }
    public function login()
    {
        $username = strtolower($this->input->post('username'));
        $ambil = $this->db->get_where('admin', ['username' => $username])->row_array();
        $password = $this->input->post('password');
        if (password_verify($password, $ambil['password'])) {
            $this->db->where('username', $username);
            $query = $this->db->get('admin');
            foreach ($query->result() as $row) {
                $sess = array(
                    'id' => $row->id,
                    'username' => $row->username,
                    'nama' => $row->nama,
                    'is_admin' => $row->is_admin
                );
                $this->session->set_userdata($sess);
                $this->session->set_flashdata('success', '<div class="alert alert-success alert-pesan">Selamat Datang, ' . $this->session->userdata('username') . '</div>');
                redirect(base_url('admin/beranda'));
            }
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-success alert-pesan">Username atau Password Salah!.</div>');
            redirect('loginadmin');
        }
    }
    public function registrasi()
    {
        $data['title'] = 'Registrasi';
        $this->load->view('admin/auth/register_view', $data);
    }
    public function regis()
    {
        $rules = [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|min_length[5]|is_unique[admin.username]',
                'errors' => [
                    'is_unique' => 'Username sudah digunakan, silakan pilih username lain.'
                ]
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[4]|matches[password2]'
            ],
            [
                'field' => 'password2',
                'label' => 'Repeat Password',
                'rules' => 'trim|required|matches[password]'
            ]
        ];
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {

            $data = [
                'id' => 'adminganteng',
                'nama' => 'Admin Ganteng',
                'is_admin' => 1,
                'username' => strtolower($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            ];

            if ($this->db->insert('admin', $data)) {

                $this->session->set_flashdata('success', '<div class="alert alert-success alert-pesan">Registrasi Berhasil!.</div>');
                $this->load->view('admin/auth/login_view');
            } else {
                $this->session->set_flashdata('error', '<div class="alert alert-success alert-pesan">Registrasi Gagal!.</div>');
                $this->load->view('admin/auth/register_view');
            }
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-success alert-pesan">Registrasi Gagal!.</div>');
            $this->load->view('admin/auth/register_view');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('loginadmin'));
    }
}
