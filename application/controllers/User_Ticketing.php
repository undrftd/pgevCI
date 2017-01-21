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
		$config['upload_path']          = 'C:/xampp/htdocs/pgevCI/application/uploads';
        $config['allowed_types']        = 'doc|docx|jpg|pdf|png';
        $config['max_size']             = '52428800';
        $config['max_width']            = 1920;
        $config['max_height']           = 1080;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file'))
        {
			$this->model_ticketing_user->send_requestcomplaint(); 
        	$this->session->set_flashdata('ticketsuccess', 'Your request/complaint has been successfully submitted. The Ticket ID for this request is indicated below.');	         
        	redirect('user_ticketing/requests_complaints');
        }
        else
        {
            $this->session->set_flashdata('ticketfail', 'Failed to submit your request/complaint. Please check whether a file has been selected or following the file formats specified below.');  
            redirect('user_ticketing/requests_complaints');
	    }
		$this->model_ticketing_user->send_requestcomplaint();
		redirect('user_ticketing/requests_complaints');
	}

}
