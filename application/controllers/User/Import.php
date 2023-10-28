<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Makassar');

/**
 *
 * @property Import_model $Import_model
 */

class Import extends  CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Import_model');
	}

	public function import()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST'){
			$config['upload_path'] = './uploads';
			$config['allowed_types'] = 'xls|xlsx';
			$config['max_size'] = 6048; // 2MB
			$config['overwrite'] = true;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('file')) {
				$response = array(
					'status' => false,
					'message' => $this->upload->display_errors()
				);
			} else {
				$file_data = $this->upload->data();
				$file_path = $file_data['full_path'];
				$result = $this->Import_model->import($file_path);

				if ($result) {
					$response = array(
						'status' => true,
						'message' => 'Data has been imported successfully.'
					);
				} else {
					$response = array(
						'status' => false,
						'message' => 'Failed to import data.'
					);
				}
			}
		}else {
			$response = array(
				'status' => false,
				'message' => 'Invalid request method.'
			);
		}
		if ($response['status']){
			$this->session->set_flashdata('sukses', $response['message']);
			redirect(base_url('user/chanel'));
		}else{
			$this->session->set_flashdata('gagal', $response['message']);
			redirect(base_url('user/chanel'));
		}

	//	echo json_encode($response);
	}
}
