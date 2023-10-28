<?php

use PhpOffice\PhpSpreadsheet\IOFactory;

class Import_model extends CI_Model
{
	public function InsertData($data)
	{
		return $this->db->insert('feeds', $data);
	}

	public function import($file_path)
	{
		$spreadsheet = IOFactory::load($file_path);
		$worksheet = $spreadsheet->getActiveSheet();
		$highestRow = $worksheet->getHighestRow();
		$created_id = date('Y-m-d H:i:s');

		for ($row = 1; $row <= $highestRow; $row++) {
			$chanel_id 	= $worksheet->getCellByColumnAndRow(1, $row)->getValue();
			$field1 	= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
			$field2 	= $worksheet->getCellByColumnAndRow(3, $row)->getValue();
			$field3 	= $worksheet->getCellByColumnAndRow(4, $row)->getValue();
			$field4 	= $worksheet->getCellByColumnAndRow(5, $row)->getValue();
			$field5 	= $worksheet->getCellByColumnAndRow(6, $row)->getValue();
			$field6 	= $worksheet->getCellByColumnAndRow(7, $row)->getValue();
			$field7 	= $worksheet->getCellByColumnAndRow(8, $row)->getValue();
			$field8 	= $worksheet->getCellByColumnAndRow(9, $row)->getValue();
			$latitude 	= $worksheet->getCellByColumnAndRow(10, $row)->getValue();
			$longitude 	= $worksheet->getCellByColumnAndRow(11, $row)->getValue();

			$data = array(
				'created_at' 	=> $created_id,
				'chanel_id'		=> $chanel_id,
				'field1' 		=> $field1,
				'field2' 		=> $field2,
				'field3' 		=> $field3,
				'field4' 		=> $field4,
				'field5' 		=> $field5,
				'field6' 		=> $field6,
				'field7' 		=> $field7,
				'field8' 		=> $field8,
				'latitude' 		=> $latitude,
				'longitude' 	=> $longitude
			);
			$this->InsertData($data);

//			if (!empty($field1) &&  !empty($chanel_id)) {
//
//			}
		}
		return true;
	}
}
