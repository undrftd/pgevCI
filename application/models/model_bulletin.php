<?php

  class model_bulletin extends CI_Model{

    function url_check_post_id($post_id)
    {
      $query = $this->db->select('*')->from('bulletin')->where('post_id' , $post_id);
      if ('post_id == $post_id')

      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }

    }


    function save_bulletin($post_id)
    {
      $edit_bulletin = array(
      'post_title' => $this->input->post('post_title'),
      'post_content' => $this->input->post('post_content'),
      );
      $this->db->where('post_id', $post_id);
      $edit = $this->db->update('bulletin', $edit_bulletin);
      return $edit;
    }


    function delete_bulletin($post_id)
    {

      $this->db->where('post_id',$post_id);
      $delete = $this->db->delete('bulletin');
      return $delete;
    }

    function select_bulletin($post_id)
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
        'user_id' => $this->session->userdata('userid'),
        'post_title' => $this->input->post('post_title'),
        'post_date' =>  date('m/d/Y'),
        'post_content' => $this->input->post('post_content'),
      );

      $post = $this->db->insert('bulletin', $post_bulletin);
      return $post;
    }

    function bulletin($limit, $offset)
    {
      $this->db->limit($limit,$offset);
      $posted_bulletin = $this->db->select('*')->from('bulletin')->order_by('post_date', 'DESC')->get();


      if($posted_bulletin->num_rows() > 0)
		    {
			return $posted_bulletin->result();
		    }

		      else
		        {
			return $posted_bulletin->result();
		        }

    }



  }
