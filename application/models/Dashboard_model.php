<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
	public function getTotalUser()
	{
		$this->db->where('role', 'user');
		return $this->db->get('users')->num_rows();
	}

	public function getTotalChanel()
	{
		return $this->db->get('chanel')->num_rows();
	}

	public function getTotalTokenWrite()
	{
		return $this->db->get('token')->num_rows();
	}

	public function getTotalTokenRead()
	{
		return $this->db->get('token_read')->num_rows();
	}
}
