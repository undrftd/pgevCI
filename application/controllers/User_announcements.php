<?php

class User_Announcements extends MY_Controller{
  
  function __construct()
    {   
      parent::__construct();

      $session_admin = $this->session->userdata('isAdmin');
      $session_deact = $this->session->userdata('status');
      $session_data = $this->model_accounts->checksession();
      $session_username = $this->session->userdata('username');

      $method = $this->router->fetch_method();


      if(($session_admin == TRUE) && $method != 'login')
      {
          $this->session->set_flashdata('message', 'You need to login to access this location' );
          redirect('admin_ticketing/new_tickets');
      }
      elseif(($session_deact == 'deact') && $method != 'login')
      {
          $this->session->set_flashdata( 'message', 'You need to login to access this location' );
          redirect('user_deact');
      }

      if($session_data->username != $session_username)
      {
          redirect('login/signout');
      }
    }
  function announcements()
  {
    $config['base_url'] = site_url('user_announcements/announcements');
    $config['total_rows'] = $this->model_announcements_user->count_announcements();
    $config['per_page'] =  6;
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

    $data['order'] = $this->model_announcements_user->select_announcements($config['per_page'], $this->uri->segment(3));
    $this->template->load('user_template','view_userannouncements',$data);
  }

  function bulletin()
  {
    $config['base_url'] = site_url('user_announcements/bulletin');
    $config['total_rows'] = $this->model_announcements_user->count_bulletin();
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

    $data['order'] = $this->model_announcements_user->select_bulletin($config['per_page'], $this->uri->segment(3));;
    $this->template->load('user_template','view_userbulletin',$data);
  }

  function post_bulletin()
  {
    $this->template->load('user_template','view_userbulletin_post');
  }

  function post_bulletin_user()
  {
    $this->form_validation->set_error_delimiters('<div class="error">','</div>');
    $this->form_validation->set_rules('post_title','Bulletin Title', 'trim|required');
    $this->form_validation->set_rules('post_content', 'Bulletin Content', 'trim|required');

    if ($this->form_validation->run() == FALSE)
    {
      $this->template->load('user_template','view_userbulletin_post');
    }
    else
    {
      if($query = $this->model_announcements_user->post_bulletin())
      {
        $this->session->set_flashdata('bulletinfeedback', 'You have successfully posted the bulletin.');
        redirect('user_announcements/bulletin');
      }
    }
  }

  function search_announcement()
  {
    $searchquery = $this->input->get('search', TRUE);
    $searchmodelquery = $this->model_announcements_user->search_announcement($searchquery);

    if(isset($searchquery) and !empty($searchquery))
    {
      $config['base_url'] = site_url('user_announcements/search_announcement/');
      $config['reuse_query_string'] = TRUE;
      $config['total_rows'] = $this->model_announcements_user->countannouncement_search($searchquery);
      $config['per_page'] =  6  ;
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
      $this->template->load('user_template', 'view_userannouncements', $data);
    }
    else
    {
     redirect('user_announcements/announcements');
    }
  }

  function search_bulletin()
  {
    $searchquery = $this->input->get('search', TRUE);
    $searchmodelquery = $this->model_announcements_user->search_bulletin($searchquery);

    if(isset($searchquery) and !empty($searchquery))
    {
      $config['base_url'] = site_url('user_announcements/search_bulletin/');
      $config['reuse_query_string'] = TRUE;
      $config['total_rows'] = $this->model_announcements_user->countbulletin_search($searchquery);
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
      $this->template->load('user_template', 'view_userbulletin', $data);
    }
    else
    {
     redirect('user_announcements/bulletin');
    }
  }

  function viewmore_announcement($post_id)
  {
    if($this->model_announcements_user->url_check_announcements($post_id))
    {
      $data['previous'] = $this->model_announcements_user->get_previous_announcement();
      $data['result'] = $this->model_announcements_user->viewmore_announcement($post_id);
      $this->template->load('user_template', 'view_userannouncements_viewmore', $data);
    }
    else
    {
      $this->session->set_flashdata('announcementfail', 'There is no announcement associated with that Announcement ID. Please double-check the Announcement ID.');
      redirect('user_announcements/announcements');
    }
  }

  function viewmore_bulletin($post_id)
  {
    if($this->model_announcements_user->url_check_bulletin($post_id))
    {
      $data['previous'] = $this->model_announcements_user->get_previous_bulletin();
      $data['result'] = $this->model_announcements_user->viewmore_bulletin($post_id);
      $this->template->load('user_template', 'view_userbulletin_viewmore', $data);
    }
    else
    {
      $this->session->set_flashdata('bulletinfail', 'There is no bulletin associated with that Bulletin ID. Please double-check the Bulletin ID.');
      redirect('user_announcements/bulletin');
    }
  }

  function edit_bulletin($post_id)
  {
    if($this->model_announcements_user->url_check_bulletin($post_id))
    {
      if($this->model_announcements_user->url_usercheck_bulletin($post_id))
      {
        $data['select'] = $this->model_announcements_user->get_bulletin($post_id);
        $this->template->load('user_template', 'view_userbulletin_edit', $data);
      }
      else
      {
        $this->session->set_flashdata('bulletinfail', 'You can only edit your own bulletin.');
        redirect('user_announcements/bulletin');
      }
      
    }
    else
    {
      $this->session->set_flashdata('bulletinfail', 'You cannot edit a non-existent bulletin.');
      redirect('user_announcements/bulletin');
    }
  }

  function save_bulletin($post_id)
  {
    if($this->model_announcements_user->url_check_bulletin($post_id))
    {
      $this->form_validation->set_rules('post_title','Bulletin Title', 'trim|required');
      $this->form_validation->set_rules('post_content', 'Bulletin Content', 'trim|required');

      if ($this->form_validation->run($post_id) == FALSE)
      {
        $data['select'] = $this->model_announcements_user->get_bulletin($post_id);
        $this->template->load('user_template','view_userbulletin_edit', $data);
      }
      else
      {
        if($query = $this->model_announcements_user->save_bulletin($post_id))
        {
          $this->session->set_flashdata('bulletinfeedback', 'You have successfully updated the bulletin.');
          redirect('user_announcements/bulletin');
        }
      }
    }
    else
    {
      $this->session->set_flashdata('bulletinfail', 'You cannot save a non-existent bulletin.');
      redirect('user_announcements/bulletin');
    }
  }


  function delete_bulletin($post_id)
  {
    if($this->model_announcements_user->url_check_bulletin($post_id))
    {
      if($this->model_announcements_user->url_usercheck_bulletin($post_id))
      {
        $this->model_announcements_user->delete_bulletin($post_id);
        $this->session->set_flashdata('bulletinfeedback', 'You have successfully deleted your bulletin.');
        redirect('user_announcements/bulletin');
      }
      else
      {
        $this->session->set_flashdata('bulletinfail', 'You can only delete your own bulletin.');
        redirect('user_announcements/bulletin');
      }
    }
    else
    {
      $this->session->set_flashdata('bulletinfail', 'You cannot delete a non-existent bulletin.');
      redirect('user_announcements/bulletin');
    }
  }


}
