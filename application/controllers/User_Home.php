<?php

class User_Home extends MY_Controller {

    function index()
    {
        $data['main_content'] = 'view_userhome';
        $this->load->view('includes/userhome_template', $data);
    }

}