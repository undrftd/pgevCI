<?php

class Admin_Announcements extends MY_Controller{

  function index()
  {
    $data['order'] = $this->model_announcements_admin->announcements();
    $this->template->load('admin_template', 'view_adminannouncements', $data);

  }

  function admin_bulletin()
  {
    $this->template->load('admin_template', 'view_adminannouncements_bulletin');
  }

  function post_announcements_admin()
  {
    $this->template->load('admin_template','view_admin_announcement_post');
  }


  /*
  function delete_ann($post_id)
  {
    if($this->model_announcements_admin->url_check_post_id($post_id))
    {
      $this->session->set_flashdata('accountsfeedback', 'You have sucessfully delete the Announcement.');
      $this->post_id->model_announcements_admin->delete_ann($post_id);
      redirect('Admin_Announcements');
    }
    else
    {
      $this->session->set_flashdata('accountsfeedback', 'Unable to delete a non existing Announcement.');
      redirect('Admin_Announcements');
    }
  }
  */

  function select_ann($post_id)
  {
    $data['select'] = $this->model_announcements_admin->select_ann($post_id);
    $this->template->load('admin_template', 'view_admin_announcements_edit', $data);
  }

  function save_ann($post_id)
  {
    $this->form_validation->set_rules('post_title','Announcement Title', 'required');
    $this->form_validation->set_rules('post_content', 'Announcement Content', 'required');

    if ($this->form_validation->run($post_id) == FALSE)
    {
          $data['select'] = $this->model_announcements_admin->select_ann($post_id);
          $this->template->load('admin_template','view_admin_announcements_edit', $data);
    }
    else
    {
      if($query = $this->model_announcements_admin->save_ann($post_id))
      {
        redirect('Admin_Announcements');
      }
    }
  }


  function post_announcements($userid)
  {
    $this->form_validation->set_error_delimiters('<div class="error">','</div>');
    $this->form_validation->set_rules('post_title','Announcement Title', 'required');
    $this->form_validation->set_rules('post_content', 'Announcement Content', 'required');

    if ($this->form_validation->run($userid) == FALSE)
    {
          $this->template->load('admin_template','view_admin_announcement_post');

    }
    else
    {
      if($query = $this->model_announcements_admin->post_ann($userid))
      {
        redirect('Admin_Announcements');
      }
    }
  }


  }
