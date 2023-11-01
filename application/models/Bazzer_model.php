<?php

class Bazzer_model extends CI_Model
{
	public function getStatusBazzer()
	{
		return $this->db->get('bazzer')->row_array();
	}

	public function updateBazzer($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('bazzer',$data);
	}
}
