<?php

class Dusun1 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('dusun1_model');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dusun I';
        $data['dusun1']  = $this->dusun1_model->tampil_data()->result();
        $this->load->view('tmp/admin_heder', $data);
        $this->load->view('tmp/admin_sidebar');
        $this->load->view('tmp/admin_topbar', $data);
        $this->load->view('dusun/dusun1', $data);
        $this->load->view('tmp/admin_footer');
    }

    public function input()
    {
        $data = array(
            'id_balita' => set_value('id_balita'),
            'nik'  => set_value('nik'),
            'nama_balita'  => set_value('nama_balita'),
            'tgl_lahir'  => set_value('tgl_lahir'),
            'jenis_kelamin'  => set_value('jenis_kelamin'),
            'nama_ibu'  => set_value('nama_ibu'),
            'dusun'  => set_value('dusun'),
        );

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dusun I';
        $this->load->view('tmp/admin_heder', $data);
        $this->load->view('tmp/admin_sidebar');
        $this->load->view('tmp/admin_topbar', $data);
        $this->load->view('dusun/dusun1_form', $data);
        $this->load->view('tmp/admin_footer');
    }

    public function input_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->input();
        } else {
            $data = array(
                'nik'  => $this->input->post('nik', true),
                'nama_balita'  => $this->input->post('nama_balita', true),
                'tgl_lahir'  => $this->input->post('tgl_lahir', true),
                'jenis_kelamin'  => $this->input->post('jenis_kelamin', true),
                'nama_ibu'  => $this->input->post('nama_ibu', true),
                'dusun'  => $this->input->post('dusun', true),
            );

            $this->dusun1_model->input_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show " role="alert">Balita Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('dusun1');
        }
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

    public function update($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dusun I';
        $where = array('id_balita' => $id);
        $data['dusun1'] = $this->dusun1_model->edit_data($where, 'balita')->result();
        $this->load->view('tmp/admin_heder', $data);
        $this->load->view('tmp/admin_sidebar');
        $this->load->view('tmp/admin_topbar', $data);
        $this->load->view('dusun/dusun1_update', $data);
        $this->load->view('tmp/admin_footer');
    }

    public function update_aksi()
    {
        $id = $this->input->post('id_balita');
        $nik = $this->input->post('nik');
        $nama_balita = $this->input->post('nama_balita');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $nama_ibu = $this->input->post('nama_ibu');
        $dusun = $this->input->post('dusun');

        $data = array(
            'nik'  => $nik,
            'nama_balita'  => $nama_balita,
            'tgl_lahir'  => $tgl_lahir,
            'jenis_kelamin'  => $jenis_kelamin,
            'nama_ibu'  => $nama_ibu,
            'dusun'  => $dusun
        );

        $where = array(
            'id_balita' => $id
        );

        $this->dusun1_model->update_data($where, $data, 'balita');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show " role="alert">Daftar Balita Berhasil di Ubah!<button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('dusun1');
    }

    public function delete($id)
    {
        $where = array('id_balita' => $id);
        $this->dusun1_model->hapus_data($where, 'balita');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show " role="alert">Daftar Balita Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('dusun1');
    }
}
