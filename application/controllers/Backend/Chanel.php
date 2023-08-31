<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Chanel_model $Chanel_model
 * @property Feeds_model $Feeds_model
 * @property Token_model $Token_model
 * @property Listing_model $Listing_model
 */
class Chanel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Chanel_model');
		$this->load->model('Feeds_model');
		$this->load->model('Token_model');
		$this->load->model('Listing_model');
//				cek login
		if (!$this->session->userdata('login')) {
			$this->session->set_userdata('gagal', 'session anda tidak ditemukan');
			redirect(base_url('auth'));
		}
	}

	public function index(): void
	{
		$data['list_chanel'] = $this->Chanel_model->getChanel();
		$listing = [
			'listing_role' => $this->Listing_model->listing_role($this->session->userdata('role'))
		];
		$this->load->view('partials/header');
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar', $listing);
		$this->load->view('back/admin/channel/list', $data);
		$this->load->view('partials/footer');

	}

	public function Insert(): void
	{
		$listing = [
			'listing_role' => $this->Listing_model->listing_role($this->session->userdata('role'))
		];
		$this->load->view('partials/header');
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar', $listing);
		$this->load->view('back/admin/channel/insert');
		$this->load->view('partials/footer');
	}

	public function Detail($id)
	{
		$role = [
			'listing_role' => $this->Listing_model->listing_role($this->session->userdata('role'))
		];
		$listing = $this->Chanel_model->listing($id);
		$data['detail_chanel'] = $this->Chanel_model->getById($id);
		//$data['feeds'] = $this->Feeds_model->getFeedsById($listing);
		$data['token'] = $this->Token_model->getTokenById($listing['id_chanel']);

		$this->load->view('partials/header');
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar', $role);
		$this->load->view('back/admin/channel/detail', $data);
		$this->load->view('partials/footer');
	}

	public function Store(): void
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'description' => $this->input->post('description'),
			'user_id' => $this->session->userdata('id_user'),
			'field1' => $this->input->post('field1'),
			'field2' => $this->input->post('field2'),
			'field3' => $this->input->post('field3'),
			'field4' => $this->input->post('field4'),
			'field5' => $this->input->post('field5'),
			'field6' => $this->input->post('field6'),
			'field7' => $this->input->post('field7'),
			'field8' => $this->input->post('field8'),
			'created_at' => date('Y-m-d H:i:s')
		);

		$insert = $this->Chanel_model->InsertChanel($data);
		$this->generate();

		if ($insert) {
			$this->session->set_flashdata('sukses', 'data chanel berhasil di tambahkan');
			redirect(base_url('admin/chanel'));
		} else {
			$this->session->set_flashdata('gagal', 'data chanel gagal di tambahkan');
			redirect(base_url('admin/chanel'));
		}
	}

	public function generate(): void
	{
		$id_users = $this->session->userdata('id_user');

		$key = $this->generateSecretKey();
		$id_chanel = $this->Chanel_model->getByIdDesc($id_users);
		$datas = array(
			"id_chanel" => $id_chanel['id_chanel'],
			"id_users" => $id_users,
			"token" => $key
		);
		$this->Token_model->insertToken($datas);
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
