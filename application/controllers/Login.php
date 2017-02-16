<?php

class Login extends CI_Controller
{

    function index()
    {
        if($this->session->userdata('is_logged_in'))
        {
            $referred_from = $this->session->userdata('referred_from');
            redirect($referred_from, 'refresh');
        }
        else
        {
            $this->template->load('template', 'view_login');
        }
    }

    function validate_login()
    {
        $this->load->model('model_accounts');
        $valid = $this->model_accounts->validate();
        $isAdmin = $this->model_accounts->check_role();
        $isUser = $this->model_accounts->check_user();
        $isActive = $this->model_accounts->check_active();

        if($valid && $isAdmin && $isActive) // Active Admin
        {
            redirect('admin_ticketing/new_tickets');
        }
        else if($valid && $isActive && $isUser)  // Active User
        {
            redirect('user_home');
        }
        else if(($valid && $isAdmin) && $isActive == false)  //Deactivated Admin
        {
            redirect('login/admindeact');
        }
        else if($valid && ($isActive && $isAdmin) == false) //Deactivated User
        {
            redirect('login/userdeact');
        }
        else if($valid == false) //Invalid Account
        {
            $data['message'] = "Sorry, the username and password you entered did not match our records. Please double-check and try again. ";
            $this->template->load('template', 'view_login', $data);
        }
    }

    function reset_password()
    {
        $this->template->load('template','view_resetpassword');
    }

    function reset_emailvalidation()
    {
        $this->form_validation->set_rules('email', 'E-mail Address', 'required|valid_email|trim|xss_clean');
        if ($this->form_validation->run() == FALSE)
        {
            $resetkey = md5(uniqid());

            $this->load->model('model_accounts');

            if($this->model_accounts->url_check_email())
            {
                if($this->model_accounts->update_resetkey($resetkey))
                {
                    $this->load->library("email");

                    $this->email->from(set_value("email"), set_value("fullName"));
                    $this->email->to($this->input->post('email'));
                    $array = $this->session->userdata('firstname');
                    $this->email->subject("Password Reset - Parkwood Greens Executive Village CRM");
                    $message = 'You have requested to reset your password. <a href="'. base_url() . 'login/reset_password_verification/' . $resetkey . '"> Click Here to Reset </a>';
                    $this->email->message($message);
                    $this->email->send();

                    $this->session->set_flashdata('resetfeedback', 'The reset link has been successfully sent to your email. Please check your inbox.');
                    redirect('login/reset_password');
                }
                else
                {
                    redirect('login/reset_password');
                }
            }
            else
            {
                $this->session->set_flashdata('resetfail', 'There is no account associated with that email address. Please double-check the email address.');
                redirect('login/reset_password');
            }

        }
        else
        {
           echo 0;
        }
    }

    function reset_password_verification()
    {
        $this->template->load('template', 'view_resetpasswordverification');
    }

    function reset_password_validation()
    {
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('password', 'new password', 'required');
        $this->form_validation->set_rules('confpassword', 'confirm new password', 'required|matches[password]');
        if ($this->form_validation->run())
        {
            $this->load->model('model_accounts');
            $this->model_accounts->reset_password();

           redirect('login');

        }
        else
        {
            $this->template->load('template', 'view_resetpasswordverification');
        }
    }

    function userdeact()
    {
        $this->session->set_userdata('referred_from', current_url());
        $this->template->load('template', 'view_userdeact');
    }

    function admindeact()
    {
        $this->session->set_userdata('referred_from', current_url());
        $this->template->load('template', 'view_admindeact');
    }

    function signout()
    {
        $user_data = $this->session->all_userdata();

        foreach ($user_data as $key => $value)
        {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity')
            {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect('login/');
    }
}
