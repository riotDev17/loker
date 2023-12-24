<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('session');
    }
    public function index()
    {
        $this->load->view('pelamar/auth/login_view');
    }
    public function login()
    {
        $username = strtolower($this->input->post('username'));
        $ambil = $this->db->get_where('pelamar', ['username' => $username])->row_array();
        $password = $this->input->post('password');
        if (password_verify($password, $ambil['password'])) {
            $this->db->where('username', $username);
            $query = $this->db->get('pelamar');
            foreach ($query->result() as $row) {
                $additionalInfo = $this->db->get_where('data_pelamar', ['id_pelamar' => $row->id_pelamar])->row();
                $sess = array(
                    'id_pelamar' => $row->id_pelamar,
                    'username' => $row->username,
                    'email' => $row->email,
                    'photo' => $additionalInfo->photo,
                );
                $this->session->set_userdata($sess);
                $this->session->set_flashdata('success', '<div class="alert alert-success alert-pesan">Selamat Datang, ' . $this->session->userdata('username') . '</div>');
                redirect(base_url('beranda'));
            }
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-success alert-pesan">Username atau Password Salah!.</div>');
            redirect('auth');
        }
    }
    public function registrasi()
    {
        $this->load->view('pelamar/auth/register_view');
    }
    public function regis()
    {

        $rules = [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|min_length[5]|is_unique[pelamar.username]',
                'errors' => [
                    'is_unique' => 'Username sudah digunakan, silakan pilih username lain.'
                ]
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|min_length[5]|is_unique[pelamar.email]',
                'errors' => [
                    'is_unique' => 'Email sudah digunakan, silakan pilih username lain.'
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
            $kodeUSER = $this->get_kodUSER();
            $kodeUSERD = $this->get_kodUSERDATA();
            $data = [
                'id_pelamar' => $kodeUSER,
                'email' => $this->security->xss_clean($this->input->post('email', TRUE)),
                'username' => strtolower($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            ];
            $datapelamar = [
                'id_data_pelamar' => $kodeUSERD,
                'id_pelamar' => $data['id_pelamar'],
                'jenis_kelamin' => 'Laki-laki',
                'photo' => 'default.jpg',
            ];

            if ($this->db->insert('pelamar', $data)) {
                $this->db->insert('data_pelamar', $datapelamar);
                $this->session->set_flashdata('success', '<div class="alert alert-success alert-pesan">Registrasi Berhasil!.</div>');
                redirect('login');
            } else {
                $this->session->set_flashdata('error', '<div class="alert alert-success alert-pesan">Registrasi Gagal!.</div>');
                redirect('registrasi');
            }
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-success alert-pesan">Registrasi Gagal!.</div>');
            redirect('registrasi');
        }
    }
    function get_kodUSER()
    {
        $this->db->select_max('id_pelamar', 'max_code');
        $result = $this->db->get('pelamar')->row();

        $max_code = $result->max_code;

        if (!empty($max_code)) {
            $numeric_part = (int)substr($max_code, 3);
            $new_numeric_part = $numeric_part + 1;
            $new_kd = 'USR' . sprintf("%03d", $new_numeric_part);
        } else {
            $new_kd = 'USR001';
        }

        return $new_kd;
    }
    public function get_kodUSERDATA()
    {
        $this->db->select_max('id_data_pelamar', 'max_code');
        $result = $this->db->get('data_pelamar')->row();

        $max_code = $result->max_code;

        if (!empty($max_code)) {
            $numeric_part = (int)substr($max_code, 3);
            $new_numeric_part = $numeric_part + 1;
            $new_kd = 'DTS' . sprintf("%03d", $new_numeric_part);
        } else {
            $new_kd = 'DTS001';
        }

        return $new_kd;
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('beranda'));
    }
}
