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

    function count_downloadedsticker()
    {
        $query = $this->db->select('*')->from('accounts')->join('upload_carsticker', 'accounts.userid = upload_carsticker.userid' )->where('status', 1)->get();
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

    function count_downloadedpermit()
    {
        $query = $this->db->select('*')->from('accounts')->join('upload_workpermit', 'accounts.userid = upload_workpermit.userid' )->where('status', 1)->get();
        return $query->num_rows();
    }

	function get_renovation($limit, $offset)
	{
		$this->db->limit($limit, $offset);
		$query = $this->db->select('*')->from('accounts')->join('upload_renovation', 'accounts.userid = upload_renovation.userid' )->where('status', 1)->get();
		
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

    function count_downloadedrenovation()
    {
        $query = $this->db->select('*')->from('accounts')->join('upload_renovation', 'accounts.userid = upload_renovation.userid' )->where('status', 1)->get();
        return $query->num_rows();
    }

	function url_check_carsticker($formid)
    {
        $query = $this->db->select('*')->where('formid', $formid)->get('upload_carsticker',1);
        $result = $query->row();
        
        if($query->num_rows() > 0)
        {
            if($formid == $result->formid)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }

    function url_check_workpermit($formid)
    {
        $query = $this->db->select('*')->where('formid', $formid)->get('upload_workpermit',1);
        $result = $query->row();
        
        if($query->num_rows() > 0)
        {
            if($formid == $result->formid)
            {
                    return TRUE;
            }
            else
            {
                    return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }

    function url_check_renovation($formid)
    {
        $query = $this->db->select('*')->where('formid', $formid)->get('upload_renovation',1);
        $result = $query->row();
        
        if($query->num_rows() > 0)
        {
            if($formid == $result->formid)
            {
                    return TRUE;
            }
            else
            {
                    return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }

    function countsticker_search($searchquery)
    {
         $query = $this->db->select('*')
                            ->from('accounts')
                            ->join('upload_carsticker', 'accounts.userid = upload_carsticker.userid' )
                            ->where('(CONCAT(firstname," ",lastname) LIKE "%'.$searchquery .'%" OR firstname LIKE "%'.$searchquery .'%" OR lastname LIKE "%'.$searchquery .'%" OR accounts.username LIKE "%'.$searchquery .'%" OR address LIKE "%'.$searchquery .'%" )',NULL,FALSE)->get(); 
         return $query->num_rows();
    }

    function countpermit_search($searchquery)
    {
         $query = $this->db->select('*')
                            ->from('accounts')
                            ->join('upload_workpermit', 'accounts.userid = upload_workpermit.userid' )
                            ->where('(CONCAT(firstname," ",lastname) LIKE "%'.$searchquery .'%" OR firstname LIKE "%'.$searchquery .'%" OR lastname LIKE "%'.$searchquery .'%" OR accounts.username LIKE "%'.$searchquery .'%" OR address LIKE "%'.$searchquery .'%" )',NULL,FALSE)->get(); 
         return $query->num_rows();
    }

    function countrenovation_search($searchquery)
    {
         $query = $this->db->select('*')
                            ->from('accounts')
                            ->join('upload_renovation', 'accounts.userid = upload_renovation.userid' )
                            ->where('(CONCAT(firstname," ",lastname) LIKE "%'.$searchquery .'%" OR firstname LIKE "%'.$searchquery .'%" OR lastname LIKE "%'.$searchquery .'%" OR accounts.username LIKE "%'.$searchquery .'%" OR address LIKE "%'.$searchquery .'%" )',NULL,FALSE)->get(); 
         return $query->num_rows();
    }

    function search_carsticker($searchquery)
    {
      $this->db->select('*')->from('accounts');
      $this->db->join('upload_carsticker', 'accounts.userid = upload_carsticker.userid' );
      $this->db->where('(CONCAT(firstname," ",lastname) LIKE "%'.$searchquery .'%" OR firstname LIKE "%'.$searchquery .'%" OR lastname LIKE "%'.$searchquery .'%" OR accounts.username LIKE "%'.$searchquery .'%" OR address LIKE "%'.$searchquery .'%" )',NULL,FALSE);
      $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return $query->result();
        }
    }

    function search_workpermit($searchquery)
    {
      $this->db->select('*')->from('accounts');
      $this->db->join('upload_workpermit', 'accounts.userid = upload_workpermit.userid' );
      $this->db->where('(CONCAT(firstname," ",lastname) LIKE "%'.$searchquery .'%" OR firstname LIKE "%'.$searchquery .'%" OR lastname LIKE "%'.$searchquery .'%" OR accounts.username LIKE "%'.$searchquery .'%" OR address LIKE "%'.$searchquery .'%" )',NULL,FALSE);
      $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return $query->result();
        }
    }

    function search_renovation($searchquery)
    {
      $this->db->select('*')->from('accounts');
      $this->db->join('upload_renovation', 'accounts.userid = upload_renovation.userid' );
      $this->db->where('(CONCAT(firstname," ",lastname) LIKE "%'.$searchquery .'%" OR firstname LIKE "%'.$searchquery .'%" OR lastname LIKE "%'.$searchquery .'%" OR accounts.username LIKE "%'.$searchquery .'%" OR address LIKE "%'.$searchquery .'%" )',NULL,FALSE);
      $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return $query->result();
        }
    }

	function delete_carsticker($formid)
	{
		$query = $this->db->select('*')->where('formid', $formid)->get('upload_carsticker',1);
        $result = $query->row();

        $real = realpath(APPPATH);
        $path = $real . '/uploads/' . $result->filename;
        unlink($path);
		
		$this->db->where('formid', $formid);
        $delete = $this->db->delete('upload_carsticker');
        return $delete;
	}

	function delete_workpermit($formid)
	{
		$query = $this->db->select('*')->where('formid', $formid)->get('upload_workpermit',1);
        $result = $query->row();

        $real = realpath(APPPATH);
        $path = $real . '/uploads/' . $result->filename;
        unlink($path);
		
		$this->db->where('formid', $formid);
        $delete = $this->db->delete('upload_workpermit');
        return $delete;
	}

	function delete_renovation($formid)
	{
		$query = $this->db->select('*')->where('formid', $formid)->get('upload_renovation',1);
        $result = $query->row();

        $real = realpath(APPPATH);
        $path = $real . '/uploads/' . $result->filename;
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

function count_allnewforms()
    {
        $query = $this->db->select('*')->from('accounts')->join('upload_carsticker', 'accounts.userid = upload_carsticker.userid' )->where('status', 1)->get();
        $query2 = $this->db->select('*')->from('accounts')->join('upload_workpermit', 'accounts.userid = upload_workpermit.userid' )->where('status', 1)->get();
        $query3 = $this->db->select('*')->from('accounts')->join('upload_renovation', 'accounts.userid = upload_renovation.userid' )->where('status', 1)->get();
        
        $result = $query->num_rows() + $query2->num_rows() + $query3->num_rows();
        return $result;
    }
	


}