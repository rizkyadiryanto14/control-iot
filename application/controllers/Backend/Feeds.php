<?php
/**
 * @property Feeds_model $Feeds_model
 * @property Token_model $Token_model
 */

class Feeds extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Feeds_model');
		$this->load->model('Token_model');
	}

	public function index(): void
	{
		$id_chanel = $this->input->get('id_chanel');
		$token = $this->input->get('token');

		if (!$this->validateToken($token, $id_chanel)) {
			$this->output->set_status_header(500);
			$response = [
				'status' => false,
				'message' => 'invalid request',
			];
		} else {
			$this->output->set_status_header(200);
			$data = $this->Feeds_model->getFeedsById($id_chanel);
			$response = [
				'created_at' => $data['created_at'],
				'field1' => $data['field1'],
				'field2' => $data['field2'],
				'field3' => $data['field3'],
				'field4' => $data['field4'],
				'field5' => $data['field5'],
				'field6' => $data['field6'],
				'field7' => $data['field7'],
				'field8' => $data['field8']
			];
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	private function validateToken($token, $id_chanel)
	{
		$check = $this->Token_model->getReadToken($id_chanel);

		foreach ($check as $item) {
			if ($item['token'] == $token) {
				return true;
			} else {
				return false;
			}
		}
	}


}
