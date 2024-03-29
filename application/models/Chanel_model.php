<?php
defined('BASEPATH') or exit('No direct script access allowed');

class  Chanel_model extends CI_Model
{
	public function getChanel()
	{
		$this->db->select('*');
		$this->db->from('chanel');
		$this->db->join('users', 'chanel.id_users=users.id');
		return $this->db->get()->result();
	}

	public function FilterChanel($start_date, $end_date)
	{
		$this->db->where('created_at >=', $start_date);
		$this->db->where('created_at <=', $end_date);
		return $this->db->get('feeds');
	}

	public function InsertChanel($data)
	{
		return $this->db->insert('chanel', $data);
	}

	public function getById($id)
	{
		$this->db->where('id_chanel', $id);
		return $this->db->get('chanel')->result_array();
	}

	public function listing($id_chanel)
	{
		$this->db->where('id_chanel', $id_chanel);
		return $this->db->get('chanel')->row_array();
	}

	public function getByIdDesc($id_users)
	{
		$this->db->select('id_chanel');
		$this->db->from('chanel');
		$this->db->where('id_users', $id_users);
		$this->db->order_by('id_chanel', 'DESC');
		return $this->db->get()->row_array();
	}

	public function getChanelById($id)
	{
		$this->db->where('id_chanel', $id);
		return $this->db->get('chanel')->result_array();
	}

	public function getByUser($id_users)
	{
		$this->db->select('*');
		$this->db->from('chanel');
		$this->db->join('users', 'chanel.id_users = users.id');
		$this->db->where('chanel.id_users', $id_users);
		return $this->db->get()->result();
	}

	public function getChaneIdByIdUser($id_users,$id_chanel)
	{
		$this->db->select('*');
		$this->db->from('chanel');
		$this->db->join('users', 'chanel.id_users=users.id');
		$this->db->where('chanel.id_users', $id_users);
		$this->db->where('chanel.id_chanel', $id_chanel);
		return $this->db->get()->row_array();
	}

	public function getTotalChanelByUser($id_users)
	{
		$this->db->where('id_users', $id_users);
		return $this->db->count_all_results('chanel');
	}

	public function getAllChanelByUser($id_user)
	{
		$this->db->select('*');
		$this->db->from('chanel');
		$this->db->join('feeds', 'chanel.id_chanel=feeds.chanel_id');
		$this->db->where('chanel.id_users', $id_user);
		return $this->db->get()->result();
	}

	public function Delete($id_chanel)
	{
		$this->db->where('id_chanel', $id_chanel);
		return $this->db->delete('chanel');
	}

	public function update_chanel($id_chanel, $data)
	{
		$this->db->where('id_chanel', $id_chanel);
		return $this->db->update('chanel', $data);
	}
}
