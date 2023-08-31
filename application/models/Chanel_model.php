<?php

class  Chanel_model extends CI_Model
{
	public function getChanel()
	{
		return $this->db->get('chanel')->result();
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
		$this->db->where('user_id', $id_users);
		$this->db->order_by('id_chanel', 'DESC');
		return $this->db->get()->row_array();
	}

	public function getChanelById($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('chanel')->result();
	}


}
