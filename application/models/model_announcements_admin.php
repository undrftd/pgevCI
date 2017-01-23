<?php

  class model_announcements_admin extends CI_Model{

    function url_check_myaccount($userid)
    {
      $query = $this->db->select('*')->where('userid' , $userid);
      if ('userid == $userid')
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }

    }

    function post_ann()
    {
      $post_ann = array(
        'user_id' => $this->session->userdata('userid'),
        'post_title' => $this->input->post('post_title'),
        'post_date' =>  date('Y-m-d H:i:s'),
        'post_content' => $this->input->post('post_content'),
      );

      $post = $this->db->insert('announcements', $post_ann);
      return $post;
    }

    function announcements()
    {
      $posted_ann = $this->db->select('*')->from('announcements')->order_by('post_date', 'ASC')->get();

      if($posted_ann->num_rows() > 0)
		    {
			return $posted_ann->result();
		    }

		      else
		        {
			return $posted_ann->result();
		        }

    }



  }
