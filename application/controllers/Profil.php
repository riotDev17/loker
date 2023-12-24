<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelamar_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->helper("file");
        $this->getsecurity();
    }
    public function index()
    {
    }
    function getsecurity($value = '')
    {
        $username = $this->session->userdata('username');
        if (empty($username)) {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

    public function ubah()
    {
        $getData = $this->Pelamar_model->getData('data_pelamar', ['id_pelamar' => $this->session->userdata('id_pelamar')]);
        if ($this->security->xss_clean($this->input->post('submit', TRUE)) == 'submit') {
            $p = $getData->row();
            $this->form_validation->set_rules(
                'no_telp',
                'Nomor HP',
                "required|min_length[8]|max_length[15]|regex_match[/^[0-9]+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 8 karakter',
                    'max_length' => '{field} maksimal 15 karakter',
                    'regex_match' => '{field} hanya boleh angka'
                )
            );
            $this->form_validation->set_rules(
                'alamat',
                'Alamat',
                "required|min_length[10]|max_length[255]|regex_match[/^[A-Z a-z.0-9-,']+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 5 karakter',
                    'max_length' => '{field} maksimal 30 karakter',
                    'regex_match' => 'Data {field} yang anda masukkan tidak valid'
                )
            );
            $this->form_validation->set_rules(
                'cvuser',
                'Curriculum Vitae',
                'callback_validate_cv_upload'
            );
            if ($this->form_validation->run() == TRUE) {
                // Foto
                $foto = $p->photo;
                $config['upload_path']      = './assets/img/pelamar/';
                $config['allowed_types']    = 'jpg|png|jpeg';
                $config['max_size']         = '2048';
                $config['file_name']        =  'foto_' . $this->session->userdata('username');

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('fotouser')) {

                    $b = $this->upload->data();
                    $foto = $b['file_name'];
                    $this->load->library('image_lib');
                    $config2['image_library']   = 'gd2';
                    $config2['source_image']    = './assets/img/pelamar/' . $foto;
                    $config2['new_image']       = './assets/img/pelamar/' . $foto;
                    $config2['maintain_ratio']  = FALSE;
                    if ($p->photo != 'default.jpg' && $p->photo != '') {
                        $imagePath = FCPATH . 'assets/img/pelamar/';
                        $mainImagePath = $imagePath . $p->photo;
                        if (file_exists($mainImagePath)) {
                            unlink($mainImagePath);
                        }
                    }
                }
                $cvFileName = ''; // Nama file CV

                if (!empty($_FILES['cvuser']['name'])) {
                    $cvConfig['upload_path']      = './assets/cv/';
                    $cvConfig['allowed_types']    = 'pdf|doc|docx';
                    $cvConfig['max_size']         = '2048';
                    $cvConfig['file_name']        = 'cv_' . $this->session->userdata('username') . time();
                    $this->load->library('upload', $cvConfig);
                    $cvFileName = $this->upload->data('file_name');
                    $existcvid = $p->id_cv;
                    $cvExists = $this->Pelamar_model->getData('curriculum_vitae', ['id_cv' => $existcvid]);
                    $c = $cvExists->row();
                    if ($c->file_cv != 'default.jpg' && $c->file_cv != '') {
                        $cvPath = FCPATH . 'assets/cv/';
                        $mainCvPath = $cvPath . $c->file_cv;
                        if (file_exists($mainCvPath)) {
                            unlink($mainCvPath);
                        } else {
                            die(print_r(($mainCvPath)));
                        }
                    }
                    if ($cvExists->num_rows() > 0) {

                        $updateCurriculumVitae = [
                            'file_cv' => $cvFileName
                        ];

                        $whereCurriculumVitae = [
                            'id_cv' => $existcvid
                        ];
                        $this->Pelamar_model->update('curriculum_vitae', $updateCurriculumVitae, $whereCurriculumVitae);
                    } else {

                        $id_cv = $this->get_kodCV();
                        $insertCurriculumVitae = [
                            'id_cv' => $id_cv,
                            'file_cv' => $cvFileName
                        ];
                        $update = [
                            'id_cv' => $id_cv,
                        ];
                        $where = [
                            'id_pelamar' => $this->security->xss_clean($p->id_pelamar)
                        ];
                        $this->Pelamar_model->update('data_pelamar', $update, $where);

                        $this->db->insert('curriculum_vitae', $insertCurriculumVitae);
                    }
                }
                $update = [
                    'nama' => $this->security->xss_clean($this->input->post('nama', TRUE)),
                    'jenis_kelamin' => $this->security->xss_clean($this->input->post('jenis_kelamin', TRUE)),
                    'no_telp' => $this->security->xss_clean($this->input->post('no_telp', TRUE)),
                    'alamat' => $this->security->xss_clean($this->input->post('alamat', TRUE)),
                    'photo' => $foto,
                ];
                $where = [
                    'id_pelamar' => $this->security->xss_clean($p->id_pelamar)
                ];

                $up = $this->Pelamar_model->update('data_pelamar', $update, $where);
                if ($up) {
                    $this->session->set_flashdata('success', 'Data berhasil diperbarui..');
                    $this->session->set_userdata(
                        array(
                            'foto' => $foto
                        )
                    );
                    redirect('profil', 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal diperbarui..');
                }
            }
        }
        $getData = $this->Pelamar_model->getData('data_pelamar', ['id_pelamar' => $this->session->userdata('id_pelamar')]);
        $data = [
            'title' => 'Profil',
            'users' => $getData->row()
        ];
        $this->load->view('pelamar/profil/profil', $data);
    }

    public function validate_cv_upload($cv)
    {
        if (empty($_FILES['cvuser']['name'])) {
            // Tidak ada file yang diupload, tidak ada validasi yang diperlukan
            return true;
        }

        $config['upload_path']      = './assets/cv/';
        $config['allowed_types']    = 'pdf|doc|docx';
        $config['max_size']         = '2048';
        $config['file_name']        =
            'cv_' . $this->session->userdata('username') . time();

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('cvuser')) {
            return true;
        } else {
            $this->form_validation->set_message('validate_cv_upload', $this->upload->display_errors());
            return false;
        }
    }
    private function hapusFileCVSebelumnya($id_cv)
    {
        $cvExists = $this->Pelamar_model->getData('curriculum_vitae', ['id_cv' => $id_cv]);
        $cvExistsData = $cvExists->row();

        $cvPath = FCPATH . 'assets/cv/';
        $profileCvPath = $cvPath . $cvExistsData->file_cv;

        if (file_exists($profileCvPath)) {
            unlink($profileCvPath);
        }
    }
    function get_kodCV()
    {
        $this->db->select_max('id_cv', 'max_code');
        $result = $this->db->get('curriculum_vitae')->row();

        $max_code = $result->max_code;

        if (!empty($max_code)) {
            $numeric_part = (int)substr($max_code, 3);
            $new_numeric_part = $numeric_part + 1;
            $new_kd = 'CV' . sprintf("%03d", $new_numeric_part);
        } else {
            $new_kd = 'CV001';
        }

        return $new_kd;
    }
}
