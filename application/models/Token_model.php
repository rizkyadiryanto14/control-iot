<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

	public function GetAllReadToken()
	{
		$this->db->select('*');
		$this->db->from('token_read');
		$this->db->join('chanel', 'token_read.id_chanel=chanel.id_chanel');
		$this->db->join('users', 'token_read.id_users=users.id');
		return $this->db->get()->result();
	}

	public function GetAllWriteToken()
	{
		$this->db->select('*');
		$this->db->from('token');
		$this->db->join('chanel', 'token.id_chanel=chanel.id_chanel', 'left');
		$this->db->join('users', 'token.id_users=users.id', 'left');
		return $this->db->get()->result();
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

	public function UpdateToken($id_chanel, $data)
	{
		$this->db->where('id_chanel', $id_chanel);
		return $this->db->update('token', $data);
	}

}
