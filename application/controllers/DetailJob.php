<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailJob extends CI_Controller
{
    public function index()
    {
        $this->load->view('pelamar/detailJob/index');
    }
}
