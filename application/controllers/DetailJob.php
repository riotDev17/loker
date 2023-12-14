<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailJob extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Loker_model');
    }
    public function index()
    {
        $this->load->view('pelamar/detailJob/index');
    }
    public function read($id)
    {
        $data['record'] = $this->Loker_model->baca_detail($id);
        $data['title'] = "Detail Job";
        $this->load->view('pelamar/detailJob/v_single', $data);
    }
}
