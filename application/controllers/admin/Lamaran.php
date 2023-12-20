<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lamaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('Pelamar_model');
        $this->load->model('Skills_model');
    }
    public function index()
    {
        $data['datapelamar'] = $this->Pelamar_model->read('data_pelamar');

        $this->load->view('admin/lamaran/index', $data);
    }
    public function read()
    {
       

        $this->load->view('admin/lamaran/v_lamaran');
    }
    public function status_lamaran()
    {
    }
}
