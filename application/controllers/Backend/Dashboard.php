<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Listing_model $Listing_model
 * @property Dashboard_model $Dashboard_model
 */

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Listing_model');
		$this->load->model('Dashboard_model');
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
			'users'			=> $this->Dashboard_model->getTotalUser(),
			'chanel'		=> $this->Dashboard_model->getTotalChanel(),
			'token_write'	=> $this->Dashboard_model->getTotalTokenWrite(),
			'token_read'	=> $this->Dashboard_model->getTotalTokenRead()
		];

		$this->load->view('partials/header');
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar', $listing);
		$this->load->view('back/admin/dashboard', $data);
		$this->load->view('partials/footer');
	}

	public function chart_data()
	{
		$data = [
			'users'			=> $this->Dashboard_model->getTotalUser(),
			'chanel'		=> $this->Dashboard_model->getTotalChanel(),
			'token_write'	=> $this->Dashboard_model->getTotalTokenWrite(),
			'token_read'	=> $this->Dashboard_model->getTotalTokenRead()
		];
		echo json_encode($data);
	}
}
