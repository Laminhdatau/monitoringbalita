<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Petugas Posyandu';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('tmp/admin_heder', $data);
        $this->load->view('tmp/admin_sidebar', $data);
        $this->load->view('tmp/admin_topbar', $data);
        $this->load->view('petugas2/index', $data);
        $this->load->view('tmp/admin_footer');
    }
}
