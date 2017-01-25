<?php

class Admin_Audit extends MY_Controller {

	function logs()
	{
        $config['base_url'] = site_url('admin_audit/logs');
        $config['total_rows'] = $this->model_audit->count_audit();
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
        $data['auditlinks'] = $this->pagination->create_links();

        $data['log'] = $this->model_audit->get_audit($config['per_page'], $this->uri->segment(3));
		$this->template->load('admin_template', 'view_adminaudit', $data);
	}

}
