<?php

class Model_forms extends CI_Model {

	function get_car_request()
	{
		$query = $this->db->select('*')->from('accounts')->join('upload_carsticker', 'accounts.userid = upload_carsticker.userid' )->get();
		return $query->result();
	}

	function count_car_request()
	{
		$query = $this->db->select('*')->from('accounts')->join('upload_carsticker', 'accounts.userid = upload_carsticker.userid' )->get();
		return $query->num_rows();
	}
	


}