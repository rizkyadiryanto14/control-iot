<?php

/**
 * @property Listing_model $Listing_model
 */

class Home extends  CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Listing_model');
	}

	public function index()
	{
		$listing = [
			'listing_role' => $this->Listing_model->listing_role($this->session->userdata('role'))
		];
		$this->load->view('partials/header');
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar', $listing);
		$this->load->view('back/admin/home/setting');
		$this->load->view('partials/footer');
	}

	public function insertHome()
	{

	}
}
