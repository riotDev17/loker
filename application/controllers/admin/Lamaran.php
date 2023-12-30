<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lamaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('tglindo_helper');
        $this->load->model('Admin_model');
        $this->load->model('Lamaran_model', 'lamaran');
        $this->load->library('session');
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
    public function statuspelamar($action, $id_lamaran, $id_loker, $id_pelamar, $nama_pekerjaan)
    {
        if ($action == 'verifikasi') {
            $data = array(
                'id_lamaran' => $id_lamaran,
                'id_pelamar' => $id_pelamar,
                'id_loker' => $id_loker,
                'status' => '1',
            );
            // $this->lamaran->updateStatus($id_lamaran, $data);
            $this->db->insert('riwayat_lamaran', $data);
            $this->delete($id_lamaran);
            $this->session->set_flashdata('success', '<div class="alert alert-success alert-pesan">Data Pekerjaan berhasil Di Verifikasi.</div>');
            redirect('admin/dataloker/' . $id_loker . '/' . $nama_pekerjaan);
        } elseif ($action == 'perbaiki') {
            $data = array(
                'id_lamaran' => $id_lamaran,
                'id_pelamar' => $id_pelamar,
                'id_loker' => $id_loker,
                'status' => '2',
            );
            // $this->lamaran->updateStatus($id_lamaran, $data);
            $this->db->insert('riwayat_lamaran', $data);
            $this->delete($id_lamaran);
            $this->session->set_flashdata('success', '<div class="alert alert-success alert-pesan">Pesan Akan dikirim ke Pengguna.</div>');
            redirect('admin/dataloker/' . $id_loker . '/' . $nama_pekerjaan);
        }
    }
    public function delete($id_lamaran)
    {
        $this->db->where('id_lamaran', $id_lamaran);
        $this->db->delete('lamaran');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-pesan">Data Pekerjaan berhasil dihapus.</div>');
    }
}
