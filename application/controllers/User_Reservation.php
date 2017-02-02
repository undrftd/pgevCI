<?php

class User_Reservation extends MY_Controller {

	public function court_one()
	{
		$this->template->load('user_template', 'view_userreservation_courtone');
	}

	function check_availability_courtone()
	{
		$searchquery = $this->input->get('search', TRUE);
	    $searchmodelquery = $this->model_reservation_user->get_availability($searchquery);

	    if(isset($searchquery) and !empty($searchquery))
	    {
	      $config['base_url'] = site_url('User_reservation/court_one/check_availability');
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
	      $this->template->load('user_template', 'view_userreservation_courtone', $data);
	    }
	    else
	    {
	     redirect('User_reservation/court_one');
	    }
	}

}

