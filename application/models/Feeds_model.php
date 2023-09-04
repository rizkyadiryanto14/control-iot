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
//		$this->db->order_by('id', 'DESC');
//		$this->db->limit(1);
		return $this->db->get('feeds')->result();
	}

	public function getFeedsByIdWithLimit($id_chanel, $limit, $offset)
	{
		$this->db->where('chanel_id', $id_chanel);
		$this->db->limit($limit, $offset);
		$query = $this->db->get('feeds');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
	}

	public function countFeedsById($id_chanel)
	{
		$this->db->where('chanel_id', $id_chanel);
		return $this->db->count_all_results('feeds');
	}

}
