<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(): void
	{
//		$data['content']= $this->load->view('pages/dashboard', '', true);
//		$page = generate_template($data['content']);
//		//var_dump($page);
//
//		$this->load->view('layouts/master', array('content' => $page));

		$this->load->view('partials/header');
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar');
		$this->load->view('pages/dashboard');
		$this->load->view('partials/footer');
	}
}
