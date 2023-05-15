<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->view('tmp/t_header');
        $this->load->view('tmp/t_topbar');
        $this->load->view('depan/isi');
        $this->load->view('tmp/t_footer');
    }
}
