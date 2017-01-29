<?php

class Model_announcements_user extends CI_Model
{
	function select_announcements($limit, $offset)
    {
    	$this->db->limit($limit, $offset);
		$query = $this->db->select('*')->from('announcements')->order_by('post_id', 'desc')->get();

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
		$query = $this->db->select('*')->from('bulletin')->join('accounts', 'accounts.userid = bulletin.user_id' )->order_by('post_id', 'desc')->get();

		if($query->num_rows() > 0)
		{
    		return $query->result();
		}
		else
		{
    		return $query->result();
		}
	}	

	function count_bulletin()
	{
		$query = $this->db->select('*')->from('bulletin')->get();
		return $query->num_rows();
	}

	function post_bulletin()
  	{
	    $post_bulletin = array(
	      'user_id' => $this->session->userdata('userid'),
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
      $this->db->join('accounts', 'accounts.userid = bulletin.user_id');
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

}
