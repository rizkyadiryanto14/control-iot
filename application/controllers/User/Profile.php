<?php

class Profile extends  CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('partials/header');
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar');
		$this->load->view('user/profile');
		$this->load->view('partials/footer');
	}

	public function detailUser($id)
	{

	}
}
