<?php

class admin_announcements extends MY_Controller{

  function announcements()
  {
    $config['base_url'] = site_url('admin_announcements/announcements');
    $config['total_rows'] = $this->model_announcements->count_announcements();
    $config['per_page'] =  5;
    $config['num_links'] = 5;
    $config['use_page_numbers'] = FALSE;
    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] ="</ul>";
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a>";
    $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    $this->pagination->initialize($config);
    $data['announcementslinks'] = $this->pagination->create_links();

    $data['order'] = $this->model_announcements->announcements($config['per_page'], $this->uri->segment(3));
    $this->template->load('admin_template', 'view_adminannouncements', $data);
  }

  function post_announcements()
  {
    $this->template->load('admin_template','view_adminannouncements_post');
  }

  function delete_announcements($post_id)
  {
    if($this->model_announcements->url_check_post_id($post_id))
    {
      $this->model_announcements->delete_announcements($post_id);
      $this->session->set_flashdata('announcementfeedback', 'You have successfully deleted the announcement.');
      redirect('admin_announcements/announcements');
    }
    else
    {

      redirect('admin_announcements/announcements');
    }
  }

  function viewmore_announcements($post_id)
  {
    $data['select'] = $this->model_announcements->select_announcements($post_id);
    $this->template->load('admin_template', 'view_adminannouncements_viewmore', $data);
  }

  function save_announcements($post_id)
  {
    $this->form_validation->set_rules('post_title','Announcement Title', 'trim|required');
    $this->form_validation->set_rules('post_content', 'Announcement Content', 'trim|required');

    if ($this->form_validation->run($post_id) == FALSE)
    {
      $data['select'] = $this->model_announcements->select_announcements($post_id);
      $this->template->load('admin_template','view_adminannouncements_viewmore', $data);
    }
    else
    {
      if($query = $this->model_announcements->save_announcements($post_id))
      {
        $this->session->set_flashdata('announcementfeedback', 'You have successfully updated the announcement.');
        redirect('admin_announcements/announcements');
      }
    }
  }


  function post_announcements_admin()
  {
    $this->form_validation->set_error_delimiters('<div class="error">','</div>');
    $this->form_validation->set_rules('post_title','Announcement Title', 'trim|required');
    $this->form_validation->set_rules('post_content', 'Announcement Content', 'trim|required');

    if ($this->form_validation->run() == FALSE)
    {
      $this->template->load('admin_template','view_adminannouncements_post');
    }
    else
    {
      if($query = $this->model_announcements->post_announcements($userid))
      {
        $this->session->set_flashdata('announcementfeedback', 'You have successfully posted an announcement.');
        redirect('admin_announcements/announcements');
      }
    }
  }

  function bulletin()
  {
    $config['base_url'] = site_url('admin_announcements/bulletin');
    $config['total_rows'] = $this->model_announcements->count_bulletin();
    $config['per_page'] =  5;
    $config['num_links'] = 5;
    $config['use_page_numbers'] = FALSE;
    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] ="</ul>";
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a>";
    $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    $this->pagination->initialize($config);
    $data['bulletinlinks'] = $this->pagination->create_links();

    $data['order'] = $this->model_announcements->bulletin($config['per_page'], $this->uri->segment(3));
    $this->template->load('admin_template', 'view_adminbulletin', $data);

  }

  function post_bulletin()
  {
    $this->template->load('admin_template','view_adminbulletin_post');
  }

  function delete_bulletin($post_id)
  {
    if($this->model_announcements->url_check_post_id($post_id))
    {
      $this->model_announcements->delete_bulletin($post_id);
      $this->session->set_flashdata('bulletinfeedback', 'You have successfully deleted the bulletin.');
      redirect('admin_announcements/bulletin');
    }
    else
    {
      redirect('admin_announcements/bulletin');
    }
  }

  function viewmore_bulletin($post_id)
  {
    $data['select'] = $this->model_announcements->select_bulletin($post_id);
    $this->template->load('admin_template', 'view_adminbulletin_viewmore', $data);
  }

  function save_bulletin($post_id)
  {
    $this->form_validation->set_rules('post_title','Bulletin Title', 'trim|required');
    $this->form_validation->set_rules('post_content', 'Bulletin Content', 'trim|required');

    if ($this->form_validation->run($post_id) == FALSE)
    {
      $data['select'] = $this->model_announcements->select_bulletin($post_id);
      $this->template->load('admin_template','view_adminbulletin_viewmore', $data);
    }
    else
    {
      if($query = $this->model_announcements->save_bulletin($post_id))
      {
        $this->session->set_flashdata('bulletinfeedback', 'You have successfully updated the bulletin.');
        redirect('admin_announcements/bulletin');
      }
    }
  }


  function post_bulletin_admin()
  {
    $this->form_validation->set_error_delimiters('<div class="error">','</div>');
    $this->form_validation->set_rules('post_title','Bulletin Title', 'trim|required');
    $this->form_validation->set_rules('post_content', 'Bulletin Content', 'trim|required');

    if ($this->form_validation->run() == FALSE)
    {
      $this->template->load('admin_template','view_adminbulletin_post');
    }
    else
    {
      if($query = $this->model_announcements->post_bulletin($userid))
      {
        $this->session->set_flashdata('bulletinfeedback', 'You have successfully posted a bulletin.');
        redirect('admin_announcements/bulletin');
      }
    }
  }

  function search_announcement()
  {
    $searchquery = $this->input->get('search', TRUE);
    $searchmodelquery = $this->model_announcements->search_announcement($searchquery);

    if(isset($searchquery) and !empty($searchquery))
    {
      $config['base_url'] = site_url('admin_announcements/search_announcement/');
      $config['reuse_query_string'] = TRUE;
      $config['total_rows'] = $this->model_announcements->countannouncement_search($searchquery);
      $config['per_page'] =  5;
      $config['num_links'] = 5;
      $config['use_page_numbers'] = FALSE;
      $config['full_tag_open'] = "<ul class='pagination'>";
      $config['full_tag_close'] ="</ul>";
      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';
      $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a>";
      $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
      $config['next_tag_open'] = "<li>";
      $config['next_tagl_close'] = "</li>";
      $config['prev_tag_open'] = "<li>";
      $config['prev_tagl_close'] = "</li>";
      $config['first_tag_open'] = "<li>";
      $config['first_tagl_close'] = "</li>";
      $config['last_tag_open'] = "<li>";
      $config['last_tagl_close'] = "</li>";
      $this->pagination->initialize($config);
      $data['announcementslinks'] = $this->pagination->create_links();

      $data['order'] = array_slice($searchmodelquery, $this->uri->segment(3),$config['per_page']);
      $this->template->load('admin_template', 'view_adminannouncements', $data);
    }
    else
    {
     redirect('admin_announcements/announcements');
    }
  }

  function search_bulletin()
  {
    $searchquery = $this->input->get('search', TRUE);
    $searchmodelquery = $this->model_announcements->search_bulletin($searchquery);

    if(isset($searchquery) and !empty($searchquery))
    {
      $config['base_url'] = site_url('admin_announcements/search_bulletin/');
      $config['reuse_query_string'] = TRUE;
      $config['total_rows'] = $this->model_announcements->countbulletin_search($searchquery);
      $config['per_page'] =  5;
      $config['num_links'] = 5;
      $config['use_page_numbers'] = FALSE;
      $config['full_tag_open'] = "<ul class='pagination'>";
      $config['full_tag_close'] ="</ul>";
      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';
      $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a>";
      $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
      $config['next_tag_open'] = "<li>";
      $config['next_tagl_close'] = "</li>";
      $config['prev_tag_open'] = "<li>";
      $config['prev_tagl_close'] = "</li>";
      $config['first_tag_open'] = "<li>";
      $config['first_tagl_close'] = "</li>";
      $config['last_tag_open'] = "<li>";
      $config['last_tagl_close'] = "</li>";
      $this->pagination->initialize($config);
      $data['bulletinlinks'] = $this->pagination->create_links();

      $data['order'] = array_slice($searchmodelquery, $this->uri->segment(3),$config['per_page']);
      $this->template->load('admin_template', 'view_adminbulletin', $data);
    }
    else
    {
     redirect('admin_announcements/bulletin');
    }
  }

}
