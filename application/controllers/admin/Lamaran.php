<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lamaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lamaran_model', 'lamaran');
    }
    public function index()
    {
        $data['lamaran'] = $this->lamaran->loker('loker');
        $data['totalpelamar'] = $this->lamaran->total();
        $this->load->view('admin/lamaran/index', $data);
    }
    public function lamaran($id)
    {
        $data['datapelamar'] = $this->lamaran->dataLamaran($id);
        $this->load->view('admin/lamaran/v_lamaran', $data);
    }
    public function detail_pelamar($id)
    {
        $data['detail'] = $this->lamaran->detailPelamar($id);
        $this->load->view('admin/lamaran/v_lamaran_user', $data);
    }
    public function status_lamaran()
    {
    }
}
