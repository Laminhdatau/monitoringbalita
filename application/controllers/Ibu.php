<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ibu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
    }

    public function index()
    {
        $this->load->view('tmp/ibu_header');
        $this->load->view('tmp/t_header');
        $this->load->view('tmp/t_topbar');
        $this->load->view('ibu/index');
        $this->load->view('tmp/t_footer');
    }

    public function gizi()
    {
        $this->load->view('tmp/ibu_header');
        $this->load->view('tmp/t_header');
        $this->load->view('tmp/t_topbar');
        $this->load->view('tmp/ibu_topbar');
        $this->load->view('ibu/gizi');
        $this->load->view('tmp/t_footer');
    }

    public function tentang()
    {
        $this->load->view('tmp/ibu_header');
        $this->load->view('tmp/t_header');
        $this->load->view('tmp/t_topbar');
        $this->load->view('tmp/ibu_topbar');
        $this->load->view('ibu/tentang');
        $this->load->view('tmp/t_footer');
    }

    public function info()
    {

        $data['data_balita']  = $this->rekap_model->tampil_data3()->result();
        // var_dump($data['data_balita']);
        // die;
        
        
        $this->load->view('tmp/ibu_header');
        $this->load->view('tmp/t_header');
        $this->load->view('tmp/ibu_topbar');
        $this->load->view('tmp/t_topbar');
        $this->load->view('ibu/info_balita', $data);
        $this->load->view('tmp/admin_footer');
        $this->load->view('tmp/t_footer');
    }
}
