<?php

class Admin_Audit extends MY_Controller {
       
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
      else
      {
          redirect('unverified');
      }

      if($session_data->username != $session_username)
      {
          redirect('login/signout');
      }
    }

	function logs()
	{
        $config['base_url'] = site_url('admin_audit/logs');
        $config['total_rows'] = $this->model_audit->count_audit();
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
        $data['auditlinks'] = $this->pagination->create_links();

        $data['count'] = $this->model_ticketing->count_newtickets();
        $data['reserve'] = $this->model_reservation->count_allnewreserve();
        $data['forms'] = $this->model_forms->count_allnewforms();
        $data['log'] = $this->model_audit->get_audit($config['per_page'], $this->uri->segment(3));
   	    $this->template->load('admin_template', 'view_adminaudit', $data);
	}

}
