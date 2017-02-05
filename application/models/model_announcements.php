<?php

class Model_announcements extends CI_Model{

  function url_check_post_id($post_id)
  {
    $query = $this->db->select('*')->from('announcements')->where('post_id' , $post_id)->get();
    $row = $query->row();

    if ($row->post_id == $post_id)
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
  }

  function url_check_post_id_bulletin($post_id)
  {
    $query = $this->db->select('*')->from('bulletin')->where('post_id' , $post_id)->get();
    $row = $query->row();

    if ($row->post_id == $post_id)
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
  }

  function url_admincheck_bulletin($post_id)
  {
    $query = $this->db->select('*')->from('bulletin')->where('post_id', $post_id)->get();
    $row = $query->row();

    if($row->user_id == $this->session->userdata('userid'))
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
  }
  
  function announcements($limit, $offset)
  {
    $this->db->limit($limit,$offset);
    $posted_announcements = $this->db->select('*')->from('announcements')->order_by("post_time desc, post_date desc")->get();

    if($posted_announcements->num_rows() > 0)
    {
      return $posted_announcements->result();
    }
    else
    {
      return $posted_announcements->result();
    }
  }

  function get_latestannouncement()
  {
    $query = $this->db->select('*')->order_by("post_time desc, post_date desc")->get('announcements', 1);
    
    if($query->num_rows() > 0)
    {
      return $query->row();
    }
    else
    {
      return FALSE;
    }
  }

  function save_announcements($post_id)
  {
    $edit_ann = array(
    'user_id' => $this->session->userdata('userid'),
    'post_title' => $this->input->post('post_title'),
    'post_content' => $this->input->post('post_content'),
    'post_date' =>  date('m/d/Y'),
    'post_time' => time(),
    );

    $this->db->where('post_id', $post_id);
    $edit = $this->db->update('announcements', $edit_ann);
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
    'post_time' => time(),
    'post_content' => $this->input->post('post_content'),
    );

    $post = $this->db->insert('announcements', $post_announncements);
    return $post;
  }

  function bulletin($limit, $offset)
  {
    $this->db->limit($limit,$offset);
    $posted_bulletin = $this->db->select('*')->from('bulletin')->join('accounts', 'accounts.userid = bulletin.user_id' )->order_by('post_id', 'DESC')->get();


    if($posted_bulletin->num_rows() > 0)
    {
      return $posted_bulletin->result();
    }
    else
    {
      return $posted_bulletin->result();
    }
  }

  function save_bulletin($post_id)
  {
    $edit_bulletin = array(
    'user_id' => $this->session->userdata('userid'),
    'post_title' => $this->input->post('post_title'),
    'post_content' => $this->input->post('post_content'),
    'post_date' =>  date('m/d/Y'),
    'post_time' => time(),
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
          return $query->result_array();
      }
      else
      {
          return $query->result_array();
      }
  }

  function get_previous_bulletin()
  {
    $query = $this->db->select('*')->order_by("post_time desc, post_date desc")->get('bulletin', 5);

    if($query->num_rows() > 0)
    {
        return $query->result_array();
    }
    else
    {
        return $query->result_array();
    }
  }

  function viewmore_bulletin($post_id)
  {
    $query= $this->db->select('*')->where('post_id', $post_id)->join('accounts', 'accounts.userid = bulletin.user_id')->get('bulletin',1);
    return $query->row();
  }
}
