<?php

class Admin_Ticketing extends MY_Controller {

	function new_tickets()
    {
    	$this->session->set_userdata('referred_from', current_url());

    	$config['base_url'] = site_url('admin_ticketing/new');
        $config['total_rows'] = $this->model_ticketing->count_newtickets();
        $config['per_page'] =  20;
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
    	$data['newticketlinks'] = $this->pagination->create_links();

    	$data['count'] = $this->model_ticketing->count_newtickets();
        $data['result'] = $this->model_ticketing->get_newtickets($config['per_page'], $this->uri->segment(3));
    	$this->template->load('admin_template', 'view_adminticketing_new', $data);
    }

    function progress_tickets()
    {
        $config['base_url'] = site_url('admin_ticketing/new');
        $config['total_rows'] = $this->model_ticketing->count_progresstickets();
        $config['per_page'] =  20;
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
        $data['progressticketlinks'] = $this->pagination->create_links();

        $data['count'] = $this->model_ticketing->count_newtickets();
        $data['result'] = $this->model_ticketing->get_progresstickets($config['per_page'], $this->uri->segment(3));
        $this->template->load('admin_template', 'view_adminticketing_inprogress', $data);       
    }

    function closed_tickets()
    {
        $config['base_url'] = site_url('admin_ticketing/new');
        $config['total_rows'] = $this->model_ticketing->count_closedtickets();
        $config['per_page'] =  20;
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
        $data['closedticketlinks'] = $this->pagination->create_links();

        $data['count'] = $this->model_ticketing->count_newtickets();
        $data['result'] = $this->model_ticketing->get_closedtickets($config['per_page'], $this->uri->segment(3));
        $this->template->load('admin_template', 'view_adminticketing_closed', $data);       
    }

    function ticketdetails($ticketid)
    {
        $this->model_ticketing->set_timeopened($ticketid);
        $data['result'] = $this->model_ticketing->get_newticketdetails($ticketid);
        $this->template->load('admin_template', 'view_adminmoretickets', $data);
    }

    function download_attachment($ticketid)
    {
        if($this->model_ticketing->url_check_tickets($ticketid))
        {
            $query = $this->db->select('*')->where('ticketid', $ticketid)->get('tickets',1);
            $result = $query->row();

            if($result->attachment != NULL || $result->attachment != "")
            {
                $path = 'C:/xampp/htdocs/pgevCI/application/uploads/' . $result->attachment;
                $data = file_get_contents($path);
                $name = $result->attachment;

                force_download($name, $data);
            }
            else
            {
                $this->session->set_flashdata('moreticketfail', 'There is no attachment for this ticket.');
                $data['result'] = $this->model_ticketing->get_newticketdetails($ticketid);
                $this->template->load('admin_template', 'view_adminmoretickets', $data);
            }
        }
        else
        {
            $this->session->set_flashdata('newticketfail', 'You cannot download an attachment from a non-existent ticket.');
            redirect('admin_ticketing/new_tickets');
        }
    }

    function save_ticket($ticketid)
    {
        $this->model_ticketing->save_ticket($ticketid);
        $this->session->set_flashdata('moreticketsuccess', 'You have successfully updated the ticket\'s details');
        redirect('admin_ticketing/ticketdetails');
    }

}