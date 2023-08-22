<?php
class  Chanel_model extends CI_Model
{
	public function getChanel(): object|array
	{
		return $this->db->get('chanel')->result();
	}

	public function InsertChanel($data): bool
	{
		return $this->db->insert('chanel', $data);
	}

	public function getById($id): array
	{
		$this->db->where('id_chanel', $id);
		return $this->db->get('chanel')->result_array();
	}
}
