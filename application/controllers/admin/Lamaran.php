<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lamaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lamaran_model', 'lamaran');
        $this->load->library('session');
    }
    public function index()
    {
        $data['lamaran'] = $this->lamaran->loker('loker');
        $data['totalpelamar'] = $this->lamaran->total();
        $this->load->view('admin/lamaran/index', $data);
    }
    public function lamaran($id, $nama_pekerjaan)
    {
        $data['datapelamar'] = $this->lamaran->dataLamaran($id);
        $this->load->view('admin/lamaran/v_lamaran', $data);
    }
    public function detail_pelamar($id, $pelamar)
    {
        $data['detail'] = $this->lamaran->detailPelamar($id);
        $this->load->view('admin/lamaran/v_lamaran_user', $data);
    }
    public function statuspelamar($action, $id_lamaran, $id_loker, $nama_pekerjaan)
    {
        if ($action == 'verifikasi') {
            $data = array(
                'status' => '1'
            );
            $this->lamaran->updateStatus($id_lamaran, $data);
            $this->session->set_flashdata('success', '<div class="alert alert-success alert-pesan">Data Pekerjaan berhasil Di Verifikasi.</div>');
            redirect('admin/dataloker/' . $id_loker . '/' . $nama_pekerjaan);
        } elseif ($action == 'perbaiki') {
            $data = array(
                'status' => '2'
            );
            $this->lamaran->updateStatus($id_lamaran, $data);
            $this->session->set_flashdata('success', '<div class="alert alert-success alert-pesan">Pesan Akan dikirim ke Pengguna.</div>');
            redirect('admin/dataloker/' . $id_loker . '/' . $nama_pekerjaan);
        }
    }
}
