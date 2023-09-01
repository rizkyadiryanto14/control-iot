<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * $@property Listing_model $Listing_model
 */

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Listing_model');
	}

	public function index(): void
	{
		$listing = [
			'listing_role' => $this->Listing_model->listing_role($this->session->userdata('role'))
		];

		$this->load->view('partials/header');
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar', $listing);
		$this->load->view('back/user/dashboard');
		$this->load->view('partials/footer');
	}
}
