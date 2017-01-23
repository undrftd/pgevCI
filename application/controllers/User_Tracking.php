<?php

class User_Tracking extends MY_Controller {

	public function recent()
	{
		$data['result'] = $this->model_tracking_user->get_recenttickets();
		$this->template->load('user_template', 'view_usertracking', $data);
	}

	function view_history()
	{
		$config['base_url'] = site_url('user_tracking/view_history');
        $config['total_rows'] = $this->model_tracking_user->count_tickets();
        $config['per_page'] =  10;
        $config['num_links'] = 5;
        $config['use_page_numbers'] = FALSE;
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
    	$data['ticketlinks'] = $this->pagination->create_links();

        $data['result'] = $this->model_tracking_user->get_history($config['per_page'], $this->uri->segment(3));
		$this->template->load('user_template', 'view_userhistorytracking', $data);
	}

	

}

/* End of file User_Tracking.php */
/* Location: ./application/controllers/User_Tracking.php */