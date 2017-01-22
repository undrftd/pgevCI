<?php

class User_Tracking extends MY_Controller {

	public function index()
	{
		$data['result'] = $this->model_tracking_user->get_tickets();
		$this->template->load('user_template', 'view_usertracking', $data);
	}

}

/* End of file User_Tracking.php */
/* Location: ./application/controllers/User_Tracking.php */