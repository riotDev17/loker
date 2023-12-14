<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loker extends CI_Controller
{
    public function index()
    {
        $this->load->view('admin/loker/index');
    }

    public function addloker()
    {
        $this->load->view('admin/loker/tambah_loker');
    }
}
