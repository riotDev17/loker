<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelamar extends CI_Controller
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

        $this->load->view('admin/pelamar/index', $data);
    }
    public function read($id)
    {
        $data['pelamar'] = $this->Pelamar_model->baca_detail($id);

        $this->load->view('admin/pelamar/v_pelamar', $data);
    }
}
