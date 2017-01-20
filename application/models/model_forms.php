<?php

class Model_forms extends CI_Model {

	function get_carsticker($limit, $offset)
	{
		$this->db->limit($limit, $offset);
		$query = $this->db->select('*')->from('accounts')->join('upload_carsticker', 'accounts.userid = upload_carsticker.userid' )->get();
		
		if($query->num_rows() > 0)
    	{
    		return $query->result();
    	}
    	else
    	{
    		return $query->result();
    	}
	}

	function count_carsticker()
	{
		$query = $this->db->select('*')->from('accounts')->join('upload_carsticker', 'accounts.userid = upload_carsticker.userid' )->get();
		return $query->num_rows();
	}

	function get_workpermit($limit, $offset)
	{
		$this->db->limit($limit, $offset);
		$query = $this->db->select('*')->from('accounts')->join('upload_workpermit', 'accounts.userid = upload_workpermit.userid' )->get();
		
		if($query->num_rows() > 0)
    	{
    		return $query->result();
    	}
    	else
    	{
    		return $query->result();
    	}
	}

	function count_workpermit()
	{
		$query = $this->db->select('*')->from('accounts')->join('upload_workpermit', 'accounts.userid = upload_workpermit.userid' )->get();
		return $query->num_rows();
	}

	function get_renovation($limit, $offset)
	{
		$this->db->limit($limit, $offset);
		$query = $this->db->select('*')->from('accounts')->join('upload_renovation', 'accounts.userid = upload_renovation.userid' )->get();
		
		if($query->num_rows() > 0)
    	{
    		return $query->result();
    	}
    	else
    	{
    		return $query->result();
    	}
	}

	function count_renovation()
	{
		$query = $this->db->select('*')->from('accounts')->join('upload_renovation', 'accounts.userid = upload_renovation.userid' )->get();
		return $query->num_rows();
	}

	function delete_carsticker($formid)
	{
		$query = $this->db->select('*')->where('formid', $formid)->get('upload_carsticker',1);
        $result = $query->row();

        $path = 'C:/xampp/htdocs/pgevCI/application/uploads/' . $result->filename;
        unlink($path);
		
		$this->db->where('formid', $formid);
        $delete = $this->db->delete('upload_carsticker');
        return $delete;
	}

	function delete_workpermit($formid)
	{
		$query = $this->db->select('*')->where('formid', $formid)->get('upload_workpermit',1);
        $result = $query->row();

        $path = 'C:/xampp/htdocs/pgevCI/application/uploads/' . $result->filename;
        unlink($path);
		
		$this->db->where('formid', $formid);
        $delete = $this->db->delete('upload_workpermit');
        return $delete;
	}

	function delete_renovation($formid)
	{
		$query = $this->db->select('*')->where('formid', $formid)->get('upload_renovation',1);
        $result = $query->row();

        $path = 'C:/xampp/htdocs/pgevCI/application/uploads/' . $result->filename;
        unlink($path);
		
		$this->db->where('formid', $formid);
        $delete = $this->db->delete('upload_renovation');
        return $delete;
	}

	function set_cardownloadstatus($formid)
	{
		$status_data = array('status' => 0);
		$this->db->where('formid', $formid);
		$setstatus = $this->db->update('upload_carsticker', $status_data);
		return $setstatus;
	}

	function set_workdownloadstatus($formid)
	{
		$status_data = array('status' => 0);
		$this->db->where('formid', $formid);
		$setstatus = $this->db->update('upload_workpermit', $status_data);
		return $setstatus;
	}

	function set_renovationdownloadstatus($formid)
	{
		$status_data = array('status' => 0);
		$this->db->where('formid', $formid);
		$setstatus = $this->db->update('upload_renovation', $status_data);
		return $setstatus;
	}
	


}