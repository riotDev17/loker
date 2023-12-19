<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Skills_model');
    }
    public function index()
    {
        $this->load->view('pelamar/auth/login_view');
    }
    public function registrasi()
    {
        $this->load->view('pelamar/auth/register_view');
    }
    public function profil()
    {
        $data['skill'] = $this->Skills_model->read('skill');
        $this->load->view('pelamar/profil/profil', $data);
    }
    
}
