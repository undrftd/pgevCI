<?php

class User_Home extends MY_Controller {

    function index()
    {
    	$this->session->set_userdata('referred_from', current_url());
        $this->template->load('user_template', 'view_userhome');
    }

}
