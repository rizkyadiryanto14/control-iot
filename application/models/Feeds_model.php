<?php

class Feeds_model extends CI_Model
{
	/**
	 * @param $data
	 * @return bool
	 */
	public function insert($data)
	{
		return $this->db->insert('feeds', $data);
	}

	public function getFeedsById($id_chanel)
	{
		$this->db->where('chanel_id', $id_chanel);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		return $this->db->get('feeds')->row();
	}
}
