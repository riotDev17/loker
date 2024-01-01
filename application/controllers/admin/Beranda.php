<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Loker_model');
        $this->load->model('Lamaran_model', 'lamaran');
        $this->load->model('Pelamar_model');
        $this->load->model('Admin_model');

        $this->getsecurity();
    }
    function getsecurity($value = '')
    {
        $is_admin = $this->session->userdata('is_admin') == 1;
        if (empty($is_admin)) {
            $this->session->sess_destroy();
            redirect('loginadmin');
        }
    }
    public function index()
    {
        $data['title'] = 'Beranda';
        $data['pelamar'] = $this->Pelamar_model->read('data_pelamar');
        $data['loker'] = $this->Loker_model->read('loker');
        $data['lamaran'] = $this->lamaran->read('lamaran');
        $this->load->view('admin/index', $data);
    }
}
