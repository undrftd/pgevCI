<?php

class User_Suggestions extends MY_Controller {

    function index()
    {
        $this->template->load('user_template','view_usersuggestions'); 
    }
   
    function send_email()
    {
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules("message", "Message", "required");
 
        if ($this->form_validation->run() == FALSE)
        {
            $data['message']="" ;
            $this->template->load('user_template', 'view_usersuggestions', $data);
        }
        else
        {
            $this->session->set_flashdata('suggestfeedback', 'Your suggestion has been successfully submitted. Thank you for your concern in our community.');
            
            $this->load->library("email");
            
            $this->email->from(set_value("email"), set_value("fullName"));
            $this->email->to("excontent14@gmail.com");
            $array = $this->session->userdata('firstname');
            $this->email->subject("Community Suggestions -" . $this->session->userdata('firstname') . " " . $this->session->userdata('lastname'));
            $this->email->message(set_value("message"));
            
            $this->email->send();
            $this->template->load('user_template','view_usersuggestions'); 
        }
    }
}