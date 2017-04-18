<?php

class Admin_Forms extends MY_Controller {

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
      elseif($session_deact == 'unverified' && $method != 'login')
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
        //header('Refresh: 30');
		$config['base_url'] = site_url('admin_forms/car_sticker');
        $config['total_rows'] = $this->model_forms->count_carsticker();
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
        $data['carstickerlinks'] = $this->pagination->create_links();

        $data['count'] = $this->model_ticketing->count_newtickets();
        $data['countnew'] = $this->model_ticketing->count_newtickets();
        $data['reserve'] = $this->model_reservation->count_allnewreserve();
        $data['forms'] = $this->model_forms->count_allnewforms();
	    $data['carsticker'] = $this->model_forms->get_carsticker($config['per_page'], $this->uri->segment(3));
	    $data['countsticker'] = $this->model_forms->count_downloadedsticker();
        $data['countpermit'] = $this->model_forms->count_downloadedpermit();
        $data['countrenovation'] = $this->model_forms->count_downloadedrenovation();
		$this->template->load('admin_template', 'view_adminforms_carsticker', $data);
	}

	function work_permit()
	{
        //header('Refresh: 30');
		$config['base_url'] = site_url('admin_forms/work_permit');
        $config['total_rows'] = $this->model_forms->count_workpermit();
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
        $data['workpermitlinks'] = $this->pagination->create_links();

        $data['count'] = $this->model_ticketing->count_newtickets();
        $data['countnew'] = $this->model_ticketing->count_newtickets();
        $data['reserve'] = $this->model_reservation->count_allnewreserve();
        $data['forms'] = $this->model_forms->count_allnewforms();
		$data['workpermit'] = $this->model_forms->get_workpermit($config['per_page'], $this->uri->segment(3));
		$data['countsticker'] = $this->model_forms->count_downloadedsticker();
        $data['countpermit'] = $this->model_forms->count_downloadedpermit();
        $data['countrenovation'] = $this->model_forms->count_downloadedrenovation();
		$this->template->load('admin_template', 'view_adminforms_workpermit', $data);
	}

	function renovation()
	{
        //header('Refresh: 30');
		$config['base_url'] = site_url('admin_forms/renovation');
        $config['total_rows'] = $this->model_forms->count_renovation();
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
        $data['renovationlinks'] = $this->pagination->create_links();

        $data['count'] = $this->model_ticketing->count_newtickets();
        $data['countnew'] = $this->model_ticketing->count_newtickets();
        $data['reserve'] = $this->model_reservation->count_allnewreserve();
        $data['forms'] = $this->model_forms->count_allnewforms();
		$data['renovation'] = $this->model_forms->get_renovation($config['per_page'], $this->uri->segment(3));
		$data['countsticker'] = $this->model_forms->count_downloadedsticker();
        $data['countpermit'] = $this->model_forms->count_downloadedpermit();
        $data['countrenovation'] = $this->model_forms->count_downloadedrenovation();
		$this->template->load('admin_template', 'view_adminforms_renovation', $data);
	}

    function finished_forms_carsticker($formid)
    {
        if($this->model_forms->url_check_carsticker($formid))
        {
            $data['countnew'] = $this->model_ticketing->count_newtickets();
            $data['reserve'] = $this->model_reservation->count_allnewreserve();
            $data['forms'] = $this->model_forms->count_allnewforms();
            $data['count'] = $this->model_forms->count_renovation();
            $data['countsticker'] = $this->model_forms->count_downloadedsticker();
            $data['countpermit'] = $this->model_forms->count_downloadedpermit();
            $data['countrenovation'] = $this->model_forms->count_downloadedrenovation();

            $data['finisheddetails'] = $this->model_forms->get_formdetails_carsticker($formid);

            $this->template->load('admin_template', 'view_adminforms_processed_carsticker', $data);
        }
        else
        {
            $this->session->set_flashdata('carstickerfail', 'You cannot view a non-existent car sticker form request.');
            redirect('admin_forms/car_sticker');
        }
        
    }

    function finished_forms_workpermit($formid)
    {
        if($this->model_forms->url_check_workpermit($formid))
        {
            $data['countnew'] = $this->model_ticketing->count_newtickets();
            $data['reserve'] = $this->model_reservation->count_allnewreserve();
            $data['forms'] = $this->model_forms->count_allnewforms();
            $data['count'] = $this->model_forms->count_renovation();
            $data['countsticker'] = $this->model_forms->count_downloadedsticker();
            $data['countpermit'] = $this->model_forms->count_downloadedpermit();
            $data['countrenovation'] = $this->model_forms->count_downloadedrenovation();

            $data['finisheddetails'] = $this->model_forms->get_formdetails_workpermit($formid);

            $this->template->load('admin_template', 'view_adminforms_processed_workpermit', $data);
        }
        else
        {
            $this->session->set_flashdata('workpermitfail', 'You cannot view a non-existent work permit form request.');
            redirect('admin_forms/work_permit');
        }
        
    }

    function finished_forms_renovation($formid)
    {
        if($this->model_forms->url_check_renovation($formid))
        {
            $data['countnew'] = $this->model_ticketing->count_newtickets();
            $data['reserve'] = $this->model_reservation->count_allnewreserve();
            $data['forms'] = $this->model_forms->count_allnewforms();
            $data['count'] = $this->model_forms->count_renovation();
            $data['countsticker'] = $this->model_forms->count_downloadedsticker();
            $data['countpermit'] = $this->model_forms->count_downloadedpermit();
            $data['countrenovation'] = $this->model_forms->count_downloadedrenovation();

            $data['finisheddetails'] = $this->model_forms->get_formdetails_renovation($formid);

            $this->template->load('admin_template', 'view_adminforms_processed_renovation', $data);
        }
        else
        {
            $this->session->set_flashdata('renovationfail', 'You cannot view a non-existent renovation form request.');
            redirect('admin_forms/renovation');
        }
        
    }


    function applicationdetails_carsticker($formid)
    {
        if($this->model_forms->url_check_carsticker($formid))
        {
            $data['countnew'] = $this->model_ticketing->count_newtickets();
            $data['reserve'] = $this->model_reservation->count_allnewreserve();
            $data['forms'] = $this->model_forms->count_allnewforms();
            $data['count'] = $this->model_forms->count_renovation();
            $data['countsticker'] = $this->model_forms->count_downloadedsticker();
            $data['countpermit'] = $this->model_forms->count_downloadedpermit();
            $data['countrenovation'] = $this->model_forms->count_downloadedrenovation();

            $data['carstickerdetails'] = $this->model_forms->get_formdetails_carsticker($formid);
            $this->template->load('admin_template', 'view_adminmoreforms_carsticker', $data);
        }
        else
        {
            $this->session->set_flashdata('carstickerfail', 'You cannot update a non-existent car sticker form request.');
            redirect('admin_forms/car_sticker');
        }
    }

    function save_application_carsticker($formid)
    {
        $this->usertracking->track_this();
        $this->model_forms->save_application_carsticker($formid);

        $data['countnew'] = $this->model_ticketing->count_newtickets();
        $data['reserve'] = $this->model_reservation->count_allnewreserve();
        $data['forms'] = $this->model_forms->count_allnewforms();
        $data['count'] = $this->model_forms->count_renovation();
        $data['countsticker'] = $this->model_forms->count_downloadedsticker();
        $data['countpermit'] = $this->model_forms->count_downloadedpermit();
        $data['countrenovation'] = $this->model_forms->count_downloadedrenovation();
        $data['carstickerdetails'] = $this->model_forms->get_formdetails_carsticker($formid);

        $this->session->set_flashdata('moreapplicationsuccess', 'You have successfully updated the application\'s status.');
        $this->template->load('admin_template', 'view_adminmoreforms_carsticker', $data);
        $this->output->set_header('refresh:2; url=' . site_url() . "admin_forms/car_sticker");
    }

    function applicationdetails_workpermit($formid)
    {
        if($this->model_forms->url_check_workpermit($formid))
        {
            $data['countnew'] = $this->model_ticketing->count_newtickets();
            $data['reserve'] = $this->model_reservation->count_allnewreserve();
            $data['forms'] = $this->model_forms->count_allnewforms();
            $data['count'] = $this->model_forms->count_renovation();
            $data['countsticker'] = $this->model_forms->count_downloadedsticker();
            $data['countpermit'] = $this->model_forms->count_downloadedpermit();
            $data['countrenovation'] = $this->model_forms->count_downloadedrenovation();

            $data['workpermitdetails'] = $this->model_forms->get_formdetails_workpermit($formid);
            $this->template->load('admin_template', 'view_adminmoreforms_workpermit', $data);
        }
        else
        {
            $this->session->set_flashdata('workpermitfail', 'You cannot update a non-existent work permit form request.');
            redirect('admin_forms/work_permit');
        }
    }

    function save_application_workpermit($formid)
    {
        $this->usertracking->track_this();
        $this->model_forms->save_application_workpermit($formid);

        $data['countnew'] = $this->model_ticketing->count_newtickets();
        $data['reserve'] = $this->model_reservation->count_allnewreserve();
        $data['forms'] = $this->model_forms->count_allnewforms();
        $data['count'] = $this->model_forms->count_renovation();
        $data['countsticker'] = $this->model_forms->count_downloadedsticker();
        $data['countpermit'] = $this->model_forms->count_downloadedpermit();
        $data['countrenovation'] = $this->model_forms->count_downloadedrenovation();
        $data['workpermitdetails'] = $this->model_forms->get_formdetails_workpermit($formid);

        $this->session->set_flashdata('moreapplicationsuccess', 'You have successfully updated the application\'s status.');
        $this->template->load('admin_template', 'view_adminmoreforms_workpermit', $data);
        $this->output->set_header('refresh:2; url=' . site_url() . "admin_forms/work_permit");
    }

    function applicationdetails_renovation($formid)
    {
        if($this->model_forms->url_check_renovation($formid))
        {
            $data['countnew'] = $this->model_ticketing->count_newtickets();
            $data['reserve'] = $this->model_reservation->count_allnewreserve();
            $data['forms'] = $this->model_forms->count_allnewforms();
            $data['count'] = $this->model_forms->count_renovation();
            $data['countsticker'] = $this->model_forms->count_downloadedsticker();
            $data['countpermit'] = $this->model_forms->count_downloadedpermit();
            $data['countrenovation'] = $this->model_forms->count_downloadedrenovation();

            $data['renovationdetails'] = $this->model_forms->get_formdetails_renovation($formid);
            $this->template->load('admin_template', 'view_adminmoreforms_renovation', $data);
        }
        else
        {
            $this->session->set_flashdata('renovationfail', 'You cannot update a non-existent renovation form request.');
            redirect('admin_forms/renovation');
        }
    }

    function save_application_renovation($formid)
    {
        $this->usertracking->track_this();
        $this->model_forms->save_application_renovation($formid);

        $data['countnew'] = $this->model_ticketing->count_newtickets();
        $data['reserve'] = $this->model_reservation->count_allnewreserve();
        $data['forms'] = $this->model_forms->count_allnewforms();
        $data['count'] = $this->model_forms->count_renovation();
        $data['countsticker'] = $this->model_forms->count_downloadedsticker();
        $data['countpermit'] = $this->model_forms->count_downloadedpermit();
        $data['countrenovation'] = $this->model_forms->count_downloadedrenovation();
        $data['renovationdetails'] = $this->model_forms->get_formdetails_workpermit($formid);

        $this->session->set_flashdata('moreapplicationsuccess', 'You have successfully updated the application\'s status.');
        $this->template->load('admin_template', 'view_adminmoreforms_renovation', $data);
        $this->output->set_header('refresh:2; url=' . site_url() . "admin_forms/renovation");
    }

    function search_carsticker()
    {
        $searchquery = $this->input->get('search', TRUE);
        $searchmodelquery = $this->model_forms->search_carsticker($searchquery);

        if(isset($searchquery) and !empty($searchquery))
        {
            $config['base_url'] = site_url('admin_forms/search_carsticker/');
            $config['reuse_query_string'] = TRUE;
            $config['total_rows'] = $this->model_forms->countsticker_search($searchquery);
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
            $data['carstickerlinks'] = $this->pagination->create_links();

            $data['countnew'] = $this->model_ticketing->count_newtickets();
            $data['reserve'] = $this->model_reservation->count_allnewreserve();
            $data['forms'] = $this->model_forms->count_allnewforms();
            $data['count'] = $this->model_forms->count_carsticker();
            $data['countsticker'] = $this->model_forms->count_downloadedsticker();
            $data['countpermit'] = $this->model_forms->count_downloadedpermit();
            $data['countrenovation'] = $this->model_forms->count_downloadedrenovation();
            $data['carsticker'] = array_slice($searchmodelquery, $this->uri->segment(3),$config['per_page']);
            $this->template->load('admin_template', 'view_adminforms_carsticker', $data);
        }
        else
        {
            redirect('admin_forms/car_sticker');
        }
    }

    function search_workpermit()
    {
        $searchquery = $this->input->get('search', TRUE);
        $searchmodelquery = $this->model_forms->search_workpermit($searchquery);

        if(isset($searchquery) and !empty($searchquery))
        {
            $config['base_url'] = site_url('admin_forms/search_workpermit/');
            $config['reuse_query_string'] = TRUE;
            $config['total_rows'] = $this->model_forms->countpermit_search($searchquery);
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
            $data['workpermitlinks'] = $this->pagination->create_links();

            $data['countnew'] = $this->model_ticketing->count_newtickets();
            $data['reserve'] = $this->model_reservation->count_allnewreserve();
            $data['forms'] = $this->model_forms->count_allnewforms();
            $data['count'] = $this->model_forms->count_carsticker();
            $data['countsticker'] = $this->model_forms->count_downloadedsticker();
            $data['countpermit'] = $this->model_forms->count_downloadedpermit();
            $data['countrenovation'] = $this->model_forms->count_downloadedrenovation();
            $data['workpermit'] = array_slice($searchmodelquery, $this->uri->segment(3),$config['per_page']);
            $this->template->load('admin_template', 'view_adminforms_workpermit', $data);
        }
        else
        {
            redirect('admin_forms/work_permit');
        }
    }

    function search_renovation()
    {
        $searchquery = $this->input->get('search', TRUE);
        $searchmodelquery = $this->model_forms->search_renovation($searchquery);

        if(isset($searchquery) and !empty($searchquery))
        {
            $config['base_url'] = site_url('admin_forms/search_carsticker/');
            $config['reuse_query_string'] = TRUE;
            $config['total_rows'] = $this->model_forms->countrenovation_search($searchquery);
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
            $data['renovationlinks'] = $this->pagination->create_links();

            $data['countnew'] = $this->model_ticketing->count_newtickets();
            $data['reserve'] = $this->model_reservation->count_allnewreserve();
            $data['forms'] = $this->model_forms->count_allnewforms();
            $data['count'] = $this->model_forms->count_renovation();
            $data['countsticker'] = $this->model_forms->count_downloadedsticker();
            $data['countpermit'] = $this->model_forms->count_downloadedpermit();
            $data['countrenovation'] = $this->model_forms->count_downloadedrenovation();
            $data['renovation'] = array_slice($searchmodelquery, $this->uri->segment(3),$config['per_page']);
            $this->template->load('admin_template', 'view_adminforms_renovation', $data);
        }
        else
        {
           redirect('admin_forms/car_sticker');
        }
    }


	function download_carsticker($formid)
	{
        if($this->model_forms->url_check_carsticker($formid))
        {
            $query = $this->db->select('*')->where('formid', $formid)->get('upload_carsticker',1);
            $result = $query->row();


            $real = realpath(APPPATH);
            $path = $real . '/uploads/' . $result->filename;
            $data = file_get_contents($path);
            $name = $result->filename;

            force_download($name, $data);
        }
        else
        {
            $this->session->set_flashdata('carstickerfail', 'You cannot download a non-existent car sticker form request.');
            redirect('admin_forms/car_sticker');
        }
	}

	function download_workpermit($formid)
	{
        if($this->model_forms->url_check_workpermit($formid))
        {
            $query = $this->db->select('*')->where('formid', $formid)->get('upload_workpermit',1);
            $result = $query->row();

            $real = realpath(APPPATH);
            $path = $real . '/uploads/' . $result->filename;
            $data = file_get_contents($path);
	       	$name = $result->filename;

            force_download($name, $data);
        }
        else
        {
            $this->session->set_flashdata('workpermitfail', 'You cannot download a non-existent work permit form request.');
            redirect('admin_forms/work_permit');
        }
	}

	function download_renovation($formid)
	{
        if($this->model_forms->url_check_workpermit($formid))
        {
            $query = $this->db->select('*')->where('formid', $formid)->get('upload_renovation',1);
            $result = $query->row();

            $real = realpath(APPPATH);
            $path = $real . '/uploads/' . $result->filename;
            $data = file_get_contents($path);
            $name = $result->filename;

            force_download($name, $data);
        }
        else
        {
            $this->session->set_flashdata('renovationfail', 'You cannot download a non-existent renovation form request.');
            redirect('admin_forms/renovation');
        }
	}

	function process_carsticker($formid)
	{
        $this->usertracking->track_this();
        if($this->model_forms->url_check_carsticker($formid))
        {
            $this->session->set_flashdata('cardeletesuccess', 'You have successfully set the car sticker form request as processed.');
            $this->model_forms->set_carprocessedstatus($formid);
            redirect('admin_forms/car_sticker');
        }
        else
        {
            $this->session->set_flashdata('carstickerfail', 'You cannot set a non-existent car sticker form request as processed.');
            redirect('admin_forms/car_sticker');
        }
	}

    function process_workpermit($formid)
    {
        $this->usertracking->track_this();
        if($this->model_forms->url_check_workpermit($formid))
        {
            $this->session->set_flashdata('workdeletesuccess', 'You have successfully set the work permit form request as processed');
            $this->model_forms->set_workprocessedstatus($formid);
            redirect('admin_forms/work_permit');
        }
        else
        {
            $this->session->set_flashdata('workpermitfail', 'You cannot set a non-existent work permit form request as processed.');
            redirect('admin_forms/work_permit');
        }
    }

    function process_renovation($formid)
    {
        $this->usertracking->track_this();
        if($this->model_forms->url_check_renovation($formid))
        {
            $this->session->set_flashdata('renovatedeletesuccess', 'You have successfully set the renovation form request as processed');
            $this->model_forms->set_renovationprocessedstatus($formid);
            redirect('admin_forms/renovation');
        }
        else
        {
            $this->session->set_flashdata('renovationfail', 'You cannot set a non-existent renovation form request as processed.');
            redirect('admin_forms/renovation');
        }
    }

}
