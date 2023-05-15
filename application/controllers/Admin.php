<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		// print_r($data['user']['nama']);
		// die;
		$this->load->view('tmp/admin_heder', $data);
		$this->load->view('tmp/admin_sidebar', $data);
		$this->load->view('tmp/admin_topbar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('tmp/admin_footer');
	}

	public function dashboard()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('tmp/admin_heder', $data);
		$this->load->view('tmp/admin_sidebar', $data);
		$this->load->view('tmp/admin_topbar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('tmp/admin_footer');
	}


	public function role()
	{
		// Set aturan validasi untuk form
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('role', 'Role', 'required|trim');

		if ($this->form_validation->run() == FALSE) {

			// Jika validasi gagal, tampilkan form untuk menambahkan role
			$data['title'] = 'Add Role';
			$this->load->view('tmp/admin_heder', $data);
			$this->load->view('tmp/admin_sidebar', $data);
			$this->load->view('tmp/admin_topbar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('tmp/admin_footer');
		} else {

			// Jika validasi berhasil, simpan data role ke dalam database
			$role = $this->input->post('role', TRUE);
			$this->db->insert('user_role', ['role' => $role]);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">role berhasil ditambah</div>');
			redirect('admin/role');
		}
	}



	public function roleAccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('user_role', ['role_id' => $role_id])->row_array();

		$this->db->where('id_menu !=', 1);

		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('tmp/admin_heder', $data);
		$this->load->view('tmp/admin_sidebar', $data);
		$this->load->view('tmp/admin_topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('tmp/admin_footer');
	}

	public function changeAccess()
	{
		$id_menu = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'id_menu' => $id_menu
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show " role="alert">Balita Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	}

	public function edit_role()
	{
		$role_id = $this->input->post('role_id');
		$role = $this->input->post('role');

		$data = [
			'role' => $role,
		];
		// var_dump($data);
		// die;
		$this->db->where('role_id', $role_id);
		$this->db->update('user_role', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">role berhasil diedit</div>');
		redirect('admin/role');
	}

	public function hapus_role($role_id)
	{
		$this->db->where('role_id', $role_id);
		$this->db->delete('user_role');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">role berhasil dihapus</div>');
		redirect('admin/role');
	}
}
