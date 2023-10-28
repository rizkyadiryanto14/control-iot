<?php
defined('BASEPATH') or exit('No direct script access allowed');

class  Auth_model extends CI_Model
{
	/**
	 * @return array|getUser
	 */
	public function getUser(): getUser|array
	{
		return $this->db->get('users')->result();
	}

	public function getUserById($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('users')->row_array();
	}
}
