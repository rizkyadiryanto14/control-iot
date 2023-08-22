<?php

class  Auth_model extends CI_Model
{
	public function getUser(): object|array
	{
		return $this->db->get('users')->row_array();
	}
}
