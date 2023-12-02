<?php

/**
 * @property Bazzer_model $Bazzer_model
 */

class Bazzer_setting extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Bazzer_model');
	}

	public function index()
	{
		$status = $this->Bazzer_model->getStatusBazzer();
		$this->load->view('partials/header');
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar');
		$this->load->view('back/user/dashboard', $status);
		$this->load->view('partials/footer');
	}

	public function changeStatus()
	{
		$checkStatus = $this->Bazzer_model->getStatusBazzer();
		if ($checkStatus['status'] == 1){
			$data = [
				'id'		=> $this->input->post('id'),
				'status'	=> 0
			];

			$update = $this->Bazzer_model->updateBazzer($data['id'],$data);

			if ($update){
				$this->session->set_flashdata('sukses', 'Buzzer Status Updated Successfully');
				redirect(base_url('user/dashboard'));
			}else {
				$this->session->set_userdata('gagal', 'Buzzer status failed to update');
				redirect(base_url('user/dashboard'));
			}
		}else {
			$id = $this->input->post('id');
			$data = [
				'status'	=> '1'
			];
			$update = $this->Bazzer_model->updateBazzer($id,$data);

			if ($update){
				$this->session->set_flashdata('sukses', 'Buzzer Status Updated Successfully');
				redirect(base_url('user/dashboard'));
			}else {
				$this->session->set_userdata('gagal', 'Buzzer Status Success On Failure');
				redirect(base_url('user/dashboard'));
			}
		}
	}
}
