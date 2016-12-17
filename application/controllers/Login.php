<?php

class Login extends CI_Controller 
{

    function index()
    {
        $data['main_content'] = 'view_login';
        $this->load->view('includes/login_template', $data);    
    }
    
    function validate_login()
    {
        $this->load->model('model_accounts');
        $valid = $this->model_accounts->validate();
        $isAdmin = $this->model_accounts->check_role();
        $isActive = $this->model_accounts->check_active();

        if($valid && $isAdmin && $isActive)
        {
            $data = array(
                'userid' => $this->input->post('userid'),
                'is_logged_in' => true
            );

            $this->session->set_userdata($data); 
            redirect('admin/ticketing');
        }
        else if($valid && $isActive && $isAdmin == false) 
        {
            $data = array(
                'userid' => $this->input->post('userid'),
                'is_logged_in' => true
            );
        
            $this->session->set_userdata($data);
            redirect('user/home');
        }
        else if($valid && $isAdmin && $isActive == false)
        {
            $data = array(
                'userid' => $this->input->post('userid'),
                'is_logged_in' => true
            );

            $this->session->set_userdata($data); 
            redirect('admin/deactivated');
        }
        else if($valid && ($isActive && $isAdmin) == false) 
        {
            $data = array(
                'userid' => $this->input->post('userid'),
                'is_logged_in' => true
            );
        
            $this->session->set_userdata($data);
            redirect('user/deactivated');
        }
        else if($valid == false && $isAdmin == false){
            
            $data['main_content'] = 'view_login';
            $data['message'] = "";
            
            $this->load->view('includes/login_template', $data);
        }
    }      
    }
