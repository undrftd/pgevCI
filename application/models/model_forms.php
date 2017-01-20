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

	function delete_carsticker($filename)
	{
		$this->db->where('filename', $filename);
        $delete = $this->db->delete('upload_carsticker');
       
        $path = 'C:/xampp/htdocs/pgevCI/application/uploads/' . $filename;
        unlink($path);
        return $delete;
	}

	function delete_workpermit($filename)
	{
		$this->db->where('filename', $filename);
        $delete = $this->db->delete('upload_workpermit');
       
        $path = 'C:/xampp/htdocs/pgevCI/application/uploads/' . $filename;
        unlink($path);
        return $delete;
	}

	function delete_renovation($filename)
	{
		$this->db->where('filename', $filename);
        $delete = $this->db->delete('upload_renovation');
       
        $path = 'C:/xampp/htdocs/pgevCI/application/uploads/' . $filename;
        unlink($path);
        return $delete;
	}

	function set_cardownloadstatus($filename)
	{
		$status_data = array('status' => 0);
		$this->db->where('filename', $filename);
		$setstatus = $this->db->update('upload_carsticker', $status_data);
		return $setstatus;
	}

	function set_workdownloadstatus($filename)
	{
		$status_data = array('status' => 0);
		$this->db->where('filename', $filename);
		$setstatus = $this->db->update('upload_workpermit', $status_data);
		return $setstatus;
	}

	function set_renovationdownloadstatus($filename)
	{
		$status_data = array('status' => 0);
		$this->db->where('filename', $filename);
		$setstatus = $this->db->update('upload_renovation', $status_data);
		return $setstatus;
	}
	


}