<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Setting_model extends CI_Model
{
	public function getSetting()
	{
		return $this->db->get('setting')->result();
	}

	public function insertSetting($data)
	{
		return $this->db->insert('setting', $data);
	}

	public function updateSetting($id,$data)
	{
		$this->db->where('id', $id);
		return $this->db->update('setting', $data);
	}

	public function DeleteSetting($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('setting');
	}
}
