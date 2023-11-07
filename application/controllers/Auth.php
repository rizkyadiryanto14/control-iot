<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Auth_model $Auth_model
 * @property Email_sender $Email_sender
 */

class  Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
		$this->load->model('Email_sender');
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
				echo json_encode($userSession);
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

	public function logout(): void
	{
		$this->session->sess_destroy();
		redirect(base_url('home'));
	}

	public function register_view()
	{
		$this->load->view('auth/register');
	}


	public function Register()
	{
		$data  = [
			'username'		=> $this->input->post('username'),
			'nama_lengkap'	=> $this->input->post('nama_lengkap'),
			'email'			=> $this->input->post('email'),
			'password'		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'role'			=> 'user'
		];

		$register = $this->Auth_model->insertuser($data);

		if ($register){
			$isi_email = '
				<p>Anda telah berhasil mendaftar, harap bersabar sampai akun anda diverifikasi oleh admin kami.</p>
				<b>Data untuk login: </b>
				<ul>
					<li>NISN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ' . $data['email'] . '</li>
					<li>Password &nbsp;&nbsp;&nbsp; : ' . $data['password'] . ' </li>
				</ul>
				';
			$this->Email_sender->send("Berhasil Mendaftar", $data['email'], $isi_email);
			$this->session->set_flashdata('sukses', 'Register Success');
			redirect(base_url('auth'));
		}else{
			$this->session->set_flashdata('gagal', 'Register failed, Please Contact Support');
			redirect(base_url('auth'));
		}
	}
}
