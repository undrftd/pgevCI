<?php

class Admin_Ticketing extends MY_Controller {

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

	function new_tickets()
    {
    	$this->session->set_userdata('referred_from', current_url());

    	$config['base_url'] = site_url('admin_ticketing/new_tickets');
        $config['total_rows'] = $this->model_ticketing->count_newtickets();
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
    	$data['newticketlinks'] = $this->pagination->create_links();

    	$data['count'] = $this->model_ticketing->count_newtickets();
        $data['reserve'] = $this->model_reservation->count_allnewreserve();
        $data['forms'] = $this->model_forms->count_allnewforms();
        $data['result'] = $this->model_ticketing->get_newtickets($config['per_page'], $this->uri->segment(3));
    	$this->template->load('admin_template', 'view_adminticketing_new', $data);
    }

    function progress_tickets()
    {
        $config['base_url'] = site_url('admin_ticketing/progress_tickets');
        $config['total_rows'] = $this->model_ticketing->count_progresstickets();
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
        $data['progressticketlinks'] = $this->pagination->create_links();

        $data['count'] = $this->model_ticketing->count_newtickets();
        $data['reserve'] = $this->model_reservation->count_allnewreserve();
        $data['forms'] = $this->model_forms->count_allnewforms();
        $data['result'] = $this->model_ticketing->get_progresstickets($config['per_page'], $this->uri->segment(3));
        $this->template->load('admin_template', 'view_adminticketing_inprogress', $data);
    }

    function closed_tickets()
    {
        $config['base_url'] = site_url('admin_ticketing/closed_tickets');
        $config['total_rows'] = $this->model_ticketing->count_closedtickets();
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
        $data['closedticketlinks'] = $this->pagination->create_links();

        $data['count'] = $this->model_ticketing->count_newtickets();
        $data['reserve'] = $this->model_reservation->count_allnewreserve();
        $data['forms'] = $this->model_forms->count_allnewforms();
        $data['result'] = $this->model_ticketing->get_closedtickets($config['per_page'], $this->uri->segment(3));
        $this->template->load('admin_template', 'view_adminticketing_closed', $data);
    }

    function search_closedtickets()
    {
         $searchquery = $this->input->get('search', TRUE);
         $searchmodelquery = $this->model_ticketing->search_closedtickets($searchquery);

         if(isset($searchquery) and !empty($searchquery))
         {
            $config['base_url'] = site_url('admin_ticketing/search_closedtickets');
            $config['reuse_query_string'] = TRUE;
            $config['total_rows'] = $this->model_ticketing->countclosed_search($searchquery);
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
            $data['closedticketlinks'] = $this->pagination->create_links();

            $data['count'] = $this->model_ticketing->count_newtickets();
            $data['reserve'] = $this->model_reservation->count_allnewreserve();
            $data['forms'] = $this->model_forms->count_allnewforms();
            $data['result'] = array_slice($searchmodelquery, $this->uri->segment(3),$config['per_page']);
            $this->template->load('admin_template', 'view_adminticketing_closed', $data);
        }
        else
        {
           redirect('admin_ticketing/closed_tickets');
        }
    }

    function ticketdetails($ticketid)
    {
        if(($this->model_ticketing->url_check_tickets($ticketid)) && $this->model_ticketing->is_closed($ticketid) == FALSE)
        {
            if($this->model_ticketing->is_opened($ticketid))
            {
                $data['count'] = $this->model_ticketing->count_newtickets();
                $data['reserve'] = $this->model_reservation->count_allnewreserve();
                $data['forms'] = $this->model_forms->count_allnewforms();
                $data['result'] = $this->model_ticketing->get_ticketdetails($ticketid);
                $this->template->load('admin_template', 'view_adminmoretickets', $data);
            }
            else
            {
                $this->model_ticketing->set_timeopened($ticketid);
                $data['count'] = $this->model_ticketing->count_newtickets();
                $data['reserve'] = $this->model_reservation->count_allnewreserve();
                $data['forms'] = $this->model_forms->count_allnewforms();
                $data['result'] = $this->model_ticketing->get_ticketdetails($ticketid);
                $this->template->load('admin_template', 'view_adminmoretickets', $data);
            }
        }
        else if($this->model_ticketing->is_closed($ticketid))
        {
            $data['count'] = $this->model_ticketing->count_newtickets();
            $data['reserve'] = $this->model_reservation->count_allnewreserve();
            $data['forms'] = $this->model_forms->count_allnewforms();
            $data['result'] = $this->model_ticketing->get_ticketdetails($ticketid);
            $this->template->load('admin_template', 'view_adminmoreclosedtickets', $data);
        }
        else
        {
            $this->session->set_flashdata('newticketfail', 'There is no ticket associated with this Ticket ID. Please double check the Ticket ID.');
            redirect('admin_ticketing/new_tickets');
        }
    }

