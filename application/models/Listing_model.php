<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Listing_model extends CI_Model
{
	public function listing_role($role)
	{
		$this->db->select('role');
		$this->db->where('role', $role);
		return $this->db->get('users')->row_array();
	}
}
