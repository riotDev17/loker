<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loker extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Pelamar_model");
        $this->load->model('Lamaran_model');
        $this->load->model('Riwayat_model');
        $this->load->model('Loker_model');
        $this->load->library('encryption');
    }

    function getsecurity($value = '')
    {
        $username = $this->session->userdata('username');
        if (empty($username)) {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }
    public function index()
    {
        $this->load->view('pelamar/detailJob/index');
    }
    public function read($encrypted_id, $nama_pekerjaan)
    {
        $decrypted_id = $this->encryption->decrypt(base64_decode(urldecode($encrypted_id)));
        if ($decrypted_id) {
            $data['record'] = $this->Loker_model->baca_detail($decrypted_id);
            $data['title'] = "Detail Job";
            $this->load->view('pelamar/detailJob/v_single', $data);
        } else {
            redirect('error_page');
        }
    }
}
