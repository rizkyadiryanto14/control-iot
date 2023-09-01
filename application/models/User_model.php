<?php

class User_model extends CI_Model
{
	protected $table = 'users';

	public function getAllData()
	{
		return $this->db->get($this->table)->result();
	}

	public function insert_user($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update_user($id)
	{
		$this->db->where('id', $id);
		return $this->db->update('users');
	}

	public function delete_user($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('users');
	}
}
