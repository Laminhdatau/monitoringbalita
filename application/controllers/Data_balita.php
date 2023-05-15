<?php

class Data_balita extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('data_model');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Balita';

        $data['data_balita']  = $this->data_model->tampil_data3()->result();
        // var_dump($data['data_balita']);
        // die;
        $this->load->view('tmp/admin_heder', $data);
        $this->load->view('tmp/admin_sidebar');
        $this->load->view('tmp/admin_topbar', $data);
        $this->load->view('data/data_balita', $data);
        $this->load->view('tmp/admin_footer');
    }

    public function add3()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Balita';
        $data['imu'] = $this->data_model->getImun();
        $data['ba'] = $this->data_model->ambilBalitaDalamHist();
        $data['sta'] = $this->data_model->getStts();
        $this->load->view('tmp/admin_heder', $data);
        $this->load->view('tmp/admin_sidebar');
        $this->load->view('tmp/admin_topbar', $data);
        $this->load->view('data/data_form', $data);
        $this->load->view('tmp/admin_footer');
    }

    public function add_aksi3()
    {
        $id_imun = $this->input->post('id_imun', true);
        $berat_badan = $this->input->post('berat_badan', true);
        $tinggi_badan = $this->input->post('tinggi_badan', true);
        $lingkar_kepala = $this->input->post('lingkar_kepala', true);

        if ($berat_badan < 2.3 && $lingkar_kepala < 7.0 && $tinggi_badan < 40.0) {
            $status = '3';
        } elseif ($berat_badan >= 2.5 && $berat_badan <= 8.0 && $lingkar_kepala >= 10.0 && $lingkar_kepala <= 15.0 && $tinggi_badan >= 40.6 && $tinggi_badan <= 50.3) {
            $status = '2';
        } else {
            $status = '1';
        }


        $data = array(
            'id_balita'  => $this->input->post('id_balita', true),
            'berat_badan'  => $berat_badan,
            'tinggi_badan'  => $tinggi_badan,
            'lingkar_kepala'  => $lingkar_kepala,
            'id_imun'  => $id_imun,
            'id_status'  => $status,
        );

        $this->data_model->input_data3($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show " role="alert">Balita Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('data_balita');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nik', 'nik', 'required', ['required' => 'nik wajib di isi!']);
        $this->form_validation->set_rules('nama_balita', 'nama_balita', 'required', ['required' => 'nama balita wajib di isi!']);
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required', ['required' => 'tgl lahir wajib di isi!']);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required', ['required' => 'jenis kelamin wajib di isi!']);
        $this->form_validation->set_rules('nama_ibu', 'nama_ibu', 'required', ['required' => 'nama ibu wajib di isi!']);
        $this->form_validation->set_rules('dusun', 'dusun', 'required', ['required' => 'dusun wajib di isi!']);
    }

    public function update3($id = null)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Balita';
        $where = array(
            'id_history' => $id
        );
        $data['data_balita'] = $this->data_model->edit_data3($where, 'hsitory')->result();
        $data['imu'] = $this->data_model->getImun();
        $data['sta'] = $this->data_model->getStts();
        $this->load->view('tmp/admin_heder', $data);
        $this->load->view('tmp/admin_sidebar');
        $this->load->view('tmp/admin_topbar', $data);
        $this->load->view('data/data_update', $data);
        $this->load->view('tmp/admin_footer');
    }

    public function update_aksi3($ih)
    {
        $ib = $this->input->post('id_balita');

        $berat_badan = $this->input->post('berat_badan');
        $tinggi_badan = $this->input->post('tinggi_badan');
        $lingkar_kepala = $this->input->post('lingkar_kepala');
        $id_imun = $this->input->post('id_imun');

        if ($berat_badan < 2.3 && $lingkar_kepala < 7.0 && $tinggi_badan < 40.0) {
            $status = '3';
        } elseif ($berat_badan >= 2.3 && $berat_badan <= 8.0 && $lingkar_kepala >= 10.0 && $lingkar_kepala <= 55.0 && $tinggi_badan >= 40.6 && $tinggi_badan <= 50.3) {
            $status = '2';
        } else {
            $status = '1';
        }


        $data = array(
            'berat_badan'  => $berat_badan,
            'tinggi_badan'  => $tinggi_badan,
            'lingkar_kepala'  => $lingkar_kepala,
            'id_imun'  => $id_imun,
            'id_status'  => $status,

        );

        $where = array(
            'id_history' => $ih,
            'id_balita' => $ib,
        );

        $this->data_model->update_data3($where, $data, 'hsitory');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show " role="alert">Daftar Balita Berhasil di Ubah!<button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('data_balita');
    }

    public function delete3($id)
    {
        $where = array('id_history' => $id);
        $this->data_model->hapus_data3($where, 'hsitory');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show " role="alert">Daftar Balita Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('data_balita');
    }
    public function validasi1($id)
    {
        $this->data_model->validasi1($id);
        redirect('data_balita');
    }
    public function validasi2($id)
    {
        $this->data_model->validasi2($id);
        redirect('data_balita');
    }
}


