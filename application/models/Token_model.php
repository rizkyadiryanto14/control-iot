<?php

class Token_model extends CI_Model
{
	public function getToken()
	{
		return $this->db->get('token')->row_array();
	}

	public function getTokenByToken($token)
	{
		$this->db->where('token', $token);
		return $this->db->get('token')->result_array();
	}

	public function getReadToken($id_chanel)
	{
		$this->db->where('id_chanel', $id_chanel);
		return $this->db->get('token_read')->result_array();
	}

	public function insertToken($data)
	{
		return $this->db->insert('token', $data);
	}

	public function deleteById($id_users)
	{
		$this->db->where('id_users', $id_users);
		return $this->db->delete('token');
	}

	public function getTokenById($id_chanel)
	{
		$this->db->select('token');
		$this->db->where('id_chanel', $id_chanel);
		return $this->db->get('token')->row_array();
	}

}
