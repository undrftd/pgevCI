<?php

class User_Tracking extends MY_Controller {

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
    
	function recent()
	{
    $data['approvedreserve'] = $this->model_reservation->count_approved();
    $data['deniedreserve'] = $this->model_reservation->count_denied();
    $data['count'] = $this->model_tracking_user->count_activetickets();
		$data['result'] = $this->model_tracking_user->get_recenttickets();
		$this->template->load('user_template', 'view_usertracking', $data);
	}

	function view_history()
	{
		    $config['base_url'] = site_url('user_tracking/view_history');
        $config['total_rows'] = $this->model_tracking_user->count_tickets();
        $config['per_page'] =  10;
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
    	   
         $data['approvedreserve'] = $this->model_reservation->count_approved();
        $data['deniedreserve'] = $this->model_reservation->count_denied();
        $data['ticketlinks'] = $this->pagination->create_links();
        $data['count'] = $this->model_tracking_user->count_activetickets();
        $data['result'] = $this->model_tracking_user->get_history($config['per_page'], $this->uri->segment(3));
		    $this->template->load('user_template', 'view_userhistorytracking', $data);
	}

    function set_finished_recent($ticketid)
    {
        if($this->model_tracking_user->url_check_ticket($ticketid))
        {
            if($this->model_tracking_user->is_finished($ticketid))
            {
                $this->session->set_flashdata('recentfail', 'This Ticket is already set as Finished.');
                redirect('user_tracking/recent');
            }
            else
            {
                $this->model_tracking_user->set_finished($ticketid);
                $this->session->set_flashdata('recentsuccess', 'You have successfully set your ticket as Finished.');
                redirect('user_tracking/recent');
            }
        }
        else
        {
            $this->session->set_flashdata('recentfail', 'You cannot set a non-existent ticket as finished. Please double-check the Ticket ID.');
            redirect('user_tracking/recent');
        }
    }

    function set_finished_history($ticketid)
    {
        if($this->model_tracking_user->url_check_ticket($ticketid))
        {
            if($this->model_tracking_user->is_finished($ticketid))
            {
                $this->session->set_flashdata('historyfail', 'This Ticket is already set as Finished.');
                redirect('user_tracking/view_history');
            }
            else
            {
                $this->model_tracking_user->set_finished($ticketid);
                $this->session->set_flashdata('historysuccess', 'You have successfully set your ticket as finished.');
                redirect('user_tracking/view_history');
            }
            
        }
        else
        {
            $this->session->set_flashdata('historyfail', 'You cannot set a non-existent ticket as finished. Please double-check the Ticket ID.');
            redirect('user_tracking/view_history');
        }
    }

	

}
