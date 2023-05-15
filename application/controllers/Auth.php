<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		// is_logged_in();
	}
	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('petugas1');
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->load->view('tmp/heder', $data);
			$this->load->view('auth/login');
			$this->load->view('tmp/footer');
		} else {
			//validasi berhasil
			$this->_login();
		}
	}
	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->db->query("select md5('" . $this->input->post('password') . "') as pass")->row_array();
		$wr = array(
			'email' => $email
		);
		$user = $this->db->get_where('user', $wr)->row_array();

		//jika usernya ada

		if ($user) {

			//jika usernya aktif

			if ($user['is_active'] == 1) {

				// cek password

				if ($password['pass'] == $user['password']) {

					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else if ($user['role_id'] == 2) {
						redirect('petugas1');
					} else {
						redirect('petugas2');
					}
				} else {

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('auth');
				}
			} else {

				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been actibed!</div>');
				redirect('auth');
			}
		} else {

			$this->session->set_flashdata('message', '<div class="alert
				alert-danger" role="alert">Email is not registerd!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert 
		alert-success" role="alert">You have been logout!</div>');
		redirect('auth');
	}


	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
