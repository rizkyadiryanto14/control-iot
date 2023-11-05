<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('front/home');
	}

	public function About_us()
	{
		$this->load->view('front/about_us');
	}
}
