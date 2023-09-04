<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Listing_model $Listing_model
 * @property Feeds_model $Feeds_model
 * @property Chanel_model $Chanel_model
 */
class Grafik extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Listing_model');
		$this->load->model('Feeds_model');
		$this->load->model('Chanel_model');
	}

	public function index(): void
	{
		$listing['listing_role'] = $this->Listing_model->listing_role($this->session->userdata('role'));
		$data['list_chanel'] = $this->Chanel_model->getByUser($this->session->userdata('id_user'));
		$this->load->view('partials/header');
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar', $listing);
		$this->load->view('back/user/grafik/list', $data);
		$this->load->view('partials/footer');
	}

	public function Grafik($id_chanel)
	{
		$listing['listing_role'] = $this->Listing_model->listing_role($this->session->userdata('role'));

		$config['base_url'] = base_url("User/Grafik/Grafik/$id_chanel");
		$config['total_rows'] = $this->Feeds_model->countFeedsById($id_chanel);
		$config['per_page'] = 10;
		$config['uri_segment'] = 5;

		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

		$data['grafik'] = $this->Feeds_model->getFeedsByIdWithLimit($id_chanel, $config['per_page'], $page);

		$this->load->view('partials/header');
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar', $listing);
		$this->load->view('back/user/grafik/grafik', $data);
		$this->load->view('partials/footer');
	}

	public function getJsonData($id_chanel)
	{
		$data = $this->Feeds_model->getFeedsById($id_chanel);
		foreach ($data as $item) {
			$response = [
				'created_at' => $item->created_at,
				'field1' => $item->field1,
				'field2' => $item->field2,
				'field3' => $item->field3,
				'field4' => $item->field4,
				'field5' => $item->field5,
				'field6' => $item->field6,
				'field7' => $item->field7,
				'field8' => $item->field8
			];
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}
}
