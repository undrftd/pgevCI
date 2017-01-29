<?php

class User_Home extends MY_Controller {

    function index()
    {
  		$this->model_dues_user->setsession();
    	$data['count'] = $this->model_tracking_user->count_activetickets();
    	$data['rate'] = $this->model_dues_user->get_rate();
    	$data['latest'] = $this->model_announcements->get_latestannouncement();
    	$this->session->set_userdata('referred_from', current_url());
        $this->template->load('user_template', 'view_userhome', $data);
    }

}
