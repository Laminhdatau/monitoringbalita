<?php

class Rekapan extends CI_Controller
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
        $data['title'] = 'Data Balita';

        $data['data_balita']  = $this->rekap_model->tampil_data3()->result();
        // var_dump($data['data_balita']);
        // die;
        $this->load->view('tmp/admin_heder', $data);
        $this->load->view('tmp/admin_sidebar');
        $this->load->view('tmp/admin_topbar', $data);
        $this->load->view('rekap/rekapan', $data);
        $this->load->view('tmp/admin_footer');
    }
}
