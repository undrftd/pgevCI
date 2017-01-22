<?php

class User_Tracking extends MY_Controller {

	public function recent()
	{
		$data['result'] = $this->model_tracking_user->get_recenttickets();
		$this->template->load('user_template', 'view_usertracking', $data);
	}

	function view_history()
	{
		$data['result'] = $this->model_tracking_user->get_history();
		$this->template->load('user_template', 'view_userhistorytracking', $data);
	}

}

/* End of file User_Tracking.php */
/* Location: ./application/controllers/User_Tracking.php */