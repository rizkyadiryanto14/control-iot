<?php

/**
 * @property Chanel_model $Chanel_model
 */
class Chanel extends  CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Chanel_model');
	}

	public function index(): void
	{
		$data['list_chanel']	= $this->Chanel_model->getChanel();
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
		$data['detail_chanel']	= $this->Chanel_model->getById($id);
		$this->load->view('partials/header');
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar');
		$this->load->view('pages/channel/detail', $data);
		$this->load->view('partials/footer');
	}

	public function Store(): void
	{
		$data = array(
			'nama'			=> $this->input->post('nama'),
			'description'	=> $this->input->post('description'),
			'field1'		=> $this->input->post('field1'),
			'field2'		=> $this->input->post('field2'),
			'field3'		=> $this->input->post('field3'),
			'field4'		=> $this->input->post('field4'),
			'field5'		=> $this->input->post('field5'),
			'field6'		=> $this->input->post('field6'),
			'field7'		=> $this->input->post('field7'),
			'field8'		=> $this->input->post('field8'),
			'created_at'	=> date('Y-m-d H:i:s')
		);

		$insert = $this->Chanel_model->InsertChanel($data);

		if ($insert){
			$this->session->set_flashdata('sukses', 'data chanel berhasil di tambahkan');
			redirect(base_url('admin/chanel'));
		}else{
			$this->session->set_flashdata('gagal', 'data chanel gagal di tambahkan');
			redirect(base_url('admin/chanel'));
		}
	}

	public function generateApiKeys()
	{
		
	}
}
