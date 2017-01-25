<?php

class User_announcements extends MY_Controller
{
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
    function index()
    {
      $data['order'] = $this->model_announcements_admin->announcements();
      $this->template->load('user_template','view_userannouncements',$data);
    }

    function select_ann($post_id)
    {
      $data['select'] = $this->model_announcements_admin->select_ann($post_id);
      $this->template->load('admin_template', 'view_userannouncements', $data);
    }

}
