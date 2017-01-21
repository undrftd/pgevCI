<?php

class User_Dues extends MY_Controller {
  
  function index()
  {
  	$this->model_dues_user->setsession();
  	$data['rate'] = $this->model_dues_user->get_rate();
 	$this->template->load('user_template', 'view_userdues', $data);
  }

}
