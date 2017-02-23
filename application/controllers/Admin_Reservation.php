<?php

class Admin_Reservation extends MY_Controller {

	function __construct()
    {   
      parent::__construct();

      $session_admin = $this->session->userdata('isAdmin');
      $session_deact = $this->session->userdata('status');
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
    }

	function court_one()
	{	
		$config['base_url'] = site_url('admin_reservation/court_one');
        $config['total_rows'] = $this->model_reservation->count_reservationcourtone();
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
        $data['courtonelinks'] = $this->pagination->create_links();

        $data['count'] = $this->model_ticketing->count_newtickets();
    	$data['reserve'] = $this->model_reservation->count_allnewreserve();
    	$data['forms'] = $this->model_forms->count_allnewforms();
        $data['date'] = date("Y/m/d");
        $data['result'] = $this->model_reservation_user->getcourtone_defaultavailability();
        $data['countone'] = $this->model_reservation->count_courtone();
        $data['counttwo'] = $this->model_reservation->count_courttwo();
        $data['countclub'] = $this->model_reservation->count_clubhouse();
		$data['myreserve'] = $this->model_reservation->getreservation_courtone($config['per_page'], $this->uri->segment(3));
		$this->template->load('admin_template', 'view_adminreservation_courtone', $data);
	}

	function check_reservations_courtone()
	{
		$searchquery = $this->input->get('search', TRUE);

	    if(isset($searchquery) and !empty($searchquery))
	    {
	    	$config['base_url'] = site_url('admin_reservation/court_one');
	        $config['total_rows'] = $this->model_reservation->count_reservationcourtone();
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
	        $data['courtonelinks'] = $this->pagination->create_links();

	        $data['count'] = $this->model_ticketing->count_newtickets();
    		$data['reserve'] = $this->model_reservation->count_allnewreserve();
    		$data['forms'] = $this->model_forms->count_allnewforms();
    		$data['date'] = $searchquery;
			$data['result'] = $this->model_reservation_user->getcourtone_availability($searchquery);
			$data['countone'] = $this->model_reservation->count_courtone();
        	$data['counttwo'] = $this->model_reservation->count_courttwo();
        	$data['countclub'] = $this->model_reservation->count_clubhouse();
			$data['myreserve'] = $this->model_reservation->getreservation_courtone($config['per_page'], $this->uri->segment(3));
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
        $data['courttwolinks'] = $this->pagination->create_links();

        $data['count'] = $this->model_ticketing->count_newtickets();
    	$data['reserve'] = $this->model_reservation->count_allnewreserve();
    	$data['forms'] = $this->model_forms->count_allnewforms();
        $data['date'] = date("Y/m/d");
        $data['result'] = $this->model_reservation_user->getcourttwo_defaultavailability();
        $data['countone'] = $this->model_reservation->count_courtone();
        $data['counttwo'] = $this->model_reservation->count_courttwo();
        $data['countclub'] = $this->model_reservation->count_clubhouse();
		$data['myreserve'] = $this->model_reservation->getreservation_courttwo($config['per_page'], $this->uri->segment(3));
		$this->template->load('admin_template', 'view_adminreservation_courttwo', $data);
	}

	function check_reservations_courttwo()
	{
		$searchquery = $this->input->get('search', TRUE);

	    if(isset($searchquery) and !empty($searchquery))
	    {
	    	$config['base_url'] = site_url('admin_reservation/court_two');
	        $config['total_rows'] = $this->model_reservation->count_reservationcourttwo();
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
	        $data['courttwolinks'] = $this->pagination->create_links();

	        $data['count'] = $this->model_ticketing->count_newtickets();
    		$data['reserve'] = $this->model_reservation->count_allnewreserve();
    		$data['forms'] = $this->model_forms->count_allnewforms();
    		$data['date'] = $searchquery;
			$data['result'] = $this->model_reservation_user->getcourttwo_availability($searchquery);
			$data['countone'] = $this->model_reservation->count_courtone();
        	$data['counttwo'] = $this->model_reservation->count_courttwo();
        	$data['countclub'] = $this->model_reservation->count_clubhouse();
			$data['myreserve'] = $this->model_reservation->getreservation_courttwo($config['per_page'], $this->uri->segment(3));
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
        $data['clubhouselinks'] = $this->pagination->create_links();

        $data['count'] = $this->model_ticketing->count_newtickets();
    	$data['reserve'] = $this->model_reservation->count_allnewreserve();
    	$data['forms'] = $this->model_forms->count_allnewforms();
        $data['date'] = date("Y/m/d");
        $data['result'] = $this->model_reservation_user->getclubhouse_defaultavailability();
        $data['countone'] = $this->model_reservation->count_courtone();
        $data['counttwo'] = $this->model_reservation->count_courttwo();
        $data['countclub'] = $this->model_reservation->count_clubhouse();
		$data['myreserve'] = $this->model_reservation->getreservation_clubhouse($config['per_page'], $this->uri->segment(3));
		$this->template->load('admin_template', 'view_adminreservation_clubhouse', $data);
	}

	function check_reservations_clubhouse()
	{
		$searchquery = $this->input->get('search', TRUE);

	    if(isset($searchquery) and !empty($searchquery))
	    {
	    	$config['base_url'] = site_url('admin_reservation/clubhouse');
	        $config['total_rows'] = $this->model_reservation->count_reservationclubhouse();
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
	        $data['clubhouselinks'] = $this->pagination->create_links();

	        $data['count'] = $this->model_ticketing->count_newtickets();
    		$data['reserve'] = $this->model_reservation->count_allnewreserve();
    		$data['forms'] = $this->model_forms->count_allnewforms();
    		$data['date'] = $searchquery;
			$data['result'] = $this->model_reservation_user->getclubhouse_availability($searchquery);
			$data['countone'] = $this->model_reservation->count_courtone();
        	$data['counttwo'] = $this->model_reservation->count_courttwo();
        	$data['countclub'] = $this->model_reservation->count_clubhouse();
			$data['myreserve'] = $this->model_reservation->getreservation_clubhouse($config['per_page'], $this->uri->segment(3));
			$this->template->load('admin_template', 'view_adminreservation_clubhouse', $data);
	    }
	    else
	    {
	     	redirect('admin_reservation/clubhouse');
	    }
	}

	function approve_courtonereservation($reservationid)
	{
		$this->usertracking->track_this();
		if($this->model_reservation->url_check_courtone($reservationid))
		{
			$this->model_reservation->approve_courtonereservation($reservationid);
			$this->session->set_flashdata('reservefeedback', 'You have successfully approved the reservation.');
      		redirect('admin_reservation/court_one');
		}
		else
		{
			$this->session->set_flashdata('reservefail', 'You cannot approve a non-existent reservation. Please double-check the Reservation ID.');
      		redirect('admin_reservation/court_one');
		}
	}

	function deny_courtonereservation($reservationid)
	{
		$this->usertracking->track_this();
		if($this->model_reservation->url_check_courtone($reservationid))
		{
			$this->model_reservation->deny_courtonereservation($reservationid);
			$this->session->set_flashdata('reservefeedback', 'You have successfully denied the reservation.');
      		redirect('admin_reservation/court_one');
		}
		else
		{
			$this->session->set_flashdata('reservefail', 'You cannot deny a non-existent reservation. Please double-check the Reservation ID.');
      		redirect('admin_reservation/court_one');
		}
	}

	function approve_courttworeservation($reservationid)
	{
		$this->usertracking->track_this();
		if($this->model_reservation->url_check_courttwo($reservationid))
		{
			$this->model_reservation->approve_courttworeservation($reservationid);
			$this->session->set_flashdata('reservefeedback', 'You have successfully approved the reservation.');
      		redirect('admin_reservation/court_two');
		}
		else
		{
			$this->session->set_flashdata('reservefail', 'You cannot approve a non-existent reservation. Please double-check the Reservation ID.');
      		redirect('admin_reservation/court_two');
		}
	}

	function deny_courttworeservation($reservationid)
	{
		$this->usertracking->track_this();
		if($this->model_reservation->url_check_courttwo($reservationid))
		{
			$this->model_reservation->deny_courttworeservation($reservationid);
			$this->session->set_flashdata('reservefeedback', 'You have successfully denied the reservation.');
      		redirect('admin_reservation/court_two');
		}
		else
		{
			$this->session->set_flashdata('reservefail', 'You cannot deny a non-existent reservation. Please double-check the Reservation ID.');
      		redirect('admin_reservation/court_two');
		}
	}

	function approve_clubhousereservation($reservationid)
	{
		$this->usertracking->track_this();
		if($this->model_reservation->url_check_clubhouse($reservationid))
		{
			$this->model_reservation->approve_clubhousereservation($reservationid);
			$this->session->set_flashdata('reservefeedback', 'You have successfully approved the reservation.');
      		redirect('admin_reservation/clubhouse');
		}
		else
		{
			$this->session->set_flashdata('reservefail', 'You cannot approve a non-existent reservation. Please double-check the Reservation ID.');
      		redirect('admin_reservation/clubhouse');
		}
	}

	function deny_clubhousereservation($reservationid)
	{
		$this->usertracking->track_this();
		if($this->model_reservation->url_check_clubhouse($reservationid))
		{
			$this->model_reservation->deny_clubhousereservation($reservationid);
			$this->session->set_flashdata('reservefeedback', 'You have successfully denied the reservation.');
      		redirect('admin_reservation/clubhouse');
		}
		else
		{
			$this->session->set_flashdata('reservefail', 'You cannot deny a non-existent reservation. Please double-check the Reservation ID.');
      		redirect('admin_reservation/clubhouse');
		}
	}


}