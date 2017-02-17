<?php

class Model_announcements_user extends CI_Model
{
	function select_announcements($limit, $offset)
    {
    	$this->db->limit($limit, $offset);
		$query = $this->db->select('*')->from('announcements')->order_by("post_time desc, post_date desc")->get();

		if($query->num_rows() > 0)
		{
	    	return $query->result();
		}
		else
		{
	    	return $query->result();
		}
	}

	function count_announcements()
  {
    $query = $this->db->select('*')->from('announcements')->get();
    return $query->num_rows();
  }

  function select_bulletin($limit, $offset)
	{
		$this->db->limit($limit, $offset);
		$query = $this->db->select('*')->from('bulletin')->join('accounts', 'accounts.username = bulletin.username' )->order_by("post_time desc, post_date desc")->get();

		if($query->num_rows() > 0)
		{
    		return $query->result();
		}
		else
		{
    		return $query->result();
		}
	}	

  function get_bulletin($post_id)
  {
    $query = $this->db->select('*')->where('post_id', $post_id)->get('bulletin', 1);
    return $query->row();
  }

	function count_bulletin()
	{
		$query = $this->db->select('*')->from('bulletin')->get();
		return $query->num_rows();
	}

	function post_bulletin()
  	{
	    $post_bulletin = array(
	      'username' => $this->session->userdata('username'),
	      'post_title' => $this->input->post('post_title'),
	      'post_date' =>  date('m/d/Y'),
     	  'post_time' => time(),
	      'post_content' => $this->input->post('post_content'),
	    );

	    $post = $this->db->insert('bulletin', $post_bulletin);
	    return $post;
  	}

	function countannouncement_search($searchquery)
  {
       $query = $this->db->select('*')
                          ->from('announcements')
                          ->where('post_date LIKE "%'.$searchquery .'%"',NULL,FALSE)->get(); 
       return $query->num_rows();
  }

  function search_announcement($searchquery)
  {
    $this->db->select('*')->from('announcements');
    $this->db->where('post_date LIKE "%'.$searchquery .'%"',NULL,FALSE);
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

  function countbulletin_search($searchquery)
  {
       $query = $this->db->select('*')
                          ->from('bulletin')
                          ->where('post_date LIKE "%'.$searchquery .'%"',NULL,FALSE)->get(); 
       return $query->num_rows();
  }

  function search_bulletin($searchquery)
  {
    $this->db->select('*')->from('bulletin');
    $this->db->join('accounts', 'accounts.username = bulletin.username');
    $this->db->where('post_date LIKE "%'.$searchquery .'%"',NULL,FALSE);
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

  function viewmore_announcement($post_id)
  {
    $query= $this->db->select('*')->where('post_id', $post_id)->get('announcements',1);
    return $query->row();
  }

  function viewmore_bulletin($post_id)
  {
    $query= $this->db->select('*')->where('post_id', $post_id)->join('accounts', 'accounts.username = bulletin.username')->get('bulletin',1);
    return $query->row();
  }

  function delete_bulletin($post_id)
  {
    $this->db->where('post_id',$post_id);
    $delete = $this->db->delete('bulletin');
    return $delete;
  }

  function save_bulletin($post_id)
  {
    $edit_bulletin = array(
    'username' => $this->session->userdata('username'),
    'post_title' => $this->input->post('post_title'),
    'post_content' => $this->input->post('post_content'),
    'post_date' =>  date('m/d/Y'),
    'post_time' => time(),
    );
    $this->db->where('post_id', $post_id);
    $edit = $this->db->update('bulletin', $edit_bulletin);
    return $edit;
  }

  function url_check_announcements($post_id)
  {
    $query = $this->db->select('*')->from('announcements')->where('post_id', $post_id)->get();
    $row = $query->row();

    if($row->post_id == $post_id)
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
  }

  function url_usercheck_bulletin($post_id)
  {
    $query = $this->db->select('*')->from('bulletin')->where('post_id', $post_id)->get();
    $row = $query->row();

    if($row->username == $this->session->userdata('username'))
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
  }

  function url_check_bulletin($post_id)
  {
    $query = $this->db->select('*')->from('bulletin')->where('post_id', $post_id)->get();
    $row = $query->row();

    if($row->post_id == $post_id)
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
  }

  function get_previous_announcement()
  {
    $query = $this->db->select('*')->order_by("post_time desc, post_date desc")->get('announcements', 5);

    if($query->num_rows() > 0)
    {
        return $query->result();
    }
    else
    {
        return $query->result();
    }
  }

  function get_previous_bulletin()
  {
    $query = $this->db->select('*')->order_by("post_time desc, post_date desc")->get('bulletin', 5);

    if($query->num_rows() > 0)
    {
        return $query->result();
    }
    else
    {
        return $query->result();
    }
  }

}
