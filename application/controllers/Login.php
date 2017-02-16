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
        $this->form_validation->set_rules('email', 'E-mail Address', 'required|valid_email|trim');
        if ($this->form_validation->run())
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
                    $message = 'Hi, you recently requested to reset your password for Parkwood Greens Executive Village CRM. <a href="'. base_url() . 'login/reset_password_verification/' . $resetkey . '"> Click Here to Reset your Password. </a> If you did not request a password reset, please feel free to ignore it. Be noted that this link will expire after use.';
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
        $resetkey = $this->uri->segment(3);

        if(!$resetkey)
        {
            $this->session->set_flashdata('resetfail', 'Unable to proceed to the password resetting process. Please make sure the reset link has not expired yet or the link is from the email.');
            $this->template->load('template','view_resetpassword');
        }
        else
        {
            $this->load->model('model_accounts');

            if($this->model_accounts->checkreset_key($resetkey) == 1)
            {
                $this->template->load('template', 'view_resetpasswordverification');
            }
            else
            {
                $this->session->set_flashdata('resetfail', 'Unable to proceed to the password resetting process. Please make sure the reset link has not expired yet or the link is from the email.');
                $this->template->load('template','view_resetpassword');
            } 
        }  
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

            $this->session->set_flashdata('resetvfeedback', 'You have successfully reset your password.');
            $this->template->load('template', 'view_resetpasswordverification');
            $this->output->set_header('refresh:2; url=' . base_url());

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
