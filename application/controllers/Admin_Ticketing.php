<?php

class Admin_Ticketing extends MY_Controller {

	function index()
    {
    	$this->template->load('admin_template', 'view_adminticketing');
    }
}