<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lamaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Pelamar_model");
        $this->load->model('Lamaran_model', 'lamaran');
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
        $data['lamaran'] = $this->lamaran->detailPelamarStatus($this->session->userdata('id_pelamar'));
        $this->load->view('pelamar/profil/status_lamaran', $data);
    }

    public function read($id, $nama_pekerjaan)
    {
        $data['lamaran'] = $this->lamaran->baca_detail($id);
        $data['title'] = "Detail Job";
        $this->load->view('pelamar/profil/v_status');
    }
    public function apply($id)
    {
        $user_id = $this->session->userdata('id_pelamar');
        if ($this->lamaran->SudahApply($user_id, $id)) {
            $this->session->set_flashdata('error', '<div class="alert alert-danger alert-pesan">Anda sudah mengajukan lamaran untuk lowongan pekerjaan ini sebelumnya.</div>');
            redirect('status');
        }
        $jumlah_lamaran = $this->lamaran->getJumlahLamaranByPelamar($user_id);
        if ($jumlah_lamaran < 3) {
            $data_pelamar = $this->lamaran->getDataPelamarById($user_id);
            if ($this->isDataPelamarComplete($data_pelamar)) {
                $kodeLamar = $this->get_kodLamar();
                $data = [
                    'id_lamaran' => $kodeLamar,
                    'id_loker' => $id,
                    'id_pelamar' => $user_id,
                    'status' => 0
                ];
                if ($this->lamaran->insertLamaran($data)) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success alert-pesan">Apply Loker Berhasil! Silahkan Tunggu Konfirmasi Admin.</div>');
                    redirect('status');
                } else {
                    $this->session->set_flashdata('error', '<div class="alert alert-danger alert-pesan">Apply Gagal! Silahkan Periksa Data Anda.</div>');
                    redirect('status');
                }
            } else {
                $this->session->set_flashdata('error', '<div class="alert alert-danger alert-pesan">Lengkapi profil Anda sebelum mengajukan lamaran.</div>');
                redirect('profil');
            }
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger alert-pesan">Anda sudah mengajukan 3 lamaran. Tidak dapat mengajukan lebih banyak lagi.</div>');
            redirect('status');
        }
    }

    private function isDataPelamarComplete($data_pelamar)
    {
        return
            !empty($data_pelamar['jenis_kelamin']) &&
            !empty($data_pelamar['alamat']) &&
            !empty($data_pelamar['no_telp']) &&
            !empty($data_pelamar['id_cv']);
    }


    function get_kodLamar()
    {
        $this->db->select_max('id_lamaran', 'max_code');
        $result = $this->db->get('lamaran')->row();

        $max_code = $result->max_code;

        if (!empty($max_code)) {
            $numeric_part = (int)substr($max_code, 3);
            $new_numeric_part = $numeric_part + 1;
            $new_kd = 'LMR' . sprintf("%03d", $new_numeric_part);
        } else {
            $new_kd = 'LMR001';
        }

        return $new_kd;
    }
}
