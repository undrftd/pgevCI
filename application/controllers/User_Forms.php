<?php

class User_Forms extends MY_Controller {

	public function car_sticker()
	{
		$this->template->load('user_template', 'view_userforms_carsticker', array('error' => ' ' ));	
	}

	function work_permit()
	{
		$this->template->load('user_template', 'view_userforms_workpermit');
	}

	function renovation()
	{
		$this->template->load('user_template', 'view_userforms_renovation');
	}

	function download($filename) 
	{
		$path = 'C:/xampp/htdocs/pgevCI/application/downloads/' . $filename;
        $data = file_get_contents($path);
		$name = $filename;

		force_download($name, $data);
	}    

	function upload()
	{
		$config['upload_path']          = 'C:/xampp/htdocs/pgevCI/application/uploads';
        $config['allowed_types']        = 'doc|docx|jpg|pdf|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        //$config['filename']  			= url_title($this->input->post('file'));

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file'))
        {
        	$this->db->insert('form_uploads', array('filename' => $this->upload->file_name, 'userid' => $this->session->userdata('userid')));
        	$this->session->set_flashdata('msg', 'Success');          
        	$this->template->load('user_template', 'view_userforms_carsticker'); 	
        }
        else
        {
            $this->session->set_flashdata('msg', 'Failed');  
            $this->template->load('user_template', 'view_userforms_carsticker');
	    }
	}	              

}
