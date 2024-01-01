<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('tglindo_helper');
        $this->load->model("Pelamar_model");
        $this->load->model('Riwayat_model', 'riwayat');
        $this->load->library('encryption');
        $this->getsecurity();
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
        $data['title'] = 'CariKerja | Riwayat Lamaran';
        $data['riwayat'] = $this->riwayat->detailPelamarStatus($this->session->userdata('id_pelamar'));
        $this->load->view('pelamar/profil/riwayat_lamaran', $data);
    }

    public function read($encrypted_id)
    {
        $decrypted_id = $this->encryption->decrypt(base64_decode(urldecode($encrypted_id)));
        if ($decrypted_id) {
            $data['riwayat'] = $this->riwayat->detailPelamar($decrypted_id);
            $data['title'] = "Detail Job";
            $this->load->view('pelamar/profil/v_status_riwayat', $data);
        } else {
            redirect('error_page');
        }
    }
}
