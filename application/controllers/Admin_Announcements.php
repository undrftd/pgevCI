<?php

class Admin_Announcements extends MY_Controller{

  function __construct()
    {   
      parent::__construct();

      $session_admin = $this->session->userdata('isAdmin');
      $session_deact = $this->session->userdata('status');
      $session_data = $this->model_accounts->checksession();
      $session_username = $this->session->userdata('username');
      
      $method = $this->router->fetch_method();

      if(($session_admin == FALSE) && $method != 'login')
      {
          $this->session->set_flashdata( 'message', 'You need to login to access this location' );
          redirect('user_home');
      }
      elseif(($session_deact == 'deact') && $method != 'login')
      {
          $this->session->set_flashdata( 'message', 'You need to login to access this location' );
          redirect('admin_deact');
      }

      if($session_data->username != $session_username)
      {
          redirect('login/signout');
      }
    }
    
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

    $data['count'] = $this->model_ticketing->count_newtickets();
    $data['reserve'] = $this->model_reservation->count_allnewreserve();
    $data['forms'] = $this->model_forms->count_allnewforms();
    $data['order'] = $this->model_announcements->announcements($config['per_page'], $this->uri->segment(3));
    $this->template->load('admin_template', 'view_adminannouncements', $data);
  }

  function post_announcements()
  {
    $data['count'] = $this->model_ticketing->count_newtickets();
    $data['reserve'] = $this->model_reservation->count_allnewreserve();
    $data['forms'] = $this->model_forms->count_allnewforms();
    $this->template->load('admin_template','view_adminannouncements_post', $data);
  }

  function delete_announcements($post_id)
  {
    $this->usertracking->track_this();
    if($this->model_announcements->url_check_post_id($post_id))
    {
      $this->model_announcements->delete_announcements($post_id);
      $this->session->set_flashdata('announcementfeedback', 'You have successfully deleted the announcement.');
      redirect('admin_announcements/announcements');
    }
    else
    {
      $this->session->set_flashdata('announcementfail', 'You cannot delete a non-existent announcement.');
      redirect('admin_announcements/announcements');
    }
  }

  function edit_announcements($post_id)
  {
    $this->usertracking->track_this();
    if($this->model_announcements->url_check_post_id($post_id))
    {
      $data['count'] = $this->model_ticketing->count_newtickets();
      $data['reserve'] = $this->model_reservation->count_allnewreserve();
      $data['forms'] = $this->model_forms->count_allnewforms();
      $data['select'] = $this->model_announcements->select_announcements($post_id);
      $this->template->load('admin_template', 'view_adminannouncements_edit', $data);
    }
    else
    {
      $this->session->set_flashdata('announcementfail', 'You cannot edit a non-existent announcement.');
      redirect('admin_announcements/announcements');
    }
  }

  function save_announcements($post_id)
  {
    $this->usertracking->track_this();
    if($this->model_announcements->url_check_post_id($post_id))
    {
      $this->form_validation->set_rules('post_title','Announcement Title', 'trim|required|min_length[8]|xss_clean');
      $this->form_validation->set_rules('post_content', 'Announcement Content', 'trim|required|min_length[20]|xss_clean');

      if ($this->form_validation->run($post_id) == FALSE)
      {
        $data['count'] = $this->model_ticketing->count_newtickets();
        $data['reserve'] = $this->model_reservation->count_allnewreserve();
        $data['forms'] = $this->model_forms->count_allnewforms();
        $data['select'] = $this->model_announcements->select_announcements($post_id);
        $this->template->load('admin_template','view_adminannouncements_edit', $data);
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
    else
    {
      $this->session->set_flashdata('announcementfail', 'You cannot save a non-existent announcement.');
      redirect('admin_announcements/announcements');
    }
  }


  function post_announcements_admin()
  {
    $this->usertracking->track_this();
    $this->form_validation->set_error_delimiters('<div class="error">','</div>');
    $this->form_validation->set_rules('post_title','Announcement Title', 'trim|required|min_length[8]|xss_clean');
    $this->form_validation->set_rules('post_content', 'Announcement Content', 'trim|required|min_length[20]|xss_clean');

    if ($this->form_validation->run() == FALSE)
    {
      $data['count'] = $this->model_ticketing->count_newtickets();
      $data['reserve'] = $this->model_reservation->count_allnewreserve();
      $data['forms'] = $this->model_forms->count_allnewforms();
      $this->template->load('admin_template','view_adminannouncements_post', $data);
    }
    else
    {
      if($query = $this->model_announcements->post_announcements())
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

    $data['count'] = $this->model_ticketing->count_newtickets();
    $data['reserve'] = $this->model_reservation->count_allnewreserve();
    $data['forms'] = $this->model_forms->count_allnewforms();
    $data['order'] = $this->model_announcements->bulletin($config['per_page'], $this->uri->segment(3));
    $this->template->load('admin_template', 'view_adminbulletin', $data);

  }

  function post_bulletin()
  {
    $data['count'] = $this->model_ticketing->count_newtickets();
    $data['reserve'] = $this->model_reservation->count_allnewreserve();
    $data['forms'] = $this->model_forms->count_allnewforms();
    $this->template->load('admin_template','view_adminbulletin_post', $data);
  }

  function delete_bulletin($post_id)
  {
    $this->usertracking->track_this();
    if($this->model_announcements->url_check_post_id_bulletin($post_id))
    {
      if($this->model_announcements_user->url_usercheck_bulletin($post_id))
      {
        $this->model_announcements->delete_bulletin($post_id);
        $this->session->set_flashdata('bulletinfeedback', 'You have successfully deleted the bulletin.');
        redirect('admin_announcements/bulletin');
      }
      else
      {
        $this->session->set_flashdata('bulletinfail', 'You can only delete your own bulletin.');
        redirect('admin_announcements/bulletin');
      }
    }
    else
    {
      $this->session->set_flashdata('bulletinfail', 'You cannot delete a non-existent bulletin.');
      redirect('admin_announcements/bulletin');
    }
  }

  function edit_bulletin($post_id)
  {
    $this->usertracking->track_this();
    if($this->model_announcements->url_check_post_id_bulletin($post_id))
    {
      if($this->model_announcements_user->url_usercheck_bulletin($post_id))
      {
        $data['count'] = $this->model_ticketing->count_newtickets();
        $data['reserve'] = $this->model_reservation->count_allnewreserve();
        $data['forms'] = $this->model_forms->count_allnewforms();
        $data['select'] = $this->model_announcements->select_bulletin($post_id);
        $this->template->load('admin_template', 'view_adminbulletin_edit', $data);
      }
      else
      {
        $this->session->set_flashdata('bulletinfail', 'You can only edit your own bulletin.');
        redirect('admin_announcements/bulletin');
      }
    }
    else
    {
      $this->session->set_flashdata('bulletinfail', 'You cannot edit a non-existent bulletin.');
      redirect('admin_announcements/bulletin');
    }
  }

  function save_bulletin($post_id)
  {
    $this->usertracking->track_this();
    if($this->model_announcements->url_check_post_id_bulletin($post_id))
    {
      $this->form_validation->set_rules('post_title','Bulletin Title', 'trim|required|min_length[8]|xss_clean');
      $this->form_validation->set_rules('post_content', 'Bulletin Content', 'trim|required|min_length[20]|xss_clean');

      if ($this->form_validation->run($post_id) == FALSE)
      {
        $data['count'] = $this->model_ticketing->count_newtickets();
        $data['reserve'] = $this->model_reservation->count_allnewreserve();
        $data['forms'] = $this->model_forms->count_allnewforms();
        $data['select'] = $this->model_announcements->select_bulletin($post_id);
        $this->template->load('admin_template','view_adminbulletin_edit', $data);
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
    else
    {
      $this->session->set_flashdata('bulletinfail', 'You cannot save a non-existent bulletin.');
      redirect('admin_announcements/bulletin');
    }

  }

  function post_bulletin_admin()
  {
    $this->usertracking->track_this();
    $this->form_validation->set_error_delimiters('<div class="error">','</div>');
    $this->form_validation->set_rules('post_title','Bulletin Title', 'trim|required|min_length[8]|xss_clean');
    $this->form_validation->set_rules('post_content', 'Bulletin Content', 'trim|required|min_length[20]|xss_clean');

    if ($this->form_validation->run() == FALSE)
    {
      $data['count'] = $this->model_ticketing->count_newtickets();
      $data['reserve'] = $this->model_reservation->count_allnewreserve();
      $data['forms'] = $this->model_forms->count_allnewforms();
      $this->template->load('admin_template','view_adminbulletin_post', $data);
    }
    else
    {
      if($query = $this->model_announcements->post_bulletin())
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

      $data['count'] = $this->model_ticketing->count_newtickets();
      $data['reserve'] = $this->model_reservation->count_allnewreserve();
      $data['forms'] = $this->model_forms->count_allnewforms();
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

      $data['count'] = $this->model_ticketing->count_newtickets();
      $data['reserve'] = $this->model_reservation->count_allnewreserve();
      $data['forms'] = $this->model_forms->count_allnewforms();
      $data['order'] = array_slice($searchmodelquery, $this->uri->segment(3),$config['per_page']);
      $this->template->load('admin_template', 'view_adminbulletin', $data);
    }
    else
    {
     redirect('admin_announcements/bulletin');
    }
  }

  function viewmore_bulletin($post_id)
  {
    if($this->model_announcements->url_check_post_id_bulletin($post_id))
    {
      $data['count'] = $this->model_ticketing->count_newtickets();
      $data['reserve'] = $this->model_reservation->count_allnewreserve();
      $data['forms'] = $this->model_forms->count_allnewforms();
      $data['previous'] = $this->model_announcements->get_previous_bulletin();
      $data['result'] = $this->model_announcements->viewmore_bulletin($post_id);
      $this->template->load('admin_template', 'view_adminbulletin_viewmore', $data);
    }
    else
    {
      $this->session->set_flashdata('bulletinfail', 'There is no bulletin associated with that Bulletin ID. Please double-check the Bulletin ID.');
      redirect('admin_announcements/bulletin');
    }
  }

}
