<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
		return $this->db->get('feeds')->result();
	}

	public function getFeedsByIdFIlter($id_chanel, $start_date, $end_date)
	{
		$this->db->where('chanel_id', $id_chanel);
		$this->db->where('created_at >=', $start_date);
		$this->db->where('created_at <=', $end_date);
		$this->db->order_by('created_at', 'ASC');
		return $this->db->get('feeds')->result();
	}

	public function getFeedsByIdWithLimit($id_chanel, $limit, $offset, $start_date = null, $end_date = null)
	{
		if ($start_date && $end_date) {
			$this->db->where('chanel_id', $id_chanel);
			$this->db->where('created_at >=', $start_date);
			$this->db->where('created_at <=', $end_date);
			$this->db->limit($limit, $offset);
			$query = $this->db->get('feeds');
		} else {
			$this->db->where('chanel_id', $id_chanel);
			$this->db->limit($limit, $offset);
			$query = $this->db->get('feeds');
		}

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

	public function insert_peta($data)
	{
		return $this->db->insert('peta',$data);
	}


	public function update_map($id, $data)
	{
		$this->db->where('chanel_id', $id);
		return $this->db->update('peta', $data);
	}

	public function getAllPeta()
	{
		$this->db->select('chanel_id');
		return $this->db->get('peta')->result_array();
	}

	public function get_peta($chanel_id)
	{
		$this->db->where('chanel_id',$chanel_id);
		return $this->db->get('peta')->result();
	}

	public function getLastFeeds($id_chanel)
	{
		$this->db->where('chanel_id', $id_chanel);
		$this->db->order_by('id', 'DESC');
		return $this->db->get('feeds')->row_array();
	}

}
