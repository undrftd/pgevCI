<?php

class MY_Form_validation extends CI_Form_validation{
    
    function edit_unique($value, $params)  
    {
    	$CI =& get_instance();
    	$CI->load->database();

    	$CI->form_validation->set_message('edit_unique', "{field} already exists!");

    	list($table, $field, $current_id) = explode(".", $params);

    	$query = $CI->db->select()->from($table)->where($field, $value)->limit(1)->get();

    	if ($query->row() && $query->row()->userid != $current_id)
    	{
        	return FALSE;
    	} 
    	else 
    	{
        	return TRUE;
    	}

	}
}