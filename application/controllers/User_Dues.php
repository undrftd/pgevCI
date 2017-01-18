<?php

class User_Dues extends MY_Controller {
  
  function index()
  {
  $this->template->load('user_template', 'view_userdues');

  }

  function viewrates()
  {
    $data['rate'] = $this->model_dues->get_rate();
    $this->template->load('admin_template', 'view_admineditrate', $data);
  }

}
