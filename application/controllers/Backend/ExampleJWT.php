<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/JWT.php';

class Api extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	private function generate_jwt_token($user_id)
	{
		$key = 'secretkey';
		$payload = [
			'user_id' => $user_id,
			'iat' => time()
		];

		$jwt = JWT::encode($payload, $key);
		return $jwt;
	}

	private function validate_jwt_token($jwt_token)
	{
		$key = 'secretkey';
		try {
			$payload = JWT::decode($jwt_token, $key, ['HS256']);
			return true;
		} catch (\Exception $e) {
			return false;
		}
	}

	public function insert_data()
	{

		$jwt_token = $this->input->get_request_header('Authorization');

		if (!$this->validate_jwt_token($jwt_token)) {
			$this->output->set_status_header(401);
			exit();
		}

		$payload = JWT::decode($jwt_token, 'secretkey', ['HS256']);
		$user_id = $payload->user_id;

		$data = [
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email')
		];

		// Insert data
		if ($this->User_model->insert($data, $user_id)) {
			$this->output->set_status_header(200);
		} else {
			$this->output->set_status_header(500);
		}
	}

}
