<?php

class User_Forms extends MY_Controller {

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
      else
      {
          redirect('unverified');
      }

      if($session_data->username != $session_username)
      {
          redirect('login/signout');
      }
    }
    
	function car_sticker()
	{
    $data['approvedreserve'] = $this->model_reservation->count_approved();
    $data['deniedreserve'] = $this->model_reservation->count_denied();
    $data['count'] = $this->model_tracking_user->count_activetickets();
		$this->template->load('user_template', 'view_userforms_carsticker', $data);	
	}

	function work_permit()
	{
    $data['approvedreserve'] = $this->model_reservation->count_approved();
    $data['deniedreserve'] = $this->model_reservation->count_denied();
    $data['count'] = $this->model_tracking_user->count_activetickets();
		$this->template->load('user_template', 'view_userforms_workpermit', $data);
	}

	function renovation()
	{
    $data['approvedreserve'] = $this->model_reservation->count_approved();
    $data['deniedreserve'] = $this->model_reservation->count_denied();
    $data['count'] = $this->model_tracking_user->count_activetickets();
		$this->template->load('user_template', 'view_userforms_renovation', $data);
	}

  function my_carsticker()
  {
    $config['base_url'] = site_url('user_forms/my_carsticker');
    $config['total_rows'] = $this->model_forms_user->count_mysticker();
    $config['per_page'] =  20;
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
    $data['myformslink'] = $this->pagination->create_links();

    $data['approvedreserve'] = $this->model_reservation->count_approved();
    $data['deniedreserve'] = $this->model_reservation->count_denied();
    $data['count'] = $this->model_tracking_user->count_activetickets();
    $data['myforms'] = $this->model_forms_user->get_mycarsticker($config['per_page'], $this->uri->segment(3)); 
    $this->template->load('user_template','view_userforms_application_carsticker', $data);     
  }

  function my_workpermit()
  {
    $config['base_url'] = site_url('user_forms/my_workpermit');
    $config['total_rows'] = $this->model_forms_user->count_myworkpermit();
    $config['per_page'] =  20;
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
    $data['myformslink'] = $this->pagination->create_links();

    $data['approvedreserve'] = $this->model_reservation->count_approved();
    $data['deniedreserve'] = $this->model_reservation->count_denied();
    $data['count'] = $this->model_tracking_user->count_activetickets();
    $data['myforms'] = $this->model_forms_user->get_myworkpermit($config['per_page'], $this->uri->segment(3)); 
    $this->template->load('user_template','view_userforms_application_workpermit', $data);     
  }  

  function my_renovation()
  {
    $config['base_url'] = site_url('user_forms/my_renovation');
    $config['total_rows'] = $this->model_forms_user->count_myrenovation();
    $config['per_page'] =  20;
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
    $data['myformslink'] = $this->pagination->create_links();

    $data['approvedreserve'] = $this->model_reservation->count_approved();
    $data['deniedreserve'] = $this->model_reservation->count_denied();
    $data['count'] = $this->model_tracking_user->count_activetickets();
    $data['myforms'] = $this->model_forms_user->get_myrenovation($config['per_page'], $this->uri->segment(3)); 
    $this->template->load('user_template','view_userforms_application_renovation', $data);     
  }  

	function download($filename) 
	{
      $real = realpath(APPPATH);
      $path = $real . '/downloads/' . $filename;
      $data = file_get_contents($path);
		  $name = $filename;

		force_download($name, $data);
	}    

	function upload_carsticker()
	{
      $real = realpath(APPPATH);
	    $config['upload_path']          = $real . '/uploads/';
      $config['allowed_types']        = 'doc|docx|jpg|pdf|png';
      $config['max_size']             = '52428800';
      $config['max_width']            = 5312;
      $config['max_height']           = 2988;
      $config['file_name'] = "Car_Sticker_" . $this->session->userdata('username');

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('file'))
      {
      	$this->model_forms_user->upload_carsticker();
      	$this->session->set_flashdata('carsuccess', 'File has been successfully uploaded. For the mean time, please wait for the forms to be processed by the admin.');          
      	redirect('user_forms/car_sticker');
      }
      else
      {
          $this->session->set_flashdata('carfail', $this->upload->display_errors());  
          redirect('user_forms/car_sticker');
    }
	}	      

	function upload_workpermit()
	{
		    $real = realpath(APPPATH);
        $config['upload_path']          = $real . '/uploads/';
        $config['allowed_types']        = 'doc|docx|jpg|pdf|png';
        $config['max_size']             = '52428800';
        $config['max_width']            = 5312;
        $config['max_height']           = 2988;
        $config['file_name'] = "Work_Permit_" . $this->session->userdata('username');

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file'))
        {
        	$this->model_forms_user->upload_workpermit();
        	$this->session->set_flashdata('permitsuccess', 'File has been successfully uploaded. For the mean time, please wait for the forms to be processed by the admin.');          
        	redirect('user_forms/work_permit');	
        }
        else
        {
            $this->session->set_flashdata('permitfail', $this->upload->display_errors());  
            redirect('user_forms/work_permit'); 
	    }
	}	        

	function upload_renovation()
	{
		    $real = realpath(APPPATH);
        $config['upload_path']          = $real . '/uploads/';
        $config['allowed_types']        = 'doc|docx|jpg|pdf|png';
        $config['max_size']             = '52428800';
        $config['max_width']            = 5312;
        $config['max_height']           = 2988;
        $config['file_name'] = "Renovation_" . $this->session->userdata('username');

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file'))
        {
        	$this->model_forms_user->upload_renovation();
        	$this->session->set_flashdata('renovatesuccess', 'File has been successfully uploaded. For the mean time, please wait for the forms to be processed by the admin.');          
        	redirect('user_forms/renovation');	
        }
        else
        {
            $this->session->set_flashdata('renovatefail', $this->upload->display_errors());  
            redirect('user_forms/renovation');  
	    }
	}	 

  function ajax_show_car($formid)
  {
    $data = $this->model_forms_user->get_car_id($formid);

    echo json_encode($data);
  }  

  function ajax_show_workpermit($formid)
  {
    $data = $this->model_forms_user->get_workpermit_id($formid);

    echo json_encode($data);
  }   

  function ajax_show_renovation($formid)
  {
    $data = $this->model_forms_user->get_renovation_id($formid);

    echo json_encode($data);
  }           
}

