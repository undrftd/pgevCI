<?php
class User_Ticketing extends MY_Controller {

	public function index()
	{
		$this->template->load('user_template', 'view_userticketing');
	}

	function requests_complaints()
	{
		$data['ticket'] = $this->model_ticketing_user->get_ticketid();
		$this->template->load('user_template', 'view_userrequestscomplaints', $data);
	}

	function send_requestcomplaint()
	{
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');

        $this->form_validation->set_rules('type', 'Type of Request or Complaint', 'required');
        $this->form_validation->set_rules('content', 'Message', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->load('user_template', 'view_userrequestscomplaints');
        }
        else
        {
        	if ($_FILES && $_FILES['file']['name'] !== "")
        	{
				$config['upload_path']          = 'C:/xampp/htdocs/pgevCI/application/uploads';
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
		$this->template->load('user_template', 'view_usercctvretrieval');
	}

	function emergency_ticket()
	{
		$data['ticket'] = $this->model_ticketing_user->get_ticketid();
		$this->template->load('user_template', 'view_useremergencyticket', $data);
	}

	function send_emergency()
	{
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');

        $this->form_validation->set_rules('type', 'Type of Emergency', 'required');
        $this->form_validation->set_rules('content', 'Message', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->load('user_template', 'view_useremergencyticket');
        }
        else
        {
        	if ($_FILES && $_FILES['file']['name'] !== "")
        	{
				$config['upload_path']          = 'C:/xampp/htdocs/pgevCI/application/uploads';
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
