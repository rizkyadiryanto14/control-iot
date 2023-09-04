<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * $@property Listing_model $Listing_model
 * @property Dashboard_model $Dashboard_model
 * @property Chanel_model $Chanel_model
 */

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Listing_model');
		$this->load->model('Dashboard_model');
		$this->load->model('Chanel_model');
		if (!$this->session->userdata('login') && $this->session->userdata('role') != 'user') {
			$this->session->set_userdata('gagal', 'session anda tidak ditemukan');
			redirect(base_url('auth'));
		}
	}

	public function index(): void
	{
		$listing = [
			'listing_role' => $this->Listing_model->listing_role($this->session->userdata('role'))
		];
		$data =[
			'chanel'	=> $this->Chanel_model->getChanelById($this->session->userdata('id_user'))
		];
//		var_dump($data);
//		die();
		$this->load->view('partials/header');
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar', $listing);
		$this->load->view('back/user/dashboard', $data);
		$this->load->view('partials/footer');
	}
}
