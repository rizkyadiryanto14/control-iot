<?php

/**
 * @property Listing_model $Listing_model
 * @property Setting_model $Setting_model
 *
 */

class Umum extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Listing_model');
		$this->load->model('Setting_model');
	}

	public function index()
	{
		$listing = [
			'listing_role'	=> $this->Listing_model->listing_role($this->session->userdata('role'))
		];
		$data = [
			'setting'		=> $this->Setting_model->getSetting()
		];
		$this->load->view('partials/header');
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar', $listing);
		$this->load->view('back/user/setting', $data);
		$this->load->view('partials/footer');
	}

	public function store()
	{
		$data = [
			'waktu'			=> $this->input->post('waktu'),
			'last_update'	=> date('Y-m-d H:i:s')
		];

		$insert = $this->Setting_model->insertSetting($data);

		if ($insert){
			$this->session->set_flashdata('sukses', 'Data waktu berhasil di tambahkan');
			redirect(base_url('setting'));
		}else{
			$this->session->set_flashdata('gagal', 'Data waktu gagal di tambahkan');
			redirect(base_url('setting'));
		}

	}
}
