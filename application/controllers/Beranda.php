<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Loker_model");
		// $this->load->model("Kategori_model");
	}
	public function index()
	{
		$data = array(
			'record' => $this->Loker_model->read('loker'),
			'title' => 'Bahyu Sanciko'
		);
		// die(print_r($data));
		$this->load->view('beranda_view', $data);
	}
}
