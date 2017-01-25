<?php

class Admin_Statistics extends MY_Controller {

	public function index()
	{
		$data['totalgrasscutting'] = $this->model_statistics->count_totalgrasscutting();
		$data['progressgrasscutting'] = $this->model_statistics->count_progressgrasscutting();
		$data['closedgrasscutting'] = $this->model_statistics->count_closedgrasscutting();
		$this->template->load('admin_template', 'view_adminstatistics', $data);
	}

}
