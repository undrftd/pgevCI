<?php

class Admin_Profile extends MY_Controller{

	function index()
	{
		$this->template->load('admin_template', 'view_adminprofile');
	}

	function alpha_dash_space($str)
    {
        return ( ! preg_match("/^([a-z ])+$/i", $str)) ? FALSE : TRUE;
    }

    function num_dash_par($str)
    {
        return ( ! preg_match("/^([-0-9()])+$/i", $str)) ? FALSE : TRUE;
    }

	function update_account($userid)
	{
		$this->usertracking->track_this();
		if($this->model_accounts->url_check_myaccount($userid))
		{
			$this->form_validation->set_error_delimiters('<div class="error">','</div>');
	        $this->form_validation->set_message('is_unique', '{field} already exists!');
	        $this->form_validation->set_message('alpha_dash_space', '{field} may only contain alphabetical characters and spaces.');
	        $this->form_validation->set_message('matches', 'Passwords do not match!');
	         $this->form_validation->set_message('num_dash_par', '{field} may only contain numbers, dashes, and parentheses.');

	        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|callback_alpha_dash_space');
	        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|callback_alpha_dash_space');
	        $this->form_validation->set_rules('username', 'Username', 'trim|required|edit_unique[accounts.username.'.$userid.']');
	        $this->form_validation->set_rules('password', 'Password', 'required');
	        $this->form_validation->set_rules('passconf', 'Password', 'required|matches[password]');
	        $this->form_validation->set_rules('address', 'Address', 'required|alpha_numeric_spaces');
	        $this->form_validation->set_rules('email', 'E-mail Address', 'required|valid_email');
	        $this->form_validation->set_rules('contactnum', 'Contact Number', 'required|callback_num_dash_par|min_length[7]');

	        if ($this->form_validation->run() == FALSE)
	        {
	        	$this->template->load('admin_template', 'view_adminprofile');
	        }
	        else
	        {
	            if($query = $this->model_accounts->myaccount_update($userid))
	             {
	                $this->session->set_flashdata('profilefeedback', 'You have successfully updated the account.');
	                redirect('admin_profile');
	             }
	        }
	    }
	    else
	    {
	    	$this->session->set_flashdata('profilefail', 'You can only edit your own account.');
	        redirect('admin_profile');
	    }
	}


}
