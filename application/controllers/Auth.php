<?php

/**
 * @property Auth_model $Auth_model
 */
class  Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}

	public function index(): void
	{
		$this->load->view('auth/login');
	}

	public function Login(): void
	{
		$data = [
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		];

		$check = $this->Auth_model->getUserById($data['username']);

		if ($check['username'] == $data['username']) {
			if (password_verify($data['password'], $check['password'])) {
				$userSession = [
					'username' => $check['username'],
					'id_user' => $check['id'],
					'role' => $check['role'],
					'login' => true,
				];
				$this->session->set_userdata($userSession);

				if ($userSession['role'] == 'admin') {
					redirect(base_url('admin/dashboard'));
				} elseif ($userSession['role'] == 'user') {
					redirect(base_url('user/dashboard'));
				} else {
					show_404();
				}
			} else {
				$this->session->set_flashdata('gagal', 'username atau password salah');
				redirect(base_url('auth'));
			}
		} else {
			$this->session->set_flashdata('gagal', 'User Tidak Ditemukan');
			redirect(base_url('auth'));
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('home'));
	}

}
