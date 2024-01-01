<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lamaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('tglindo_helper');

        $this->load->model("Pelamar_model");
        $this->load->model('Riwayat_model', 'riwayat');
        $this->load->model('Lamaran_model', 'lamaran');
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
        $data['title'] = 'CariKerja | Lamaran';
        $data['lamaran'] = $this->lamaran->detailPelamarStatus($this->session->userdata('id_pelamar'));
        $data['riwayat'] = $this->riwayat->detailPelamarStatus($this->session->userdata('id_pelamar'));
        $this->load->view('pelamar/profil/status_lamaran', $data);
    }

    public function read($encrypted_id, $nama_pekerjaan)
    {
        $decrypted_id = $this->encryption->decrypt(base64_decode(urldecode($encrypted_id)));
        if ($decrypted_id) {
            $data['riwayat'] = $this->riwayat->detailPelamar($decrypted_id);
            $data['lamaran'] = $this->lamaran->detailPelamar($decrypted_id);
            $data['title'] = "Detail Job | $nama_pekerjaan";
            $this->load->view('pelamar/profil/v_status', $data);
        } else {
            redirect('error_page');
        }
    }
    public function apply($encrypted_id)
    {
        $decrypted_id = $this->encryption->decrypt(base64_decode(urldecode($encrypted_id)));

        if ($decrypted_id) {
            $user_id = $this->session->userdata('id_pelamar');
            if ($this->riwayat->isPelamarDiterima($user_id, $decrypted_id)) {
                $this->session->set_flashdata('error', '<div class="alert alert-danger alert-pesan">Anda sudah diterima pada lowongan pekerjaan ini dan tidak dapat mengajukan lamaran lagi.</div>');
                redirect('riwayat');
            }
            $jumlah_lamaran = $this->riwayat->getJumlahLamaranByPelamar($user_id);
            if ($jumlah_lamaran < 3) {
                $data_pelamar = $this->riwayat->getDataPelamarById($user_id);
                if ($this->isDataPelamarComplete($data_pelamar)) {
                    $kodeLamar = $this->get_kodLamar();
                    $data = [
                        'id_lamaran' => $kodeLamar,
                        'id_loker' => $decrypted_id,
                        'id_pelamar' => $user_id,
                        'status' => 0
                    ];
                    if ($this->riwayat->insertLamaran($data)) {
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
        } else {
            redirect('error_page');
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

    public function batal_lamar($encrypted_id)
    {
        $decrypted_id = $this->encryption->decrypt(base64_decode(urldecode($encrypted_id)));
        if ($decrypted_id) {
            $this->db->where('id_lamaran', $decrypted_id);
            $this->db->delete('lamaran');
            $this->session->set_flashdata('success', '<div class="alert alert-success alert-pesan">Data Lamaran berhasil dihapus.</div>');
            redirect('status');
        } else {
            redirect('error_page');
        }
    }
}
