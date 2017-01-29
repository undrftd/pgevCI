<?php

class User_announcements extends MY_Controller
{
    function announcements()
    {
        $config['base_url'] = site_url('User_Announcements/announcements');
        $config['total_rows'] = $this->model_announcements_user->count_announcements();
        $config['per_page'] =  5;
        $config['num_links'] = 1;
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


      $data['order'] = $this->model_announcements_user->select_announcements();
      $this->template->load('user_template','view_userannouncements',$data);
    }

    function bulletin()
    {
      $config['base_url'] = site_url('User_bulletin/bulletin');
      $config['total_rows'] = $this->model_announcements_user->count_bulletin();
      $config['per_page'] =  5;
      $config['num_links'] = 1;
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

      $data['order'] = $this->model_announcements_user->select_bulletin();
      $this->template->load('user_template','view_userbulletin',$data);
    }
}
