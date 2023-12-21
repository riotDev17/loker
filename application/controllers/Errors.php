
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Errors extends CI_Controller
{
    public function custom_404()
    {
        $this->load->view('errors/error_404');
    }
}
