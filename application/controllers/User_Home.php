<?php

class User_Home extends MY_Controller {

    function index()
    {
        $this->template->load('admin_template', 'view_userhome');
    }

}