<?php

class Admin_bulletin extends MY_Controller{

  function bulletin()
  {
    $config['base_url'] = site_url('Admin_bulletin/bulletin');
    $config['total_rows'] = $this->model_bulletin_admin->count_bulletin();
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

    $data['order'] = $this->model_bulletin_admin->bulletin($config['per_page'], $this->uri->segment(3));
    $this->template->load('admin_template', 'view_adminbulletin', $data);

  }



  function post_bulletin_admin()
  {
    $this->template->load('admin_template','view_admin_bulletin_post');
  }

  function delete_bulletin($post_id)
  {
    if($this->model_bulletin_admin->url_check_post_id($post_id))
    {

      $this->model_bulletin_admin->delete_bulletin($post_id);
      redirect('Admin_bulletin/bulletin');
    }
    else
    {

      redirect('Admin_bulletin/bulletin');
    }
  }


  function select_bulletin($post_id)
  {
    $data['select'] = $this->model_bulletin_admin->select_bulletin($post_id);
    $this->template->load('admin_template', 'view_admin_bulletin_edit', $data);
  }

  function save_bulletin($post_id)
  {
    $this->form_validation->set_rules('post_title','bulletin Title', 'required');
    $this->form_validation->set_rules('post_content', 'bulletin Content', 'required');

    if ($this->form_validation->run($post_id) == FALSE)
    {
          $data['select'] = $this->model_bulletin_admin->select_bulletin($post_id);
          $this->template->load('admin_template','view_admin_bulletin_edit', $data);
    }
    else
    {
      if($query = $this->model_bulletin_admin->save_bulletin($post_id))
      {
        redirect('Admin_bulletin/bulletin');
      }
    }
  }


  function post_bulletin($userid)
  {
    $this->form_validation->set_error_delimiters('<div class="error">','</div>');
    $this->form_validation->set_rules('post_title','bulletin Title', 'required');
    $this->form_validation->set_rules('post_content', 'bulletin Content', 'required');

    if ($this->form_validation->run($userid) == FALSE)
    {
          $this->template->load('admin_template','view_admin_bulletin_post');

    }
    else
    {
      if($query = $this->model_bulletin_admin->post_bulletin($userid))
      {
        redirect('Admin_bulletin/bulletin');
      }
    }
  }


  }
