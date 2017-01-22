<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->is_logged_in();
        $this->load->model('model_accounts');
        $this->load->model('model_accounts_user');
        $this->load->model('model_dues');
        $this->load->model('model_dues_user');
        $this->load->model('model_forms_user');
        $this->load->model('model_forms');
        $this->load->model('model_ticketing_user');
        $this->load->model('model_tracking_user');
    }

    function is_logged_in()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');

        if(!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login');
            die();
        }
    }

}
