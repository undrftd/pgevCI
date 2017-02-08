<?php

class Admin_Reservation extends MY_Controller {

	function __construct()
    {   
      parent::__construct();

      $session_admin = $this->session->userdata('isAdmin');
      $method = $this->router->fetch_method();

      if(($session_admin == FALSE) && $method != 'login')
      {
          $this->session->set_flashdata('message', 'You need to login to access this location' );
          redirect('admin_ticketing/new_tickets');
      }
    }

	function court_one()
	{	
		$config['base_url'] = site_url('admin_reservation/court_one');
        $config['total_rows'] = $this->model_reservation->count_reservationcourtone();
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
        $data['courtonelinks'] = $this->pagination->create_links();

		$data['myreserve'] = $this->model_reservation->getreservation_courtone($config['per_page'], $this->uri->segment(3));
		$this->template->load('admin_template', 'view_adminreservation_courtone', $data);
	}

	function check_reservations_courtone()
	{
		$searchquery = $this->input->get('search', TRUE);
		$searchmodelquery = $this->model_reservation->getcourtone_availability($searchquery);

	    if(isset($searchquery) and !empty($searchquery))
	    {	
	    	$config['base_url'] = site_url('admin_reservation/court_one');
	        $config['total_rows'] = $this->model_reservation->count_reservationcourtone();
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
	        $data['courtonelinks'] = $this->pagination->create_links();

			$data['myreserve'] = array_slice($searchmodelquery, $this->uri->segment(3),$config['per_page']);
			$this->template->load('admin_template', 'view_adminreservation_courtone', $data);
	    }
	    else
	    {
	     	redirect('admin_reservation/court_one');
	    }
	}

	function court_two()
	{
		$config['base_url'] = site_url('admin_reservation/court_two');
        $config['total_rows'] = $this->model_reservation->count_reservationcourttwo();
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
        $data['courttwolinks'] = $this->pagination->create_links();

		$data['myreserve'] = $this->model_reservation->getreservation_courttwo($config['per_page'], $this->uri->segment(3));
		$this->template->load('admin_template', 'view_adminreservation_courttwo', $data);
	}

	function check_reservations_courttwo()
	{
		$searchquery = $this->input->get('search', TRUE);
		$searchmodelquery = $this->model_reservation->getcourttwo_availability($searchquery);

	    if(isset($searchquery) and !empty($searchquery))
	    {	
	    	$config['base_url'] = site_url('admin_reservation/court_two');
	        $config['total_rows'] = $this->model_reservation->count_reservationcourttwo();
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
	        $data['courttwolinks'] = $this->pagination->create_links();

			$data['myreserve'] = array_slice($searchmodelquery, $this->uri->segment(3),$config['per_page']);
			$this->template->load('admin_template', 'view_adminreservation_courttwo', $data);
	    }
	    else
	    {
	     	redirect('admin_reservation/court_two');
	    }
	}

	function clubhouse()
	{
		$config['base_url'] = site_url('admin_reservation/clubhouse');
        $config['total_rows'] = $this->model_reservation->count_reservationclubhouse();
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
        $data['clubhouselinks'] = $this->pagination->create_links();

		$data['myreserve'] = $this->model_reservation->getreservation_clubhouse($config['per_page'], $this->uri->segment(3));
		$this->template->load('admin_template', 'view_adminreservation_clubhouse', $data);
	}

	function check_reservations_clubhouse()
	{
		$searchquery = $this->input->get('search', TRUE);
		$searchmodelquery = $this->model_reservation->getclubhouse_availability($searchquery);

	    if(isset($searchquery) and !empty($searchquery))
	    {	
	    	$config['base_url'] = site_url('admin_reservation/clubhouse');
	        $config['total_rows'] = $this->model_reservation->count_reservationclubhouse();
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
	        $data['clubhouselinks'] = $this->pagination->create_links();

			$data['myreserve'] = array_slice($searchmodelquery, $this->uri->segment(3),$config['per_page']);
			$this->template->load('admin_template', 'view_adminreservation_clubhouse', $data);
	    }
	    else
	    {
	     	redirect('admin_reservation/clubhouse');
	    }
	}


}