    function download_attachment($ticketid)
    {
        if($this->model_ticketing->url_check_tickets($ticketid))
        {
            if($this->model_ticketing->is_attachment($ticketid))
            {
                $real = realpath(APPPATH);
                $path = $real . '/ticket_uploads/' . $this->model_ticketing->get_attachmentname($ticketid);
                $data = file_get_contents($path);
                $name = $this->model_ticketing->get_attachmentname($ticketid);

                force_download($name, $data);
            }
            else
            {
                if($this->session->userdata('moreticketsuccess'))
                {
                    $this->session->unset_userdata('moreticketsuccess');
                }

                if($this->model_ticketing->is_closed($ticketid))
                {
                    $this->session->set_flashdata('moreticketfail', 'There is no attachment for this ticket.');
                    $data['count'] = $this->model_ticketing->count_newtickets();
                    $data['reserve'] = $this->model_reservation->count_allnewreserve();
                    $data['forms'] = $this->model_forms->count_allnewforms();
                    $data['result'] = $this->model_ticketing->get_ticketdetails($ticketid);
                    $this->template->load('admin_template', 'view_adminmoreclosedtickets', $data);
                }
            }
        }
        else
        {
            $this->session->set_flashdata('newticketfail', 'You cannot download an attachment from a non-existent ticket.');
            redirect('admin_ticketing/new_tickets');

        }
    }

    function save_ticket($ticketid)
    {
        $this->usertracking->track_this();
        $this->model_ticketing->save_ticket($ticketid);

        if($this->model_ticketing->url_check_tickets($ticketid))
        {
            if($this->session->userdata('moreticketfail'))
            {
                $this->session->unset_userdata('moreticketfail');
            }

            if($this->model_ticketing->is_newticket($ticketid) || $this->model_ticketing->is_progressticket($ticketid))
            {
                $this->session->set_flashdata('moreticketsuccess', 'You have successfully updated the ticket\'s status.');
                $data['count'] = $this->model_ticketing->count_newtickets();
                $data['reserve'] = $this->model_reservation->count_allnewreserve();
                $data['forms'] = $this->model_forms->count_allnewforms();
                $data['result'] = $this->model_ticketing->get_ticketdetails($ticketid);
                $this->template->load('admin_template', 'view_adminmoretickets', $data);
                $this->output->set_header('refresh:2; url=' . site_url() . "admin_ticketing/new_tickets");
            }
            else if($this->model_ticketing->is_closedticket($ticketid))
            {
                $this->model_ticketing->save_closedticket($ticketid);
                $this->session->set_flashdata('moreticketsuccess', 'You have successfully closed the ticket.');
                $data['count'] = $this->model_ticketing->count_newtickets();
                $data['reserve'] = $this->model_reservation->count_allnewreserve();
                $data['forms'] = $this->model_forms->count_allnewforms();
                $data['result'] = $this->model_ticketing->get_ticketdetails($ticketid);
                $this->template->load('admin_template', 'view_adminmoretickets', $data);
                $this->output->set_header('refresh:2; url=' . site_url() . "admin_ticketing/new_tickets");
            }

        }
        else
        {
            $this->session->set_flashdata('newticketfail', 'You cannot save changes for a non-existent Ticket ID.');
            redirect('admin_ticketing/new_tickets');
        }
    }

}
