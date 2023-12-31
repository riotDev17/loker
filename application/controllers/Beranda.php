<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model("Pelamar_model");
		$this->load->model("Beranda_model");
		$this->load->model("Loker_model");
		$this->load->library('encryption');
	}
	public function index()
	{

		$data = array(
			'record' => $this->Loker_model->read('loker'),
			'title' => 'CariKerja'
		);
		$this->load->view('beranda_view', $data);
	}
	public function search()
	{
		if (isset($_GET['fr'])) {
			$result = $this->Beranda_model->search($_GET['fr']);
			if (count($result) > 0) {
				foreach ($result as $row) {
					$data['record'][] = array(
						'id_loker' => $row->id_loker,
						'nama_perusahaan' => $row->nama_perusahaan,
						'nama_pekerjaan' => $row->nama_pekerjaan,
						'provinsi' => $row->provinsi,
						'kabupaten' => $row->kabupaten,
						'kota' => $row->kota,
						'lokasi' => $row->lokasi,
						'gaji' => $row->gaji,
						'benefit' => $row->benefit,
						'tunjangan' => $row->tunjangan,
						'keuntungan' => $row->keuntungan,
						'deskripsi' => $row->deskripsi,
						'tipe_kerja' => $row->tipe_kerja,
						'kebijakan' => $row->kebijakan,
						'hari_kerja' => $row->hari_kerja,
						'jam_kerja' => $row->jam_kerja,
						'pendidikan' => $row->pendidikan,
						'pengalaman' => $row->pengalaman,
						'jenis_kelamin' => $row->jenis_kelamin,
						'usia' => $row->usia,
						'skills' => $row->skills,
						'kategori' => $row->kategori,
						'tgl_loker' => $row->tgl_loker,
						'tgl_akhir_loker' => $row->tgl_akhir_loker,
						'created_at' => $row->created_at,
						'updated_at' => $row->updated_at,
					);
				}
				$data['title'] = "CariKerja | Search";
				$this->load->view('beranda_view', $data);
			} else {
				$this->session->set_flashdata('error', '<div class="alert alert-success alert-pesan">Pekerjaan Yang kamu cari tidak ada</div>');
				redirect('');
			}
		}
	}
	public function get_data()
	{
		// Ambil nilai pencarian dari parameter POST
		$search = $this->input->post('search');
		$data['items'] = $this->Beranda_model->get_items($search);
		// echo($data);
		header('Content-Type: application/json');
		echo json_encode($data);
	}
}
