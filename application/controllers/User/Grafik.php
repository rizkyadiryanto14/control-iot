<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Listing_model $Listing_model
 * @property Feeds_model $Feeds_model
 * @property Chanel_model $Chanel_model
 * @property Bazzer_model $Bazzer_model
 */
class Grafik extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Listing_model');
		$this->load->model('Feeds_model');
		$this->load->model('Chanel_model');
		$this->load->model('Bazzer_model');

	}

	public function index(): void
	{
		$listing['listing_role'] = $this->Listing_model->listing_role($this->session->userdata('role'));
		$data =[
			'chanel'			=> $this->Chanel_model->getChanelById($this->session->userdata('id_user')),
			'list_chanel'		=> $this->Chanel_model->getByUser($this->session->userdata('id_user'))
		];
		$this->load->view('partials/header');
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar', $listing);
		$this->load->view('back/user/grafik/list', $data);
		$this->load->view('partials/footer');
	}

	public function Grafik($id_chanel)
	{
		$choice = $this->input->post('choice');
		$mulai = $this->input->post('mulai');
		$end = $this->input->post('end');

		$listing['listing_role'] 	= $this->Listing_model->listing_role($this->session->userdata('role'));
		$config['base_url'] 		= base_url("User/Grafik/Grafik/$id_chanel");
		$config['total_rows'] 		= $this->Feeds_model->countFeedsById($id_chanel);
		$config['uri_segment'] 		= 5;
		$config['full_tag_open'] 	= '<div class="pagination">';
		$config['full_tag_close'] 	= '</div>';

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

		if ($mulai != null && $end != null) {
			$config['per_page'] = 15;
			if ($choice == 1){
				$data = [
					'grafik'		=>  $this->Feeds_model->getFeedsByIdWithLimit($id_chanel, $config['per_page'], $page, $mulai, $end),
					'filterGrafik'	=> 	$this->Feeds_model->getFeedsByIdFIlter($id_chanel,$mulai,$end),
					'chanel'		=> 	$this->Chanel_model->getChaneIdByIdUser($this->session->userdata('id_user'), $id_chanel),
					'bazzer_status'	=>  $this->Bazzer_model->getStatusBazzer(),
					'peta'			=> 	$this->Feeds_model->get_peta($id_chanel),
					'last_feeds'	=>  $this->Feeds_model->getLastFeeds($id_chanel)
				];
				$this->load->view('partials/header');
				$this->load->view('partials/navbar');
				$this->load->view('partials/sidebar', $listing);
				$this->load->view('back/user/grafik/grafikFilter', $data);
				$this->load->view('partials/footer');
			}else{
				$data = [
					'grafik'		=>  $this->Feeds_model->getFeedsByIdWithLimit($id_chanel, $config['per_page'], $page, $mulai, $end),
					'chanel'		=>  $this->Chanel_model->getChaneIdByIdUser($this->session->userdata('id_user'), $id_chanel),
					'bazzer_status'	=>  $this->Bazzer_model->getStatusBazzer(),
					'peta'			=> 	$this->Feeds_model->get_peta($id_chanel),
					'last_feeds'	=>  $this->Feeds_model->getLastFeeds($id_chanel)
				];

				$this->load->view('partials/header');
				$this->load->view('partials/navbar');
				$this->load->view('partials/sidebar', $listing);
				$this->load->view('back/user/grafik/grafik', $data);
				$this->load->view('partials/footer');
			}
		} else {
			$config['per_page'] = 10;
			$data['grafik'] 		= $this->Feeds_model->getFeedsByIdWithLimit($id_chanel, $config['per_page'], $page);
			$data['chanel']			= $this->Chanel_model->getChaneIdByIdUser($this->session->userdata('id_user'), $id_chanel);
			$data['bazzer_status'] 	= $this->Bazzer_model->getStatusBazzer();
			$data['peta']			= $this->Feeds_model->get_peta($id_chanel);
			$data['last_feeds'] 	= $this->Feeds_model->getLastFeeds($id_chanel);
			$this->load->view('partials/header');
			$this->load->view('partials/navbar');
			$this->load->view('partials/sidebar', $listing);
			$this->load->view('back/user/grafik/grafik', $data);
			$this->load->view('partials/footer');
		}
	}

	public function filteredGrafik($id_chanel,$mulai, $end)
	{
		$data = $this->Feeds_model->getFeedsByIdFIlter($id_chanel, $mulai, $end);
		foreach ($data as $item){
			$response = [
				'created_at' 	=> $item->created_at,
				'field1' 		=> $item->field1,
				'field2' 		=> $item->field2,
				'field3' 		=> $item->field3,
				'field4' 		=> $item->field4,
				'field5' 		=> $item->field5,
				'field6' 		=> $item->field6,
				'field7' 		=> $item->field7,
				'field8' 		=> $item->field8
			];
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}


	public function getJsonData($id_chanel)
	{
		$data = $this->Feeds_model->getFeedsById($id_chanel);
		foreach ($data as $item) {
			$response = [
				'created_at' 	=> $item->created_at,
				'field1' 		=> $item->field1,
				'field2' 		=> $item->field2,
				'field3' 		=> $item->field3,
				'field4' 		=> $item->field4,
				'field5' 		=> $item->field5,
				'field6' 		=> $item->field6,
				'field7' 		=> $item->field7,
				'field8' 		=> $item->field8
			];
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	public function update_map()
	{
		$chanel_id	= $this->input->post('chanel_id');
		$cekData = $this->Feeds_model->get_peta($chanel_id);

		foreach ($cekData as $cekDatum) {
			if ($cekDatum->chanel_id == $chanel_id){
				$data = [
					'longitude'		=> $this->input->post('longitude'),
					'latitude'		=> $this->input->post('latitude')
				];

			}else {
				$datas = [
					'longitude'		=> $this->input->post('longitude'),
					'latitude'		=> $this->input->post('latitude'),
					'chanel_id'		=> $chanel_id
				];
				$update = $this->Feeds_model->insert_peta($datas);
				if ($update){
					$this->session->set_flashdata('sukses','Success Update Data');
					redirect(base_url('user/grafik'));
				}else {
					$this->session->set_flashdata('gagal','wrong Update Data');
					redirect(base_url('user/grafik'));
				}
			}
		}

		$update = $this->Feeds_model->update_map($chanel_id, $data);
		if ($update){
			$this->session->set_flashdata('sukses','Success Update Data');
			redirect(base_url('user/grafik'));
		}else {
			$this->session->set_flashdata('gagal','wrong Update Data');
			redirect(base_url('user/grafik'));
		}

	}

	public function getJsonPeta($chanel_id)
	{
		$koordinat = $this->Feeds_model->get_peta($chanel_id);
		$this->output->set_content_type('application/json')->set_output(json_encode($koordinat));
	}
}
