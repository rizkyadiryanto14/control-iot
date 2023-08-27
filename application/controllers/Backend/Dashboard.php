<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			$this->session->set_flashdata('gagal', 'Session anda tidak ditemukan');
			redirect(base_url('auth'));
		}
	}

	public function index(): void
	{
		$this->load->view('partials/header');
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar');
		$this->load->view('pages/dashboard');
		$this->load->view('partials/footer');
	}
}
