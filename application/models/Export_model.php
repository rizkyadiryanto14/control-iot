<?php

class Export_model extends CI_Model
{
	public function getData()
	{
		return $this->db->get('feeds')->result();
	}
}
