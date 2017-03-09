<?php

class Model_forms_user extends CI_Model {

	function upload_carsticker()
	{
		$date = date("m/d/Y", now());
		$this->db->insert('upload_carsticker', array('date_requested' => $date, 'filename' => $this->upload->file_name, 'userid' => $this->session->userdata('userid')));
	}

	function upload_workpermit()
	{
		$date = date("m/d/Y", now());
		$this->db->insert('upload_workpermit', array('date_requested' => $date, 'filename' => $this->upload->file_name, 'userid' => $this->session->userdata('userid')));
	}

	function upload_renovation()
	{
		$date = date("m/d/Y", now());
		$this->db->insert('upload_renovation', array('date_requested' => $date, 'filename' => $this->upload->file_name, 'userid' => $this->session->userdata('userid')));
	}

	function count_mysticker()
	{
		$query = $this->db->select('*')->from('upload_carsticker')->where('userid', $this->session->userdata('userid'))->get();
		return $query->num_rows();
	}

	function count_myworkpermit()
	{
		$query = $this->db->select('*')->from('upload_workpermit')->where('userid', $this->session->userdata('userid'))->get();
		return $query->num_rows();
	}

	function count_myrenovation()
	{
		$query = $this->db->select('*')->from('upload_renovation')->where('userid', $this->session->userdata('userid'))->get();
		return $query->num_rows();
	}

	function get_mycarsticker($limit, $offset)
	{
		$this->db->limit($limit,$offset);
		$query = $this->db->select('*')->from('upload_carsticker')->where('userid', $this->session->userdata('userid'))->order_by("status asc, date_requested asc")->get();
		
		if($query->num_rows() > 0)
    	{
    		return $query->result();
    	}
    	else
    	{
    		return $query->result();
    	}
	}

	function get_myworkpermit($limit, $offset)
	{
		$this->db->limit($limit,$offset);
		$query = $this->db->select('*')->from('upload_workpermit')->where('userid', $this->session->userdata('userid'))->order_by("status asc, date_requested asc")->get();
		
		if($query->num_rows() > 0)
    	{
    		return $query->result();
    	}
    	else
    	{
    		return $query->result();
    	}
	}

	function get_myrenovation($limit, $offset)
	{
		$this->db->limit($limit,$offset);
		$query = $this->db->select('*')->from('upload_renovation')->where('userid', $this->session->userdata('userid'))->order_by("status asc, date_requested asc")->get();
		
		if($query->num_rows() > 0)
    	{
    		return $query->result();
    	}
    	else
    	{
    		return $query->result();
    	}
	}

	function get_car_id($formid)
	{
		$query = $this->db->from('upload_carsticker')->where('formid', $formid)->get();
		
		if($query->num_rows() > 0)
    	{
    		return $query->row();
    	}
    	else
    	{
    		return $query->row();
    	}
	}


}

