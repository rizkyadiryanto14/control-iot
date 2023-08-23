<?php

class Feeds_model extends CI_Model
{
	public function insert($data)
	{
		return $this->db->insert('feeds', $data);
	}
}
