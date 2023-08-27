<?php

/**
 * @property Chanel_model $Chanel_model
 * @property Feeds_model $Feeds_model
 */

class Chanel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Chanel_model');
		$this->load->model('Feeds_model');
		//		cek login
		if (!$this->session->userdata('login')) {
			$this->session->set_userdata('gagal', 'session anda tidak ditemukan');
			redirect(base_url('auth'));
		}
	}

	public function index(): void
	{
		$data['list_chanel'] = $this->Chanel_model->getChanel();
		$this->load->view('partials/header');
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar');
		$this->load->view('pages/channel/list', $data);
		$this->load->view('partials/footer');

	}

	public function Insert(): void
	{
		$this->load->view('partials/header');
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar');
		$this->load->view('pages/channel/insert');
		$this->load->view('partials/footer');
	}

	public function Detail($id): void
	{
		$data['detail_chanel'] = $this->Chanel_model->getById($id);
		$this->load->view('partials/header');
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar');
		$this->load->view('pages/channel/detail', $data);
		$this->load->view('partials/footer');
	}

	public function Store(): void
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'description' => $this->input->post('description'),
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

		if ($insert) {
			$this->session->set_flashdata('sukses', 'data chanel berhasil di tambahkan');
			redirect(base_url('admin/chanel'));
		} else {
			$this->session->set_flashdata('gagal', 'data chanel gagal di tambahkan');
			redirect(base_url('admin/chanel'));
		}
	}

	public function insertJson(): void
	{
		$field1 = $this->input->get('field1');
		$field2 = $this->input->get('field2');
		$field3 = $this->input->get('field3');
		$field4 = $this->input->get('field4');
		$field5 = $this->input->get('field5');
		$field6 = $this->input->get('field6');
		$field7 = $this->input->get('field7');
		$field8 = $this->input->get('field8');

		$data = array(
			'created_at' => date('Y-m-d H:i:s'),
			'chanel_id' => '2',
			'field1' => $field1,
			'field2' => $field2,
			'field3' => $field3,
			'field4' => $field4,
			'field5' => $field5,
			'field6' => $field6,
			'field7' => $field7,
			'field8' => $field8,
		);

		$insert = $this->Feeds_model->insert($data);

		if ($insert) {
			$response = [
				'status' => true,
				'message' => 'Data has been Insert.',
				'data' => $data
			];
		} else {
			$response = [
				'status' => true,
				'message' => 'Data has been Insert.'
			];
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}
}
