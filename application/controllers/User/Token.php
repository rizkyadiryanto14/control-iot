<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Token_model $Token_model
 */

class Token extends  CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Token_model');
	}

	public function generate(): void
	{
		$id_users = $this->session->userdata('id_user');
		$key = $this->generateSecretKey();
		$data = array(
			"id_chanel" => $this->input->post('id_chanel'),
			"id_users" => $id_users,
			"token" => $key
		);

		$insert = $this->Token_model->UpdateToken($data['id_chanel'], $data);

		if ($insert) {
			$this->session->set_flashdata('sukses', 'Token berhasil di generate');
			redirect(base_url('user/chanel'));
		} else {
			$this->session->set_flashdata('gagal', 'Token gagal di generate');
			redirect(base_url('user/chanel'));
		}
	}

	protected function generateSecretKey($length = 16): string
	{
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		$max = strlen($characters) - 1;

		for ($i = 0; $i < 16; $i++) {
			try {
				$randomString .= $characters[random_int(0, $max)];
			} catch (Exception $e) {
				echo 'Error occurred: ' . $e->getMessage();
			}
		}
		return $randomString;
	}
}
