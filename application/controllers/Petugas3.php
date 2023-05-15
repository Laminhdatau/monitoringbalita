<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('tmp/admin_heder', $data);
        $this->load->view('tmp/admin_sidebar', $data);
        $this->load->view('tmp/admin_topbar', $data);
        $this->load->view('dokter/index', $data);
        $this->load->view('tmp/admin_footer');
    }
}
