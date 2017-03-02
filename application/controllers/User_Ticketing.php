<?php
class User_Ticketing extends MY_Controller {

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

      if($session_data->username != $session_username)
      {
          redirect('login/signout');
      }
    }
    
	function index()
	{
		$data['count'] = $this->model_tracking_user->count_activetickets();
		$this->template->load('user_template', 'view_userticketing', $data);
	}

	function requests_complaints()
	{
		$data['count'] = $this->model_tracking_user->count_activetickets();
		$data['ticket'] = $this->model_ticketing_user->get_ticketid();
		$this->template->load('user_template', 'view_userrequestscomplaints', $data);
	}

	function send_requestcomplaint()
	{
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');

        $this->form_validation->set_rules('type', 'Type of Request or Complaint', 'required');
        $this->form_validation->set_rules('content', 'Message', 'trim|required|min_length[10]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->load('user_template', 'view_userrequestscomplaints');
        }
        else
        {
        	if ($_FILES && $_FILES['file']['name'] !== "")
        	{
                $real = realpath(APPPATH);
		        $config['upload_path']          = $real . '/ticket_uploads/';
		        $config['allowed_types']        = 'doc|docx|jpg|pdf|png';
		        $config['max_size']             = '52428800';
		        $config['max_width']            = 1920;
		        $config['max_height']           = 1080;

		        $this->load->library('upload', $config);

		        if ($this->upload->do_upload('file'))
		        {
					$this->model_ticketing_user->send_ticket();
		        	$this->session->set_flashdata('requestsuccess', 'Your request/complaint has been successfully submitted. The Ticket ID for this request is indicated below.');
		        	redirect('user_ticketing/requests_complaints');
		        }
		        else
		        {
		            $this->session->set_flashdata('requestfail', $this->upload->display_errors());
		            redirect('user_ticketing/requests_complaints');
			    }
			 }
			 else
			 {
				$this->load->library('upload');
			 	$this->session->set_flashdata('requestsuccess', 'Your request/complaint has been successfully submitted. The Ticket ID for this request is indicated below.');
			 	$this->model_ticketing_user->send_ticket();
			    redirect('user_ticketing/requests_complaints');
			 }
		}
	}

	function cctv_retrieval()
	{
		$data['count'] = $this->model_tracking_user->count_activetickets();
		$data['ticket'] = $this->model_ticketing_user->get_ticketid();
		$this->template->load('user_template', 'view_usercctvretrieval', $data);
	}

	function send_cctv()
	{
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');

        $this->form_validation->set_rules('content', 'Message', 'trim|required|min_length[10]');
        $this->form_validation->set_rules('datepick', 'Date', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->load('user_template', 'view_usercctvretrieval');
        }
        else
        {
        	if ($_FILES && $_FILES['file']['name'] !== "")
        	{
			$real = realpath(APPPATH);
		        $config['upload_path']          = $real . '/ticket_uploads/';
		        $config['allowed_types']        = 'doc|docx|jpg|pdf|png';
		        $config['max_size']             = '52428800';
		        $config['max_width']            = 1920;
		        $config['max_height']           = 1080;

		        $this->load->library('upload', $config);

		        if ($this->upload->do_upload('file'))
		        {
					$this->model_ticketing_user->send_cctv(); 
		        	$this->session->set_flashdata('cctvsuccess', 'Your request/complaint has been successfully submitted. The Ticket ID for this request is indicated below.');	         
		        	redirect('user_ticketing/cctv_retrieval');
		        }
		        else
		        {
		            $this->session->set_flashdata('cctvfail', $this->upload->display_errors());  
		            redirect('user_ticketing/cctv_retrieval');
			    }
			 } 
			 else 
			 {
				$this->load->library('upload');	
			 	$this->session->set_flashdata('cctvsuccess', 'Your request/complaint has been successfully submitted. The Ticket ID for this request is indicated below.');
			 	$this->model_ticketing_user->send_cctv(); 
			    redirect('user_ticketing/cctv_retrieval');
			 }
		}
	}

	function emergency_ticket()
	{
		$data['count'] = $this->model_tracking_user->count_activetickets();
		$data['ticket'] = $this->model_ticketing_user->get_ticketid();
		$this->template->load('user_template', 'view_useremergencyticket', $data);
	}

	function send_emergency()
	{
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');

        $this->form_validation->set_rules('type', 'Type of Emergency', 'required');
        $this->form_validation->set_rules('content', 'Message', 'trim|required|min_length[10]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->load('user_template', 'view_useremergencyticket');
        }
        else
        {
        	if ($_FILES && $_FILES['file']['name'] !== "")
        	{
			$real = realpath(APPPATH);
		        $config['upload_path']          = $real . '/ticket_uploads/';
		        $config['allowed_types']        = 'doc|docx|jpg|pdf|png';
		        $config['max_size']             = '52428800';
		        $config['max_width']            = 1920;
		        $config['max_height']           = 1080;

		        $this->load->library('upload', $config);

		        if ($this->upload->do_upload('file'))
		        {
					$this->model_ticketing_user->send_ticket();
		        	$this->session->set_flashdata('emergencysuccess', 'Your emergency ticket has been successfully submitted. The Ticket ID for this request is indicated below.');
		        	redirect('user_ticketing/emergency_ticket');
		        }
		        else
		        {
		            $this->session->set_flashdata('emergencyfail', $this->upload->display_errors());
		            redirect('user_ticketing/emergency_ticket');
			    }
			 }
			 else
			 {
			 	$this->load->library('upload');
			 	$this->session->set_flashdata('emergencysuccess', 'Your emergency ticket has been successfully submitted. The Ticket ID for this request is indicated below.');
			 	$this->model_ticketing_user->send_ticket();
			    redirect('user_ticketing/emergency_ticket');
			 }
		}
	}
}
