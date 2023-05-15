<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('tmp/admin_heder', $data);
            $this->load->view('tmp/admin_sidebar', $data);
            $this->load->view('tmp/admin_topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('tmp/admin_footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Ditambahkan</div>');
            redirect('Menu');
        }
    }


    public function edit_menu()
    {
        $id_menu = $this->input->post('id_menu');
        $menu = $this->input->post('menu');

        $data = [
            'menu' => $menu,
        ];
        // var_dump($data);
        // die;
        $this->db->where('id_menu', $id_menu);
        $this->db->update('user_menu', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">role berhasil diedit</div>');
        redirect('menu');
    }


    public function hapus_menu($id_menu)
    {
        $this->db->where('id_menu', $id_menu);
        $this->db->delete('user_menu');
        $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">role berhasil dihapus</div>');
        redirect('menu');
    }


    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('id_menu', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('tmp/admin_heder', $data);
            $this->load->view('tmp/admin_sidebar', $data);
            $this->load->view('tmp/admin_topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('tmp/admin_footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'id_menu' => $this->input->post('id_menu'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Ditambahkan</div>');
            redirect('menu/submenu');
        }
    }
    public function edit_submenu()
    {
        $id_sub_menu = $this->input->post('id_sub_menu');
        $title = $this->input->post('title');
        $id_menu = $this->input->post('id_menu');
        $url = $this->input->post('url');
        $icon = $this->input->post('icon');
        $is_active = $this->input->post('is_active');

        $data = [
            'title' => $title,
            'id_menu' => $id_menu,
            'url' => $url,
            'icon' => $icon,
            'is_active' => $is_active,
        ];

        // tambahkan validasi untuk id_menu yang tidak boleh kosong
        if (empty($id_menu)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Menu harus dipilih</div>');
            redirect('menu/submenu');
        }

        // ubah query update
        $this->db->set($data);
        $this->db->where('id_sub_menu', $id_sub_menu);
        $this->db->update('user_sub_menu');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Submenu berhasil diedit</div>');
        redirect('menu/submenu');
    }
    public function hapus_sub_menu($id_sub_menu)
    {
        $this->db->where('id_sub_menu', $id_sub_menu);
        $this->db->delete('user_sub_menu');
        $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Submenu berhasil dihapus</div>');
        redirect('menu/submenu');
    }
}
