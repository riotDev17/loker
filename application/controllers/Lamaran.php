<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lamaran extends CI_Controller
{
    public function index()
    {
        $this->load->view('pelamar/profil/status_lamaran');
    }

    public function read()
    {
        $this->load->view('pelamar/profil/v_status');
    }
    public function status()
    {
    }
}
