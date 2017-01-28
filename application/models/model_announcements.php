<?php

  class model_announcements extends CI_Model{

    function url_check_post_id($post_id)
    {
      $query = $this->db->select('*')->from('announcements')->where('post_id' , $post_id);
      if ('post_id == $post_id')

      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }

    }


    function save_announcements($post_id)
    {
      $edit_announcements = array(
      'post_title' => $this->input->post('post_title'),
      'post_content' => $this->input->post('post_content'),
      );
      $this->db->where('post_id', $post_id);
      $edit = $this->db->update('announcements', $edit_announcements);
      return $edit;
    }


    function delete_announcements($post_id)
    {

      $this->db->where('post_id',$post_id);
      $delete = $this->db->delete('announcements');
      return $delete;
    }

    function select_announcements($post_id)
    {
      $query = $this->db->select('*')->where('post_id', $post_id)->get('announcements', 1);
      return $query->row();
    }

    function count_announcements()
    {
      $query = $this->db->select('*')->from('announcements')->get();
      return $query->num_rows();
    }



    function post_announcements()
    {
      $post_announncements = array(
        'user_id' => $this->session->userdata('userid'),
        'post_title' => $this->input->post('post_title'),
        'post_date' =>  date('m/d/Y'),
        'post_content' => $this->input->post('post_content'),
      );

      $post = $this->db->insert('announcements', $post_announncements);
      return $post;
    }

    function announcements($limit, $offset)
    {
      $this->db->limit($limit,$offset);
      $posted_announcements = $this->db->select('*')->from('announcements')->order_by('post_date', 'DESC')->get();


      if($posted_announcements->num_rows() > 0)
		    {
			return $posted_announcements->result();
		    }

		      else
		        {
			return $posted_announcements->result();
		        }

    }



  }
