<?php

  class model_announcements_user extends CI_Model
  {
      function select_ann($post_id)
      {
      $query = $this->db->select('*')->where('post_id',$post_id)->get('announcements',1);
        return $query->row();
      }
  }
