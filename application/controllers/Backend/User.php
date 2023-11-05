<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Listing_model $Listing_model
 * @property User_model $User_model
 * @property Chanel_model $Chanel_model
 */
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Listing_model');
		$this->load->model('User_model');
		$this->load->model('Chanel_model');
		if (!$this->session->userdata('login') && $this->session->userdata('role') != 'admin') {
			$this->session->set_userdata('gagal', 'session anda tidak ditemukan');
			redirect(base_url('auth'));
		}
	}

	public function index(): void
	{
		$listing = [
			'listing_role' => $this->Listing_model->listing_role($this->session->userdata('role'))
		];
		$data = [
			'list_users' => $this->User_model->getAllData(),
		];

		$this->load->view('partials/header');
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar', $listing);
		$this->load->view('back/admin/user/list', $data);
		$this->load->view('partials/footer');
	}

	public function insert(): void
	{
		$data = [
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'role' => $this->input->post('role'),
			'created_at' => date('Y-m-d H:i:s')
		];

		$insert = $this->User_model->insert_user($data);

		if ($insert) {
			$this->session->set_flashdata('sukses', 'Data user berhasil di tambahkan');
			redirect(base_url('admin/user'));
		} else {
			$this->session->set_flashdata('gagal', 'Data user gagal di tambahkan');
			redirect(base_url('admin/user'));
		}
	}

	public function update(): void
	{
		$update_data = [
			'id' => $this->input->post('id'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'role' => $this->input->post('role')
		];

		$update = $this->User_model->update_user($update_data, $update_data['id']);

		if ($update) {
			$this->session->set_flashdata('sukses', 'Data user berhasil di update');
			redirect(base_url('admin/user'));
		} else {
			$this->session->set_flashdata('gagal', 'Data user gagal di update');
			redirect(base_url('admin/user'));
		}
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$delete = $this->User_model->delete_user($id);

		if ($delete) {
			$this->session->set_flashdata('sukses', 'Data User Berhasil di hapus');
			redirect(base_url('admin/user'));
		}
	}
}
