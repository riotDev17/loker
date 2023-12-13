<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lamaran extends CI_Controller
{
    public function index()
    {
        $this->load->view('pelamar/beranda_view');
    }
}
