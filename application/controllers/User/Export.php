<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * @property Export_model $Export_model
 */

class Export extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Export_model');
	}

	public function export()
	{
		$data = $this->Export_model->getData();

		if (empty($data)){
			$this->session->set_flashdata('gagal', 'Data not found');
			redirect(base_url('user/chanel'));
		}

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$header = ['created_at', 'channel_id', 'field1', 'field2', 'field3', 'field4', 'field5', 'field6', 'field7', 'field8', 'latitude', 'longitude'];
		$sheet->fromArray([$header], null, 'A1');

		$rowData = [];
		foreach ($data as $row){
			$rowData[] = [
				$row->created_at,
				$row->chanel_id,
				$row->field1,
				$row->field2,
				$row->field3,
				$row->field4,
				$row->field5,
				$row->field6,
				$row->field7,
				$row->field8,
				$row->latitude,
				$row->longitude,
			];
		}
		$sheet->fromArray($rowData, null, 'A2');

		// Buat file Excel
		$writer = new Xlsx($spreadsheet);
		$filename = 'data_export.xlsx';

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header("Content-Disposition: attachment; filename=\"$filename\"");
		$writer->save('php://output');
	}
}
