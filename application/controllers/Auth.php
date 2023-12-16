<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->load->view('pelamar/auth/login_view');
    }
    public function registrasi()
    {
        $this->load->view('pelamar/auth/register_view');
    }
}
